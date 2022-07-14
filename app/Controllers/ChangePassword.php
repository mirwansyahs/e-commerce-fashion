<?php

namespace App\Controllers;

use App\Models\ProfileModels;
use CodeIgniter\I18n\Time;

class ChangePassword extends BaseController
{
    public function __construct()
    {
        $this->profile = new ProfileModels();
    }

    public function index()
    {
        $data['title'] = 'Ubah Kata Sandi';
        return view('back-end/changePassword', $data);
    }

    public function save()
    {

        $doValid = $this->validate([
            'old_password' => [
                'label' => 'kata sandi lama',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                ]
            ],
            'new_password' => [
                'label' => 'kata sandi baru',
                'rules' => 'required|min_length[5]|matches[confirm_password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                    'matches' => '{field} tidak sama dengan {param}',
                ]
            ],
            'confirm_password' => [
                'label' => 'konfirmasi kata sandi',
                'rules' => 'required|min_length[5]|matches[new_password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                    'matches' => '{field} tidak sama dengan {param}',
                ]
            ],
        ]);


        if (!$doValid) {
            $data = [
                'title' => 'Ubah Kata Sandi',
                'validation' => $this->validator
            ];

            return view('back-end/changePassword', $data);
        } else {
            $old_password = $this->request->getVar('old_password');
            $new_password = $this->request->getVar('new_password');
            $where = [
                'id' => session('id'),
                'password' => password_verify($old_password, PASSWORD_DEFAULT)
            ];

            $profile = $this->profile->find($where);
    
            if ($profile > 0) {
                $id = session('id');
                $param = [
                    'password' => password_hash($new_password, PASSWORD_DEFAULT)
                ];

                $this->profile->update($id, $param);

                return redirect()->to(site_url('ubah-kata-sandi'))->with('success', 'Kata sandi berhasil diubah!');
            } else {
                return redirect()->to(site_url('ubah-kata-sandi'))->with('error', 'Kata sandi gagal diubah!');
            }
        }
    }
}
