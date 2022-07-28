<?php

namespace App\Controllers;

use App\Models\ChatModel;
use App\Models\RoomModel;
use App\Models\ProfileModel;
use CodeIgniter\I18n\Time;

class Chat extends BaseController
{
    public function __construct()
    {
        helper('text');
        $this->chat = new ChatModel();
        $this->room = new RoomModel();
        $this->user = new ProfileModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Chat',
            'chatList'  => $this->chat->getList(),
        ];

        return view('back-end/chat/data', $data);
    }

    public function list()
    {
        if ($this->request->isAJAX()) {
            $room_number = $this->request->getVar('room_number');
            $sender_id = $this->request->getVar('sender_id');

            $chat = $this->chat->join('user', 'user.id = message.user_id')
                    ->where('room_number', $room_number)->findAll();
            
            foreach ($chat as $c) {
                $user_id =  $c['user_id'];
            }

            $user = $this->user->find($user_id);

             $msg = [
                'data' => view('back-end/chat/content', [
                        'room_number' => $room_number,
                        'sender_id' => $user_id,
                        'user' => $user,
                        'chat' => $chat
                ])
            ];

            echo json_encode($msg);
        }
    }

    public function send()
    {
        $user_id = $this->request->getVar('user_id');
        $room_number = $this->request->getVar('room_number');
        $message = $this->request->getVar('message');

        $params = [
            'room_number'   => $room_number,
            'user_id'       => $user_id,
            'sender_id'     => session('id'),
            'recipient_id'  => $user_id,
            'message'       => $message,
            'time'          => Time::now('Asia/Jakarta', 'en_ID'),
        ];

        $this->chat->insert($params);

        $message = $this->chat->groupBy('id')->orderBy('id', 'ASC')->get()->getResultArray();

        foreach ($message as $m) {
            $message_id = $m['id'];
        }
        
        $msg_params = [
            'user_id'       => $user_id,
            'message_id'    => $message_id,
            'room'          => $room_number,
        ];

        $this->room->insert($msg_params);

        $latest_params = [
            'user_id'       => $user_id,
            'message_id'    => $message_id,
            'time_in'       => Time::now('Asia/Jakarta', 'en_ID'),
        ];

        $query = $this->db->table('message_latest')->where(['user_id' => $user_id])->update($latest_params);
        return redirect()->to(site_url('chat'));
    }
}
