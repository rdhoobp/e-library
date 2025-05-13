<?php

namespace App\Controllers;

class controla extends BaseController
{
    public function index(): string
    {
        return view('tampilan/main_page');
    }
}
