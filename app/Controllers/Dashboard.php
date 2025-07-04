<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $id = session('id');
        $model = new UserModel();
        $data['user'] = $model->where('id_user', $id)->first();
        $data['title'] = "dashboard";
        return view('admin/index.php', $data);
    }
}
