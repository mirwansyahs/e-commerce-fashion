<?php

namespace App\Controllers;

use App\Models\OrderModel;
use CodeIgniter\I18n\Time;

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
            $query = $this->db->table('order_items')
                                ->join('order_details', 'order_details.id = order_items.order_id')
                                ->join('user', 'user.id = order_details.user_id')
                                ->join('product', 'product.id = order_items.product_id')
                                ->join('order_delivery', 'order_delivery.id = order_details.delivery_id')
                                ->join('payment_details', 'payment_details.id = order_details.payment_id')
                                ->join('user_address', 'user_address.id = user.id')
                                ->getWhere(['order_items_id' => $id]);

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

    public function print($id)
    {
        if ($id != null) {
            $query = $this->db->table('order_items')
                                ->join('order_details', 'order_details.id = order_items.order_id')
                                ->join('user', 'user.id = order_details.user_id')
                                ->join('product', 'product.id = order_items.product_id')
                                ->join('order_delivery', 'order_delivery.id = order_details.delivery_id')
                                ->join('payment_details', 'payment_details.id = order_details.payment_id')
                                ->join('user_address', 'user_address.id = user.id')
                                ->getWhere(['order_items_id' => $id]);

            if ($query->resultID->num_rows > 0) {
                $data = [
                    'title' => 'Print Orderan Masuk',
                    'order' => $query->getRow(),
                ];
        
                return view('back-end/order/print', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function viewSendResi()
    {
        if ($this->request->isAJAX()) {
            $idorderitem = $this->request->getVar('idorderitem');

            $order = $this->order->find($idorderitem);

            $data = [
                'order' => $order
            ];

            $msg = [
                'data' => view('back-end/order/send-resi', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function sendResi($id)
    {
        $order_id = $this->request->getVar('order_id');
        $resi = $this->request->getVar('resi');

        $paramstatus = [
            'status_item' => 'delivery',
        ];
        
        $this->db->table('order_items')->where(['order_items_id' => $id])->update($paramstatus);

        $paramresi = [
            'resi'          => $resi,
            'delivery_date' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->db->table('order_details')->where(['id' => $order_id])->update($paramresi);

        return redirect()->to(site_url('orderan-masuk'))->with('success', 'Selamat data berhasil diubah!');
    }

    public function orderDelivery()
    {
        $data = [
            'title'     => 'Orderan Dikirim',
            'order'     => $this->order->getAll(),
        ]; 

        return view('back-end/order/data-delivery', $data);
    }

    public function detailOrderDelivery($id)
    {
        if ($id != null) {
            $query = $this->db->table('order_items')
                                ->join('order_details', 'order_details.id = order_items.order_id')
                                ->join('user', 'user.id = order_details.user_id')
                                ->join('product', 'product.id = order_items.product_id')
                                ->join('order_delivery', 'order_delivery.id = order_details.delivery_id')
                                ->join('payment_details', 'payment_details.id = order_details.payment_id')
                                ->join('user_address', 'user_address.id = user.id')
                                ->getWhere(['order_items_id' => $id]);

            if ($query->resultID->num_rows > 0) {
                $data = [
                    'title' => 'Detail Orderan Dikirim',
                    'order' => $query->getRow(),
                ];
        
                return view('back-end/order/detail-order-delivery', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function saveOrderCompleted($id)
    {
        $param = [
            'status_item' => 'complete'
        ];

        $this->order->update($id, $param);
        return redirect()->to(site_url('orderan-dikirim'))->with('success', 'Data berhasil diterima!');
    }

    public function orderCompleted()
    {
        $data = [
            'title'     => 'Orderan Diterima',
            'order'     => $this->order->getAll(),
        ]; 

        return view('back-end/order/data-completed', $data);
    }

    public function detailOrderCompleted($id)
    {
        if ($id != null) {
            $query = $this->db->table('order_items')
                                ->join('order_details', 'order_details.id = order_items.order_id')
                                ->join('user', 'user.id = order_details.user_id')
                                ->join('product', 'product.id = order_items.product_id')
                                ->join('order_delivery', 'order_delivery.id = order_details.delivery_id')
                                ->join('payment_details', 'payment_details.id = order_details.payment_id')
                                ->join('user_address', 'user_address.id = user.id')
                                ->getWhere(['order_items_id' => $id]);

            if ($query->resultID->num_rows > 0) {
                $data = [
                    'title' => 'Detail Orderan Diterima',
                    'order' => $query->getRow(),
                ];
        
                return view('back-end/order/detail-order-completed', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
