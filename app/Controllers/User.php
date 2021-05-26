<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Myth\Auth\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Profile'
        ];
        return view('user/index', $data);
    }
    public function edit($id)
    {

        $user = $this->usersModel->getUser($id);
        $data = [
            'title' => 'Edit Profile',
            'user' => $user
        ];

        return view('user/edit', $data);
    }
    public function update($id)
    {
        $id = user()->id;
        $this->usersModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'telp' => $this->request->getVar('telp'),

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        return redirect()->to('/user');
    }
}
