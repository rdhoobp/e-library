<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    // public function index()
    // {
    // 	return view('admin/index.php');
    // }
    public function user_index()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $model = new UserModel();
        $data['users'] = $model->findAll();
        $data['title'] = "user";
        return view('admin/user/user_data.php', $data);
    }
    public function user_edit()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        return view('admin/user/user_edit.php');
    }
    public function user_input()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $model = new UserModel();
        $validate = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Harus Di isi!!!'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Kolom Username Harus Di isi!!!',
                    'is_unique' => 'Username sudah terdaftar!! Harap gunakan username lain!!!'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => 'Kolom Email Harus Di isi!!!',
                    'is_unique' => 'Akun email sudah terdaftar!! Harap gunakan akun email lain!!!'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'min_length' => 'Password yang dimasukan terlalu pendek!! Minimal terdapat 8 kata'
                ]
            ],
            'password_confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'matches' => 'Password yang anda masukkan tidak sama!!'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Role User Harus Di isi!!!'
                ]
            ]
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }
        $data = $this->request->getPost(['name', 'username', 'email', 'password', 'role']);
        $data['title'] = "user";
        $save = $model->save($data);
        if ($save) {
            session()->setFlashdata("success", "User Berhasil Di Inputkan!");
            return redirect()->back();
        } else {
            session()->setFlashdata("error", $model->errors());
            return redirect()->back();
        }
    }
}
