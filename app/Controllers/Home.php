<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    $data['judul'] = 'Home Page';
    return view('welcome_message', $data);
  }
}
