<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;
use App\Models\UsersModel;
use App\Models\transaksiModel;
use App\Models\BukuModel;

class Admin extends BaseController
{
    protected $usersModel;
    protected $bukuModel;
    protected $transakiModel;
    protected $db, $builder;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->usersModel = new UsersModel();
        $this->bukuModel = new BukuModel();
        $this->transakiModel = new transaksiModel();
    }

    public function index()
    {
        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();
        $totalUser = $this->usersModel->countAll('users');
        $totalTransaksi = $this->transakiModel->countAll('transaksi');
        $totalBuku = $this->bukuModel->countAll('buku');
        $data = [
            'title' => 'Dashboard',
            'users' => $query->getResult(),
            'userss' => $this->usersModel->paginate(10, 'users'),
            'pager' => $this->usersModel->pager,
            'tuser' => $totalUser,
            'tbuku' => $totalBuku,
            'tT' => $totalTransaksi
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
            'title' => 'Detail User',
            'useri' => $query->getRow(),
        ];
        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }
        // dd($data);
        return view('admin/userdetail', $data);
    }
}
