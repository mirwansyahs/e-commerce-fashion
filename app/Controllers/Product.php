<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\DiscountModel;
use CodeIgniter\I18n\Time;

class Product extends BaseController
{
    public function __construct()
    {
        helper('text');
        $this->product = new ProductModel();
        $this->category = new CategoryModel();
        $this->discount = new DiscountModel();

    }

    public function index()
    {
        $data = [
            'title' => 'Produk',
            'product' => $this->product->getAll()
        ];

        return view('back-end/product/data', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Produk',
            'category' => $this->category->findAll(),
            'discount' => $this->discount->findAll(),
        ];

        return view('back-end/product/add', $data);
    }
}
