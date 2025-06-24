<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    public function index(){
        return view('admin/index.php');
    }
	public function user_add(){
        return view('admin/add_user.php');
    }
}
