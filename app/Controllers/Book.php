<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\GenreModel;

class Book extends BaseController
{
    public function index()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $model = new BookModel();
        $genre = new GenreModel();
        $data['book'] = $model->findAll();
        $data['genre'] = $genre->findAll();
        $data['title'] = "book";
        return view('admin/book/book_data.php', $data);
    }
    public function edit($id)
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $model = new BookModel();
        $data['book'] = $model->where('book_id', $id)->first();
        $data['title'] = "book";
        return view('admin/book/edit.php', $data);
    }
    public function tambah()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $data['title'] = "book";
        return view('admin/book/tambah.php', $data);
    }
    public function book_input()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
    }
    public function book_update()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
    }
}
