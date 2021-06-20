<?php

namespace App\Controllers;

use App\Entities\Transaksi as EntitiesTransaksi;
use App\Models\BukuModel;
use App\Models\transaksiModel;
use App\Entities\Transaksii;
use TCPDF;

class Transaksi extends BaseController
{
    private $url = "https://api.rajaongkir.com/starter/";
    private $apiKey = "c7e496eb1dc4c283c04c47fbd3126dd5";
    protected $bukuModel;
    protected $transakiModel;
    protected $transaksi;
    protected $db, $builder;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->transakiModel = new transaksiModel();
        helper('form');
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('transaksi');
    }
    public function index()
    {
        $this->builder->select('transaksi.id as tid, id_user, id_buku, total, alamat, ongkir, transaksi.jumlah as jumBel, transaksi.status as sss, username, telp, fullname, sampul, judul, slug');
        $this->builder->join('users', 'users.id = id_user',);
        $this->builder->join('buku', 'buku.id = id_buku');
        if (!in_groups('admin')) {
            $this->builder->where('transaksi.id_user', user()->id);
        }

        $query = $this->builder->get();
        $data = [
            'title' => 'Transaksi',
            'transaksi' => $query->getResult()
        ];
        // dd($data);
        return view('transaksi/index', $data);
    }
    public function view($id)
    {
        $this->builder->select('transaksi.id as tid, id_user, id_buku, total, alamat, ongkir, transaksi.jumlah as jumBel, transaksi.status as sss, username, telp, fullname, sampul, judul, penulis, sinopsis, penerbit, tahun, bahasa, jmlhHal, transaksi.created_at as updat');
        $this->builder->join('users', 'users.id = id_user',);
        $this->builder->join('buku', 'buku.id = id_buku');
        if (in_groups('admin')) {
            $this->builder->where('transaksi.id', $id);
        }

        $query = $this->builder->get();
        $data = [
            'title' => 'Pemesanan ' . $id,
            't' => $query->getRow()
        ];
        // dd($data);

        return view('transaksi/view', $data);
    }
    public function invoice($id)
    {
        $this->builder->select('transaksi.id as tid, id_user, id_buku, total, alamat, ongkir, transaksi.jumlah as jumBel, transaksi.status as sss, username, telp, fullname, sampul, judul, penulis, sinopsis, penerbit, tahun, bahasa, jmlhHal, transaksi.created_at as updat, email, harga');
        $this->builder->join('users', 'users.id = id_user',);
        $this->builder->join('buku', 'buku.id = id_buku');
        if (!in_groups('admin')) {
            $this->builder->where('transaksi.id', $id);
        }

        $query = $this->builder->get();
        $data = [
            'title' => 'Pemesanan ' . $id,
            't' => $query->getRow()
        ];
        $html = view('transaksi/invoice', $data);
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Toko Buku');
        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('Invoice');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $this->response->setContentType('application/pdf');
        $pdf->Output('Invoice.pdf', 'I');
        return view('transaksi/invoice', $data);
    }
    public function beli($id)
    {
        session();
        $buku = $this->bukuModel->find($id);
        $provinsi = $this->rajaongkir('province');
        $data = [
            'title' => 'Beli Buku',
            'buku' => $buku,
            'provinsi' => json_decode($provinsi)->rajaongkir->results,
            'validation' => \Config\Services::validation()
        ];
        return view('/transaksi/beli', $data);
    }
    public function updateBeli()
    {
        if (!$this->validate([
            'id_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.',
                ]
            ],
            'id_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.',
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.',
                ]
            ],
            'total' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.',
                ]
            ],
            'ongkir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('/transaksi/beli/' . $this->request->getVar('id_buku'))->withInput();
        }

        $this->transakiModel->save([
            'id_user' => $this->request->getVar('id_user'),
            'id_buku' => $this->request->getVar('id_buku'),
            'jumlah' => $this->request->getVar('jumlah'),
            'total' => $this->request->getVar('total'),
            'created_by' => $this->request->getVar('id_user'),
            'updated_by' => $this->request->getVar('id_user'),
            'alamat' => $this->request->getVar('alamat'),
            'ongkir' => $this->request->getVar('ongkir'),
            'status' => $this->request->getVar('status'),

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil ditambhakan.');
        return redirect()->to('/transaksi/');
    }
    public function update($id)
    {
        $this->transakiModel->save([
            'id' => $id,
            'id_user' => $this->request->getVar('id_user'),
            'id_buku' => $this->request->getVar('id_buku'),
            'jumlah' => $this->request->getVar('jumlah'),
            'total' => $this->request->getVar('total'),
            'created_by' => $this->request->getVar('id_user'),
            'updated_by' => $this->request->getVar('id_user'),
            'alamat' => $this->request->getVar('alamat'),
            'ongkir' => $this->request->getVar('ongkir'),
            'status' => $this->request->getVar('status'),

        ]);
        return redirect()->to('/transaksi/');
    }
    public function getCity()
    {
        if ($this->request->isAJAX()) {
            $id_province = $this->request->getGet('id_province');
            $data = $this->rajaongkir('city', $id_province);
            return $this->response->setJSON($data);
        }
    }
    public function getCost()
    {
        if ($this->request->isAJAX()) {
            $origin = $this->request->getGet('origin');
            $destination = $this->request->getGet('destination');
            $weight = $this->request->getGet('weight');
            $courier = $this->request->getGet('courier');
            $data = $this->rejaongkircost($origin, $destination, $weight, $courier);
            return $this->response->setJSON($data);
        }
    }
    private function rejaongkircost($origin, $destination, $weight, $courier)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $destination . "&weight=" . $weight . "&courier=" . $courier . "",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . $this->apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
    }

    private function rajaongkir($method, $id_province = null)
    {
        $endPoint = $this->url . $method;
        if ($id_province != null) {
            # code...
            $endPoint = $endPoint . "?province=" . $id_province;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        return $response;
    }
}
