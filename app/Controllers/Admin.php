<?php

namespace App\Controllers;

use App\Models\Model_Auth;

class Admin extends BaseController
{

    protected $Model_Auth;

    public function __construct() {
        helper('form');
        $this -> Model_Auth = new Model_Auth();
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
