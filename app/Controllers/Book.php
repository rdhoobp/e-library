<?php

namespace App\Controllers;

use App\Models\BookModel;

class Book extends BaseController
{
    public function index()
    {
        $model = new BookModel();
        $data['book'] = $model->findAll();
        $data['title'] = "book";
        return view('admin/book/book_data.php', $data);
    }
    public function edit($id)
    {
        $model = new BookModel();
        $data['book'] = $model->where('book_id',$id)->first();
        $data['title'] = "book";
        return view('admin/book/edit.php',$data);
    }
    public function tambah()
    {
        $data['title'] = "book";
        return view('admin/book/tambah.php',$data);
    }
    public function book_input()
    {

    }
    public function book_update()
    {

    }
}
