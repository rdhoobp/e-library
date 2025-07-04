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
    public function user_edit($id)
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $model = new UserModel();
        $data['user'] = $model->where('id_user', $id)->first();
        $data['title'] = "user";
        return view('admin/user/user_edit.php', $data);
    }
    public function user_add()
    {
        $data['title'] = "user";
        return view('admin/user/add_user.php', $data);
    }
    public function user_input()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $model = new UserModel(); {
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
    public function user_update()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }

        $model = new \App\Models\UserModel();
        $id = $this->request->getPost('id_user');

        $validate = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Harus Di isi!!!'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username,id_user,' . $id . ']',
                'errors' => [
                    'required' => 'Kolom Username Harus Di isi!!!',
                    'is_unique' => 'Username sudah terdaftar!! Harap gunakan username lain!!!'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email,id_user,' . $id . ']',
                'errors' => [
                    'required' => 'Kolom Email Harus Di isi!!!',
                    'valid_email' => 'Format Email tidak valid!!!',
                    'is_unique' => 'Email sudah terdaftar!! Harap gunakan email lain!!!'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Role Harus Di isi!!!'
                ]
            ],
            'profile' => [
                'rules' => 'max_size[profile,2048]|is_image[profile]|mime_in[profile,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                    'is_image' => 'File harus berupa gambar.',
                    'mime_in' => 'Gambar harus dalam format JPG, JPEG, atau PNG.'
                ]
            ]
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = [
            'name'     => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role'     => $this->request->getPost('role'),
        ];

        // === Handle Image Upload ===
        $file = $this->request->getFile('profile');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $oldImage = $model->find($id)['img'] ?? null;

            // Generate new file name
            $newName = $file->getRandomName();
            $file->move('asset/img/avatar', $newName);
            $data['img'] = $newName;

            // Delete old image if it's not default or null
            if (!empty($oldImage) && $oldImage !== 'default.jpg' && file_exists('asset/img/avatar/' . $oldImage)) {
                unlink('asset/img/avatar/' . $oldImage);
            }
        }

        // === Update User ===
        if ($model->update($id, $data)) {
            session()->setFlashdata("success", "User berhasil diperbarui!");
            return redirect()->to('/user/index');
        } else {
            session()->setFlashdata("error", "Gagal memperbarui data user.");
            return redirect()->back();
        }
    }
    public function user_delete($id)
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }

        $model = new \App\Models\UserModel();
        $userToDelete = $model->where('id_user', $id)->first();

        // Prevent deletion of own account
        if (session('id') == $id) {
            session()->setFlashdata('error', 'You cannot delete your own account.');
            return redirect()->back();
        }

        // Prevent deletion of other admins
        if ($userToDelete && $userToDelete['role'] == 1) {
            session()->setFlashdata('error', 'You cannot delete another admin account.');
            return redirect()->back();
        }

        if ($userToDelete) {
            // Delete avatar if exists
            if (!empty($userToDelete['img']) && file_exists(FCPATH . 'asset/img/avatar/' . $userToDelete['img'])) {
                unlink(FCPATH . 'asset/img/avatar/' . $userToDelete['img']);
            }

            $model->delete($id);
            session()->setFlashdata('success', 'User deleted successfully.');
        } else {
            session()->setFlashdata('error', 'User not found.');
        }

        return redirect()->to('/user/index');
    }
}
