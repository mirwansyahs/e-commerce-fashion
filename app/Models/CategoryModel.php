<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'product_category';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['category_name', 'category_desc', 'created_at', 'modified_at', 'deleted_at'];
}
