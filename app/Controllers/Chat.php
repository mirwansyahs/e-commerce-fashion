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
            // 'chat'  => $this->room->getAll(),
            'chatList'  => $this->chat->getList(),
        ];

        // dd($chat_admin = $this->room->getAll());

        return view('back-end/chat/data', $data);
    }

    public function list()
    {
        // if ($this->request->isAJAX()) {
            $sender_id = $this->request->getVar('sender_id');

            $chat = $this->chat->find($sender_id);
            $user = $this->user->find($sender_id);
            
            $user_admin = $this->user->find(session('id'));
            $chat_admin = $this->room->getAll();

            // var_dump($user);
            $data = [
                'sender_id' => $sender_id,
                'user'      => $user,
                'chat'      => $this->chat->select('user.first_name, user.last_name, message.*')->join('user', 'user.id = message.sender_id')->where('message.recipient_id', session('id'))->where('message.sender_id', $sender_id)->get()->getResultArray(),
            //     'recipient_id' => $chat['recipient_id'],
            //     'message' => $chat['message'],
            //     'time' => $chat['time'],
            //     'image' => $user['image'],
            //     'first_name' => $user['first_name'],
            //     'last_name' => $user['last_name'],
            //     'status' => $user['status'],
            //     'message_admin' => $chat_admin['message'],
            //     'time_admin' => $chat_admin['time'],
            //     'image_admin' => $user_admin['image'],
            ];
var_dump($data['chat']);
            // $msg = [
            //     'data' => view('back-end/chat/content', $data)
            // ];

            // echo json_encode($msg);
        // }
    }

    public function send()
    {
        $sender_id = $this->request->getVar('sender_id');
        $message = $this->request->getVar('message');

        $params = [
            'sender_id'     => session('id'),
            'recipient_id'  => $sender_id,
            'message'       => $message,
            'time'          => Time::now('Asia/Jakarta', 'en_ID'),
        ];

        $this->chat->insert($params);
        return redirect()->to(site_url('chat'));
    }
}
