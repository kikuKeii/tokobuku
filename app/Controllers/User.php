<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Profile'
        ];
        return view('user/index', $data);
    }
}
