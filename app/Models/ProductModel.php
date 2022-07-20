<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'product';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'image', 'desc', 'category_id', 'quantity', 'original_price', 'price', 'discount_id', 'created_at', 'modified_at', 'deleted_at'];

    function getAll()
    {
        $builder = $this->db->table('product');
        $builder->join('product_category', 'product_category.id = product.category_id');
        $builder->join('discount', 'discount.id = product.discount_id');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
