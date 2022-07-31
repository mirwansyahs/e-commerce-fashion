<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\DiscountModel;
use App\Models\SizeModel;
use App\Models\ColorModel;
use App\Models\ProductDetailModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    public function __construct()
    {
        $this->product = new ProductModel();
        $this->category = new CategoryModel();
        $this->brand = new BrandModel();
        $this->discount = new DiscountModel();
        $this->size = new SizeModel();
        $this->color = new ColorModel();
        $this->detail = new ProductDetailModel();
        helper('text');
    }

    public function index()
    {
        $data = [
            'recent_product' => $this->db->query("SELECT * FROM product ORDER BY product.id DESC LIMIT 8")->getResultArray(),
            'product' => $this->product->getAll()
        ];

        return view('front-end/index', $data);
    }

    public function detail($slug)
    {
        if ($slug != null) {
            $query = $this->detail->join('product', 'product.id = product_detail.product_id')
                                    ->join('size', 'size.id = product_detail.size_id')
                                    ->join('color', 'color.id = product_detail.color_id')
                                    ->getWhere(['slug' => $slug]);
            
            if ($query->resultID->num_rows > 0) {
                $data = [
                    'product' => $query->getRow(),
                    'brand' => $this->brand->findAll(),
                    'discount' => $this->discount->findAll(),
                    'size' => $this->size->findAll(),
                    'color' => $this->color->findAll(),
                ];
        
                // dd($data);
                return view('front-end/product/detail', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function cart()
    {
        return view('front-end/order/cart');
    }
}
