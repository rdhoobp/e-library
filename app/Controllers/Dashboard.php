<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = "dashboard";
        return view('admin/index.php', $data);
    }
}
