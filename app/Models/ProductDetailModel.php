<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductDetailModel extends Model
{
    protected $table            = 'product_detail';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['product_id', 'size_id', 'color_id', 'created_at', 'modified_at'];
}
