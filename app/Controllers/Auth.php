<?php

namespace App\Controllers;

use App\Models\Model_Auth;

class Auth extends BaseController
{
    protected $Model_Auth;

    public function __construct() {
        helper('form');
        $this -> Model_Auth = new Model_Auth();
    }

    public function register()
    {
        $data = [
            'judul' => 'Register',
            'page' => 'auth/register',
        ];
        return view('auth/template', $data);
    }

    public function save_register()
    {
        if($this -> validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'pass_confirm' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => '{field} tidak sama'
                ]
            ],
        ])) {
            $data = array (
                'email' => $this -> request -> getPost('email'),
                'password' => $this -> request -> getPost('password'),
                'level' => 4
            );
            $this -> Model_Auth -> save_register($data);
            session() -> setFlashdata('pesan', 'Pendaftaran berhasil, silakan masuk ke akun anda');
            return redirect() -> to(base_url('/auth/login'));
        } else {
            session() -> setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect() -> to(base_url('/auth/register'));
        }
    }

    public function login()
    {
        $data = [
            'judul' => 'Login',
            'page' => 'auth/login',
        ];
        return view('auth/template', $data);
    }

    public function cek_login() 
    {
        if($this -> validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
        ])) {
            $email = $this -> request -> getPost('email');
            $password = $this -> request -> getPost('password');
            $cek = $this -> Model_Auth -> cek_login($email, $password);
            if ($cek) {
                $levelName = $this->Model_Auth->getLevelName($cek['level']);

                session() -> set('log', true);
                session() -> set('nama', $cek['nama']);
                session() -> set('email', $cek['email']);
                session() -> set('no_hp', $cek['no_hp']);
                session() -> set('level', $cek['level']);
                session() -> set('foto', $cek['foto']);
                session()->set('level_name', $levelName);
                
                return redirect() -> to(base_url('/admin'));
            } else {
                session() -> setFlashdata('error', 'Login gagal, username atau password tidak cocok');
                return redirect() -> to(base_url('/auth/login'));
            }
        } else {
            session() -> setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect() -> to(base_url('/auth/login'));
        }
    }

    public function logout() {
        session() -> remove('log');
        session() -> remove('nama');
        session() -> remove('email');
        session() -> remove('no_hp');
        session() -> remove('level');
        session() -> remove('foto');
        return redirect() -> to(base_url('/auth/login'));
    }

}
