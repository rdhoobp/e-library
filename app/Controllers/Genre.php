<?php

namespace App\Controllers;

use App\Models\GenreModel;

class Genre extends BaseController
{
    public function index()
    {
        $model = new GenreModel();
        $data['genre'] = $model->findAll();
        $data['title'] = "genre";
        return view('admin/genre/genre_data.php', $data);
    }
    public function edit($id)
    {
        $model = new GenreModel();
        $data['genre'] = $model->where('genre_id', $id)->first();
        $data['title'] = "genre";
        return view('admin/genre/edit.php', $data);
    }
    public function tambah()
    {
        $data['title'] = "genre";
        return view('admin/genre/tambah.php', $data);
    }
    public function genre_input() {
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
    public function genre_update() {}
}
