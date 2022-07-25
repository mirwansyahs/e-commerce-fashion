<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
    protected $table            = 'message';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['sender_id', 'recipient_id', 'message', 'is_read'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'timestamp';
    protected $createdField  = 'time';

    function getAll()
    {
        $builder = $this->db->table('message');
        // $builder->select('*');
        $builder->join('user as u1', 'u1.id = message.sender_id');
        // $builder->join('user as u2', 'u2.id = message.recipient_id');
        $builder->orderBy('time', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    function getList()
    {
        $builder = $this->db->table('message');
        // $builder->select('*');
        $builder->join('user as u1', 'u1.id = message.sender_id');
        // $builder->join('user as u2', 'u2.id = message.recipient_id');
        $builder->orderBy('time', 'DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
