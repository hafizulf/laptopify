<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin\User as UserModel;

class User extends BaseController
{
  public function index()
  {
    $userModel = new UserModel();

    $username = session('username');
    $user = $userModel
      ->join('user_roles', 'users.id_user_role = user_roles.id_user_role')
      ->getWhere(['username' => $username])
      ->getRowArray();

    $data = [
      'judul' => 'My Profile',
      'data' => $user,
    ];

    return view('user/index', $data);
  }
}
