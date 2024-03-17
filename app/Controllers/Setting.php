<?php

namespace App\Controllers;

use App\Models\Model_Fakultas;
use App\Models\Model_Setting;

class Setting extends BaseController
{

    protected $Model_Setting;
    protected $Model_Fakultas;

    public function __construct() {
        helper('form');
        $this -> Model_Setting = new Model_Setting();
        $this -> Model_Fakultas = new Model_Fakultas();
    }

    public function index(): string {
        $uri = service('uri');
        $data = [
            'judul' => 'Pengaturan Website',
            'page' => 'admin/pages/setting',
            'setting' => $this -> Model_Setting -> getData(),
            'fakultas' => $this -> Model_Fakultas -> getAllData(),
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function update_setting() {
        $data = [
            'id' => 1,
            'nama_web_depan' => $this->request->getPost('nama_web_depan'),
            'nama_web_belakang' => $this->request->getPost('nama_web_belakang'),
            'coordinat' => $this->request->getPost('coordinat'),
            'zoom_view' => $this->request->getPost('zoom_view'),
        ];
        $this -> Model_Setting -> UpdateData($data);
        session() -> setFlashdata('pesan', 'Pengaturan Website berhasil diperbarui !');
        return redirect() -> to('admin/setting');
    }

}
