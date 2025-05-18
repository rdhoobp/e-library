<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('tampilan/main_page');
	}
	public function login()
	{
		return view('tampilan/login.php');
	}
	public function register()
	{
		return view('tampilan/register.php');
	}
}
