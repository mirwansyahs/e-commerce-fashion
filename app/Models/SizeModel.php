<?php

namespace App\Models;

use CodeIgniter\Model;

class SizeModel extends Model
{
    protected $table            = 'size';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['size', 'created_at', 'modified_at'];
}
