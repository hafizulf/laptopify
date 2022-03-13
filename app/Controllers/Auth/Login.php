<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Controllers\Auth\RememberMe;

class Login extends BaseController
{
  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->rememberMe = new RememberMe();
  }

  public function index()
  {
    if (session('is_login')) {
      return redirect()->back();
    }

    if ($this->rememberMe->checkUserLogin() === TRUE) {
      return redirect()->to('/');
    } else {
      $data = [
        'judul' => 'Login Page',
      ];

      return view('auth/login', $data);
    }
  }

  public function fieldValidation()
  {
    $rules = [
      'username' => 'required',
      'password' => 'required',
    ];

    if (!$this->validate($rules)) {
      $errors = [
        'username' => $this->validation->getError('username'),
        'password' => $this->validation->getError('password'),
      ];
      return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
    } else {
      return $this->_login();
    }
  }

  private function _login()
  {
    $username = htmlspecialchars($this->request->getPost('username'), TRUE);
    $password = htmlspecialchars($this->request->getPost('password'), TRUE);

    $user = $this->db->table('users')
      ->join('user_roles', 'users.id_user_role = user_roles.id_user_role')
      ->where('username', $username)
      ->get()->getRowArray();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        if ($this->request->getPost('remember')) {
          $this->rememberMe->saveUserLogin($username);
        }

        $user['is_login'] = true;
        session()->set($user);

        return $this->response->setJSON(['status' => TRUE, 'redirect' => '/']);
      } else {
        return $this->response->setJSON(['status' => FALSE, 'errors' => ['password' => 'Password salah!']]);
      }
    } else {
      return $this->response->setJSON(['status' => FALSE, 'errors' => ['username' => 'Username tidak ditemukan']]);
    }
  }
}
