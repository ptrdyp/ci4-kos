<?php

namespace App\Controllers;

use App\Models\Model_Kos;
use App\Models\Model_Setting;

class Kos extends BaseController
{

    protected $Model_Kos;
    protected $Model_Setting;

    public function __construct() {
        helper('form');
        $this -> Model_Setting = new Model_Setting();
        $this -> Model_Kos = new Model_Kos();
    }

    public function index(): string {
        $uri = service('uri');
        $data = [
            'judul' => 'Data Kos',
            'page' => 'admin/pages/kos/index',
            'setting' => $this -> Model_Setting -> getData(),
            'kos' => $this -> Model_Kos -> getAllData(),
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function add_kos() {
        $uri = service('uri');
        $data = [
            'judul' => 'Tambah Data Kos',
            'page' => 'admin/pages/kos/add_kos',
            'setting' => $this -> Model_Setting -> getData(),
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function save_kos() {
        if ($this -> validate ([
            'kos_nama' => [
                'label' => 'Nama Kos',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kos_jenis' => [
                'label' => 'Jenis Kos',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            // 'kos_deposit' => [
            //     'label' => 'Deposit',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} harus diisi'
            //     ]
            // ],
        ])) {
            $data = array (
                'kos_nama' => $this -> request -> getPost('kos_nama'),
                'kos_jenis' => $this -> request -> getPost('kos_jenis'),
                'kos_deposit' => $this -> request -> getPost('kos_deposit'),
                'kos_waktu_sewa_terdekat' => $this -> request -> getPost('kos_waktu_sewa_terdekat'),
                'kos_waktu_sewa_terjauh' => $this -> request -> getPost('kos_waktu_sewa_terjauh'),
                'kos_alamat' => $this -> request -> getPost('kos_alamat'),
                'kos_tentang' => $this -> request -> getPost('kos_tentang'),
                'kos_coordinat' => $this -> request -> getPost('kos_coordinat'),
            );
            $this -> Model_Kos -> saveKos($data);
            session() -> setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect() -> to('/admin/kos');
        } else {
            session() -> setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect() -> to('/admin/add-kos') -> withInput();
        }
    }

    // public function edit_fakultas($id_fakultas) {
    //     $uri = service('uri');
    //     $data = [
    //         'judul' => 'Tambah Data Fakultas',
    //         'page' => 'admin/pages/fakultas/edit_fakultas',
    //         'setting' => $this -> Model_Setting -> getData(),
    //         'fakultas' => $this -> Model_Fakultas -> detailFakultas($id_fakultas),
    //         'active' => $uri->getSegment(2)
    //     ];
    //     return view('admin/layout/template', $data);
    // }

    // public function update_fakultas($id_fakultas) {
    //     $data = [
    //         'nama_fakultas' => $this->request->getPost('nama_fakultas'),
    //         'warna' => $this->request->getPost('warna'),
    //         'geojson' => $this->request->getPost('geojson'),
    //     ];
    //     $this -> Model_Fakultas -> updateData($id_fakultas, $data);
    //     session() -> setFlashdata('pesan', 'Data Fakultas berhasil diperbarui !');
    //     return redirect() -> to('admin/fakultas');
    // }   
    
    // public function delete_fakultas($id_fakultas) {
    //     $this -> Model_Fakultas -> deleteData($id_fakultas);
    //     session() -> setFlashdata('pesan', 'Data Fakultas berhasil dihapus !');
    //     return redirect() -> to('admin/fakultas');
    // }
    
}
