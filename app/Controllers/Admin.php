<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;
use App\Models\UsersModel;

class Admin extends BaseController
{
    protected $usersModel;
    protected $db, $builder;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();
        $data = [
            'title' => 'User List',
            'users' => $query->getResult(),
            'userss' => $this->usersModel->paginate(10, 'users'),
            'pager' => $this->usersModel->pager,
        ];
        // dd($data);
        return view('admin/index', $data);
    }
    public function detail($id = 0)
    {
        $this->builder->select('users.id as userid, username, email, name, fullname, user_img, telp');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();
        $data = [
            'title' => 'User List',
            'user' => $query->getRow(),
        ];
        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }
        return view('admin/userdetail', $data);
    }
}
