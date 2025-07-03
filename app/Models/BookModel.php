<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'book_id';
    protected $allowedFields = [
        'book_id',
        'title',
        'author',
        'publisher',
        'genre_id',
        'isbn',
        'role',
        'cover',
        'pdf_link',
        'created_at',
        'updated_at',
        'hit_counter'
    ];
}
