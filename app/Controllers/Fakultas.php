<?php

namespace App\Controllers;

use App\Models\Model_Fakultas;
use App\Models\Model_Setting;

class Fakultas extends BaseController
{

    protected $Model_Fakultas;
    protected $Model_Setting;

    public function __construct() {
        helper('form');
        $this -> Model_Setting = new Model_Setting();
        $this -> Model_Fakultas = new Model_Fakultas();
    }

    public function index(): string {
        $uri = service('uri');
        $data = [
            'judul' => 'Data Fakultas',
            'page' => 'admin/pages/fakultas/index',
            'setting' => $this -> Model_Setting -> getData(),
            'fakultas' => $this -> Model_Fakultas -> getAllData(),
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function add_fakultas() {
        $uri = service('uri');
        $data = [
            'judul' => 'Tambah Data Fakultas',
            'page' => 'admin/pages/fakultas/add_fakultas',
            'setting' => $this -> Model_Setting -> getData(),
            'fakultas' => $this -> Model_Fakultas -> getAllData(),
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function save_fakultas() {
        if ($this -> validate ([
            'nama_fakultas' => [
                'label' => 'Nama Fakultas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'geojson' => [
                'label' => 'Geojson',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'warna' => [
                'label' => 'Warna',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            $data = array (
                'nama_fakultas' => $this -> request -> getPost('nama_fakultas'),
                'geojson' => $this -> request -> getPost('geojson'),
                'warna' => $this -> request -> getPost('warna'),
            );
            $this -> Model_Fakultas -> saveFakultas($data);
            session() -> setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect() -> to('/admin/fakultas');
        } else {
            session() -> setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect() -> to('/admin/add-fakultas') -> withInput();
        }
    }

    public function edit_fakultas($id_fakultas) {
        $uri = service('uri');
        $data = [
            'judul' => 'Tambah Data Fakultas',
            'page' => 'admin/pages/fakultas/edit_fakultas',
            'setting' => $this -> Model_Setting -> getData(),
            'fakultas' => $this -> Model_Fakultas -> detailFakultas($id_fakultas),
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function update_fakultas($id_fakultas) {
        $data = [
            'nama_fakultas' => $this->request->getPost('nama_fakultas'),
            'warna' => $this->request->getPost('warna'),
            'geojson' => $this->request->getPost('geojson'),
        ];
        $this -> Model_Fakultas -> updateData($id_fakultas, $data);
        session() -> setFlashdata('pesan', 'Data Fakultas berhasil diperbarui !');
        return redirect() -> to('admin/fakultas');
    }   
    
    public function delete_fakultas($id_fakultas) {
        $this -> Model_Fakultas -> deleteData($id_fakultas);
        session() -> setFlashdata('pesan', 'Data Fakultas berhasil dihapus !');
        return redirect() -> to('admin/fakultas');
    }
    
}
