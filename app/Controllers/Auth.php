<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        if (session('id')) {
            return redirect()->to(site_url('dashboard'));
        }
        return view('auth/login');
    }

    public function proccess()
    {
        $post = $this->request->getPost();
        $query = $this->db->table('user')->getWhere(['telephone' => $post['no_hp']]);
        $user = $query->getRow();
        $level = $user->level;
        
        if ($level == 'admin') {
            if ($user) {
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
                return redirect()->back()->with('error', 'No. telepon tidak ditemukan');
            }
        } else {
            return redirect()->back()->with('error', 'No. telepon dan kata sandi belum terdaftar');
        }
    }

    public function logout()
    {
        session()->remove('id');
        return redirect()->to(site_url('auth'));
    }
}
