<?php

namespace App\Controllers;

use App\Models\UserModel;

class Book extends BaseController
{
    public function index()
    {
        $data['title'] = "book";
        return view('admin/book/book_data.php', $data);
    }
}
