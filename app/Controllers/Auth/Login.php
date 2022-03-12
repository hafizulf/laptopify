<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function index()
  {
    if (get_cookie('key') && get_cookie('usr_idntty')) {

      $id_user = get_cookie('key');
      $username = get_cookie('usr_idntty');

      $user = $this->db->table('users')->where('id_user', $id_user)->get()->getRowArray();

      if ($username === hash('sha256', $user['username'])) {
        $user['is_login'] = true;
        $this->session->set($user);

        return redirect()->to('/');
      }
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

    $user = $this->db->table('users')->where('username', $username)->get()->getRowArray();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        if ($this->request->getPost('remember')) {
          set_cookie('key', $user['id_user'], 604800);
          set_cookie('usr_idntty', hash('sha256', $user['username']), 604800);
        }

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
