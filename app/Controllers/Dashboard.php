<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('backend/dashboard.php');
    }
}
