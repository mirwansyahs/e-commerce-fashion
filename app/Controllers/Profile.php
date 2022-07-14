<?php

namespace App\Controllers;

use App\Models\ProfileModels;
use CodeIgniter\I18n\Time;

class Profile extends BaseController
{
    public function __construct()
    {
        $this->profile = new ProfileModels();
    }

    public function index()
    {
        $id = session('id');
        $data['title'] = 'Profil';
        $data['profile'] = $this->profile->find($id);
        return view('back-end/profile', $data);
    }

    public function save()
    {
        $id = session('id');

        $username = $this->request->getVar('username');
        $first_name = $this->request->getVar('first_name');
        $last_name = $this->request->getVar('last_name');
        $telephone = $this->request->getVar('telephone');

        $fileUploadImage = $_FILES['image']['name'];
        $profile = $this->profile->find($id);

        if ($fileUploadImage != NULL) {
            if ($profile['image'] == "avatar-1.png") {
                $nameFileImage = "$username";
                $fileImage = $this->request->getFile('image');
                $fileImage->move('img/backend/avatar/', $nameFileImage . '.' .$fileImage->getExtension());

                $pathImage = $fileImage->getName();
            }else {
                unlink('img/backend/avatar/' . $profile['image']);
                $nameFileImage = "$username";
                $fileImage = $this->request->getFile('image');
                $fileImage->move('img/backend/avatar/', $nameFileImage . '.' .$fileImage->getExtension());

                $pathImage = $fileImage->getName();
            }
        } else {
            $pathImage = $profile['image'];
        }
        
        $params = [
            'username' => $username,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'telephone' => $telephone,
            'image' => $pathImage,
            'modified_at' => Time::now()
        ];
        
        $this->profile->update($id, $params);

        return redirect()->to(site_url('profil'))->with('success', 'Profil berhasil diubah!');
    }
}
