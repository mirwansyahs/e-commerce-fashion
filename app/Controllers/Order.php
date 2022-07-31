<?php

namespace App\Controllers;

use App\Models\OrderModel;

class Order extends BaseController
{
    public function __construct()
    {
        $this->order = new OrderModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Orderan Masuk',
            'order'  => $this->order->getAll(),
        ]; 

        return view('back-end/order/data-in', $data);
    }

    public function detailOrderIn($id)
    {
        if ($id != null) {
            $query = $this->order->getWhere(['id' => $id]);

            if ($query->resultID->num_rows > 0) {
                $data = [
                    'title' => 'Detail Orderan Masuk',
                    'order' => $query->getRow(),
                ];
        
                return view('back-end/order/detail-order-in', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
