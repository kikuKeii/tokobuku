<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $allowedFields = ['id_user', 'id_buku', 'jumlah', 'total', 'created_by', 'update_by', 'alamat', 'ongkir',  'status'];
    protected $returnType = 'App\Entities\Transaksi';
    protected $useTimestamps = true;
}
