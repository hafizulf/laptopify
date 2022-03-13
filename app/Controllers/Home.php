<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
  public function index()
  {
    $data = [
      'judul' => 'Home Page',
    ];

    return view('informasi/index', $data);
  }
}
