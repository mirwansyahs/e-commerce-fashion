<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'order_items';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['order_id', 'product_id', 'size', 'color', 'qty', 'status', 'created_at', 'modified_at'];

    function getAll()
    {
        $builder = $this->db->table('order_items');
        $builder->join('order_details', 'order_details.id = order_items.order_id');
        $builder->join('user', 'user.id = order_details.user_id');
        $builder->join('product', 'product.id = order_items.product_id');
        $builder->join('payment_details', 'payment_details.id = order_details.payment_id');
        $builder->join('user_address', 'user_address.id = user.id');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
