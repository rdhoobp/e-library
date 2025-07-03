<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $data['title'] = "dashboard";
        return view('admin/index.php', $data);
    }
}
