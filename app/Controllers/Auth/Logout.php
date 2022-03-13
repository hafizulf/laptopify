<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Logout extends BaseController
{
  public function index()
  {
    delete_cookie('acderf');
    delete_cookie('usr_idntty');

    session_destroy();
    return redirect()->to('/login')->withCookies();
  }
}
