<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'order_items';
    protected $primaryKey       = 'order_items_id';
    protected $allowedFields    = ['order_id', 'product_id', 'size_item', 'color_item', 'qty', 'subtotal', 'status_item'];

    function getAll()
    {
        $builder = $this->db->table('order_items');
        $builder->join('order_details', 'order_details.id = order_items.order_id');
        $builder->join('user', 'user.id = order_details.user_id');
        $builder->join('product', 'product.id = order_items.product_id');
        $builder->join('order_delivery', 'order_delivery.id = order_details.delivery_id');
        $builder->join('payment_details', 'payment_details.id = order_details.payment_id');
        $builder->join('user_address', 'user_address.id = user.id');
        $query = $builder->get();
        return $query->getResultArray();
    }

    function report($start_date, $end_date) {
        // return $this->db->table('order_details')->where('date_received  >=', $start_date)->where('date_received <=', $end_date)->get()->getResultArray();
        $builder = $this->db->table('order_items');
        $builder->join('order_details', 'order_details.id = order_items.order_id');
        $builder->join('user', 'user.id = order_details.user_id');
        $builder->join('product', 'product.id = order_items.product_id');
        $builder->join('order_delivery', 'order_delivery.id = order_details.delivery_id');
        $builder->join('payment_details', 'payment_details.id = order_details.payment_id');
        $builder->join('user_address', 'user_address.id = user.id');
        $builder->where('date_received >=', $start_date)->where('date_received <=', $end_date);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
