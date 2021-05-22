<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Session\Session;

class Buku extends BaseController
{
    private $url = "https://api.rajaongkir.com/starter/";
    private $apiKey = "c7e496eb1dc4c283c04c47fbd3126dd5";
    protected $bukuModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Buku',
            'buku' => $this->bukuModel->paginate(10, 'buku'),
            'pager' => $this->bukuModel->pager
        ];
        return view('buku/index', $data);
    }
    public function detail($slug)
    {
        $buku = $this->bukuModel->getBuku($slug);
        $data = [
            'title' => 'Detail Buku',
            'buku' => $buku
        ];
        // dd($data);
        return view('buku/detail', $data);
    }
    public function create()
    {

        session();
        $data = [
            'title' => 'Form Buku Baru',
            'validation' => \Config\Services::validation()
        ];
        // dd(session());
        return view('buku/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} buku harus diisi.',
                    'is_unique' => '{field} buku sudah terdaftar.'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.'
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.'
                ]
            ],
            'bahasa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/buku/create')->withInput();
        }
        //kelola gambar
        $fileSampul = $this->request->getFile('sampul');
        if ($fileSampul->getError() == 4) {
            # code...
            $namaSampul = 'buku_default.jpg';
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('img/buku', $namaSampul);
        }

        //save
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'tahun' => $this->request->getVar('tahun'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'bahasa' => $this->request->getVar('bahasa'),
            'jmlhHal' => $this->request->getVar('jmlhHal'),
            'sampul' => $namaSampul,
            'sinopsis' => $this->request->getVar('sinopsis'),
            'harga' => $this->request->getVar('harga'),
            'jumlah' => $this->request->getVar('jumlah')

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil ditambhakan.');
        return redirect()->to('/buku');
    }
    public function delete($id)
    {
        $buku = $this->bukuModel->find($id);
        if ($buku['sampul'] != 'buku_default.jpg') {
            $buku = $this->bukuModel->find($id);
            unlink('img/buku/' . $buku['sampul']);
        }


        $this->bukuModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil data berhasil dihapus.');
        return redirect()->to('/buku');
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'Form Buku Baru',
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->getBuku($slug)
        ];
        // dd(session());
        return view('buku/edit', $data);
    }
    public function update($id)
    {
        $bukuLama = $this->bukuModel->getBuku($this->request->getVar('slug'));
        if ($bukuLama['judul'] == $this->request->getVar('judul')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[buku.judul]';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $rule,
                'errors' => [
                    'required' => '{field} buku harus diisi.',
                    'is_unique' => '{field} buku sudah terdaftar.'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.'
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.'
                ]
            ],
            'bahasa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/buku/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        //cek
        if ($fileSampul->getError() == 4) {
            # code...
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $buku = $this->bukuModel->find($id);
            if ($buku['sampul'] != 'buku_default.jpg' || $buku['sampul']->getError() == 4) {
                $namaSampul = $fileSampul->getRandomName();
                $fileSampul->move('img/buku', $namaSampul);
            } else {
                $namaSampul = $fileSampul->getRandomName();
                $fileSampul->move('img/buku', $namaSampul);
                unlink('img/buku/' . $this->request->getVar('sampulLama'));
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'tahun' => $this->request->getVar('tahun'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'bahasa' => $this->request->getVar('bahasa'),
            'jmlhHal' => $this->request->getVar('jmlhHal'),
            'sinopsis' => $this->request->getVar('sinopsis'),
            'sampul' => $namaSampul,
            'harga' => $this->request->getVar('harga'),
            'jumlah' => $this->request->getVar('jumlah')

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil diubah.');
        return redirect()->to('/buku');
    }
    // public function beli($id)
    // {
    //     $buku = $this->bukuModel->find($id);
    //     $provinsi = $this->rajaongkir('province');
    //     $data = [
    //         'title' => 'Beli Buku',
    //         'buku' => $buku,
    //         'provinsi' => json_decode($provinsi)->rajaongkir->results
    //     ];
    //     return view('/buku/beli', $data);
    // }
    // public function getCity()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id_province = $this->request->getGet('id_province');
    //         $data = $this->rajaongkir('city', $id_province);
    //         return $this->response->setJSON($data);
    //     }
    // }
    // private function rajaongkir($method, $id_province = null)
    // {
    //     $endPoint = $this->url . $method;
    //     if ($id_province != null) {
    //         # code...
    //         $endPoint = $endPoint . "?province=" . $id_province;
    //     }

    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $endPoint,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => array(
    //             "key: " . $this->apiKey
    //         ),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);
    //     return $response;
    // }
}
