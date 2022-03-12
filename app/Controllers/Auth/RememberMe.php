<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class RememberMe extends BaseController
{
  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function saveUserLogin($username)
  {
    $user = $this->db->table('users')->where('username', $username)->get()->getRowArray();

    set_cookie('acderf', $user['id_user'], 604800);
    set_cookie('usr_idntty', hash('sha256', $user['username']), 604800);
  }

  public function checkUserLogin()
  {
    if (get_cookie('acderf') && get_cookie('usr_idntty')) {

      $id_user = get_cookie('acderf');
      $username = get_cookie('usr_idntty');

      $user = $this->db->table('users')->where('id_user', $id_user)->get()->getRowArray();

      if ($username === hash('sha256', $user['username'])) {
        $user['is_login'] = true;
        session()->set($user);

        return TRUE;
      }
    }
  }
}
