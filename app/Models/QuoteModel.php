<?php

namespace App\Models;

use CodeIgniter\Model;

class QuoteModel extends Model
{
    protected $table = 'quotes';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'quote',
        'author',
        'active',
    ];
}
