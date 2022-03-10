<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
  public function index()
  {
    $data = [
      'judul' => 'Login Page',
    ];

    return view('auth/login', $data);
  }
}
