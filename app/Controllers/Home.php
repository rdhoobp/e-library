<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('tampilan/main_page');
	}
}
