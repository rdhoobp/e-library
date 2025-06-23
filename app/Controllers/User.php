<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
	public function index()
	{
		return view('backend/user/user_data.php');
	}
	public function user_edit()
	{
		return view('backend/user/user_edit.php');
	}
}
