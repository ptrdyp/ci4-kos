<?php

namespace App\Controllers;

class User extends BaseController
{

    public function index(): string
    {
        $data = [
            'judul' => 'Home',
            'page' => 'user/pages/profile',
        ];
        return view('user/layout/template', $data);
    }

}
