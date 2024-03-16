<?php

namespace App\Controllers;

use App\Models\Model_Auth;
use App\Models\Model_Fakultas;

class Admin extends BaseController
{

    protected $Model_Auth;
    protected $Model_Fakultas;

    public function __construct() {
        helper('form');
        $this -> Model_Auth = new Model_Auth();
        $this -> Model_Fakultas = new Model_Fakultas();
    }

    public function index(): string
    {
        $uri = service('uri');
        $data = [
            'judul' => 'Dashboard',
            'page' => 'admin/pages/dashboard',
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function kos(): string
    {
        $uri = service('uri');
        $data = [
            'judul' => 'Daftar Kos',
            'page' => 'admin/pages/kos',
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function kamar(): string
    {
        $uri = service('uri');
        $data = [
            'judul' => 'Daftar Kamar',
            'page' => 'admin/pages/kamar',
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function fasilitas(): string
    {
        $uri = service('uri');
        $data = [
            'judul' => 'Daftar Fasilitas',
            'page' => 'admin/pages/fasilitas',
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function penyewaan(): string
    {
        $uri = service('uri');
        $data = [
            'judul' => 'Daftar Penyewaan',
            'page' => 'admin/pages/penyewaan',
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function akun_admin(): string
    {
        $uri = service('uri');
        $data = [
            'judul' => 'Daftar Admin',
            'page' => 'admin/pages/akun_admin',
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function fakultas(): string
    {
        $uri = service('uri');
        $data = [
            'judul' => 'Data Fakultas',
            'page' => 'admin/pages/fakultas',
            'fakultas' => $this -> Model_Fakultas -> getAllData(),
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }

    public function profile(): string
    {
        $uri = service('uri');
        $data = [
            'judul' => 'Profil Saya',
            'page' => 'admin/pages/profile',
            'active' => $uri->getSegment(2)
        ];
        return view('admin/layout/template', $data);
    }
}
