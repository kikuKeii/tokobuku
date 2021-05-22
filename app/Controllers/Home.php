<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Login'
		];
		return view('auth/login', $data);
	}
	public function register()
	{
		$data = [
			'title' => 'Register'
		];
		return view('auth/register', $data);
	}
}
