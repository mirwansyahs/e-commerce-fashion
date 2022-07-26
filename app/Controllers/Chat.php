<?php

namespace App\Controllers;

use App\Models\ChatModel;
use App\Models\ProfileModel;

class Chat extends BaseController
{
    public function __construct()
    {
        helper('text');
        $this->chat = new ChatModel();
        $this->user = new ProfileModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Chat',
            'chat'  => $this->chat->getAll(),
            'chatList'  => $this->chat->getList(),
        ];

        return view('back-end/chat/data', $data);
    }

    public function list()
    {
        if ($this->request->isAJAX()) {
            $sender_id = $this->request->getVar('sender_id');

            $chat = $this->chat->find($sender_id);
            $user = $this->user->find($sender_id);
            
            $user_admin = $this->user->find(session('id'));
            $chat_admin = $this->chat->where('sender_id', session('id'))->where('recipient_id', $sender_id)->first();

            $data = [
                'sender_id' => $sender_id,
                'recipient_id' => $chat['recipient_id'],
                'message' => $chat['message'],
                'time' => $chat['time'],
                'image' => $user['image'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'status' => $user['status'],
                'message_admin' => $chat_admin['message'],
                'time_admin' => $chat_admin['time'],
                'image_admin' => $user_admin['image'],
            ];

            $msg = [
                'data' => view('back-end/chat/content', $data)
            ];

            echo json_encode($msg);
        }
    }
}
