<?php

namespace App\Controllers;

use App\Models\ProfileModels;
use CodeIgniter\I18n\Time;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->profile = new ProfileModels();
    }

    public function index()
    {
        if (session('id')) {
            session()->remove('telp');
            return redirect()->to(site_url('dashboard'));
        }
        $data['title'] = 'Masuk';
        return view('auth/login', $data);
    }

    public function proccess()
    {
        $post = $this->request->getPost();
        $query = $this->db->table('user')->getWhere(['telephone' => $post['no_hp']]);
        $user = $query->getRow();
        
        if ($user) {
            $level = $user->level;
            if ($level == 'admin') {
                if (password_verify($post['password'], $user->password)) {
                    $params = [
                        'id' => $user->id,
                    ];
                    session()->set($params);
                    return redirect()->to(site_url('dashboard'));
                } else {
                    return redirect()->back()->with('error', 'Password tidak sesuai!');
                }
            } else {
                return redirect()->back()->with('error', 'No. telepon dan kata sandi belum terdaftar');
            }
        } else {
            return redirect()->back()->with('error', 'No. telepon tidak ditemukan');
        }
    }

    public function forgotPassword()
    {
        $data['title'] = 'Lupa Kata Sandi';
        session()->remove('telp');
        return view('auth/forgotPassword', $data);
    }

    public function forgotPasswordProccess()
    {
        $telp = $this->request->getPost('no_hp');
        $query = $this->db->table('user')->getWhere(['telephone' => $telp]);
        $user = $query->getRow();

        if ($user) {
            $params = [
                'id' => $user->id,
                'telp' => $user,
            ];
            
            session()->set($params);
            session()->remove('id');
            return redirect()->to(site_url('setel-ulang-kata-sandi'));
        } else {
                return redirect()->to(site_url('lupa-kata-sandi'))->with('error', 'No. telepon belum terdaftar!');
        }
    }
    
    public function resetPassword()
    {
        if (!session('telp')) {
            return redirect()->to(site_url('auth'));
        }

        $data['title'] = 'Setel Ulang Kata Sandi';

        return view('auth/resetPassword', $data);
    }

    public function resetPasswordProccess()
    {
        $doValid = $this->validate([
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
            if (!session('telp')) {
                return redirect()->to(site_url('auth'));
            }

            $data = [
                'title' => 'Setel Ulang Kata Sandi',
                'validation' => $this->validator
            ];
            return view('auth/resetPassword', $data);
        } else {
            $new_password = $this->request->getVar('new_password');

            $id = session('id');
            $param = [
                'password' => password_hash($new_password, PASSWORD_DEFAULT),
                'modified_at' => Time::now()
            ];
            $this->profile->update($id, $param);
            session()->remove('id');
            session()->remove('telp');
            return redirect()->to(site_url('auth'))->with('success', 'Kata sandi berhasil diubah!');
        }
    }
    
    public function logout()
    {
        session()->remove('id');
        return redirect()->to(site_url('auth'));
    }
}
