<?php

namespace App\Controllers;

use App\Models\GenreModel;

class Genre extends BaseController
{
    public function index()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $model = new GenreModel();
        $data['genre'] = $model->findAll();
        $data['title'] = "genre";
        return view('admin/genre/genre_data.php', $data);
    }
    public function edit($id)
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $model = new GenreModel();
        $data['genre'] = $model->where('genre_id', $id)->first();
        $data['title'] = "genre";
        return view('admin/genre/edit.php', $data);
    }
    public function tambah()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $data['title'] = "genre";
        return view('admin/genre/tambah.php', $data);
    }
    public function genre_input()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $model = new GenreModel();
        $validate = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Genre Harus Di isi!!!'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Deskripsi Harus Di isi!!!'
                ]
            ]
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }
        $data = $this->request->getPost(['name', 'description']);
        $data['title'] = "genre";
        $save = $model->save($data);
        if ($save) {
            session()->setFlashdata("success", "Genre Berhasil Di Inputkan!");
            return redirect()->back();
        } else {
            session()->setFlashdata("error", $model->errors());
            return redirect()->back();
        }
    }
    public function genre_update()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $model = new GenreModel();
        $validate = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Genre Harus Di isi!!!'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Deskripsi Harus Di isi!!!'
                ]
            ]
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }
        $data['genre'] = $this->request->getVar(['genre_id', 'name', 'description']);
        $data['title'] = "genre";
        $update = $model->where('genre_id', $data['genre']['genre_id'])->set([
            'name' => $data['genre']['name'],
            'description' => $data['genre']['description']
        ])->update();
        if ($update) {
            session()->setFlashdata("success", "Genre Berhasil Di Update!");
            return redirect()->back();
        } else {
            session()->setFlashdata("error", $model->errors());
            return redirect()->back();
        }
    }
}
