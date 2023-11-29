<?php

namespace App\Controllers;

class Gamifikasi extends BaseController
{

    public function index()
    {
        $data['title'] = 'Gamifikasi';
        return view('Gamifikasi/gamifikasi', $data);
    }
}
