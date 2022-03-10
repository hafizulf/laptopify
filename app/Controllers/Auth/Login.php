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

    $db = \Config\Database::connect();
    $user = $db->table('users')->where('username', $username)->get()->getRowArray();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $user['is_login'] = true;
        $this->session->set($user);
        return $this->response->setJSON(['status' => TRUE, 'redirect' => '/']);
      } else {
        return $this->response->setJSON(['status' => FALSE, 'errors' => ['password' => 'Password salah!']]);
      }
    } else {
      return $this->response->setJSON(['status' => FALSE, 'errors' => ['username' => 'Username tidak ditemukan']]);
    }
  }
}
