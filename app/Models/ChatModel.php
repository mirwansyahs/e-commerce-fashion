<?php

namespace App\Models;

use CodeIgniter\Model;


class ChatModel extends Model
{
    protected $table            = 'message';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['sender_id', 'recipient_id', 'message', 'is_read', 'time'];

    function getAll()
    {
        $builder = $this->db->table('message');
        $builder->join('user', 'user.id = message.sender_id');
        $builder->orderBy('time', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    function getList()
    {
        $builder = $this->db->table('message');
        $builder->join('user', 'user.id = message.sender_id');
        $builder->where('sender_id != 1');
        $builder->groupBy('first_name');
        $builder->orderBy('time', 'DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
