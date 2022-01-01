<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kriteria extends BaseController
{
  public function index()
  {
    $data['judul'] = 'Data Kriteria';
    return view('kriteria/index', $data);
  }
}
