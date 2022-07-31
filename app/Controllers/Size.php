<?php

namespace App\Controllers;

use App\Models\SizeModel;
use CodeIgniter\I18n\Time;

class Size extends BaseController
{
    public function __construct()
    {
        $this->size = new SizeModel();
        helper('text');
    }

    public function index()
    {
        $data = [
            'title' => 'Ukuran',
            'size' => $this->size->findAll()
        ];
        return view('back-end/size/data', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Ukuran'
        ];
        return view('back-end/size/add', $data);
    }

    public function save()
    {
        $size = $this->request->getVar('size');

        $params = [
            'size' => $size,
            'created_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->size->insert($params);
        return redirect()->to(site_url('ukuran'))->with('success', 'Selamat data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if ($id != null) {
            $query = $this->db->table('size')->getWhere(['id' => $id]);
            
            if ($query->resultID->num_rows > 0) {
                $data = [
                    'title' => 'Edit Kategori',
                    'size' => $query->getRow(),
                ];
        
                return view('back-end/size/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    { 
        $size = $this->request->getVar('size');

        $param = [
            'size' => $size,
            'modified_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->db->table('size')->where(['id' => $id])->update($param);
        return redirect()->to(site_url('ukuran'))->with('success', 'Selamat data berhasil diubah!');
    }

    public function delete($id)
    {
        $this->size->delete($id);
        return redirect()->to(site_url('ukuran'))->with('success', 'Data berhasil dihapus!');
    }
}
