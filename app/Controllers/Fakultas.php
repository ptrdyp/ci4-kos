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
            'page' => 'admin/pages/fakultas',
            'setting' => $this -> Model_Setting -> getData(),
            'fakultas' => $this -> Model_Fakultas -> getAllData(),
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    // public function insert_fakultas() {
    //     if ($this -> validate ([
    //         'nama_fakultas' => [
    //             'label' => 'Nama Fakultas',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} harus diisi'
    //             ]
    //         ],
    //         'geojson' => [
    //             'label' => 'Geojson',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} harus diisi'
    //             ]
    //         ],
    //     ])) {

    //     } else {

    //     }
    // }
}
