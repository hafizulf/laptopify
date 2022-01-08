<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Subkriteria extends BaseController
{
  public function index()
  {
    $data['judul'] = 'Sub Kriteria';
    return view('kriteria/subkriteria', $data);
  }
}
