<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin\User as UserModel;

class User extends BaseController
{
  public function __construct()
  {
    $this->model = new UserModel();
  }

  public function index()
  {
    $username = session('username');
    $user = $this->model
      ->join('user_roles', 'users.id_user_role = user_roles.id_user_role')
      ->getWhere(['username' => $username])
      ->getRowArray();

    $data = [
      'judul' => 'My Profile',
      'data' => $user,
    ];

    return view('user/index', $data);
  }

  public function getDataById()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $id = $this->request->getPost('id');
    $user = $this->model->getWhere(['id_user' => $id])->getRowArray();

    return $this->response->setJSON($user);
  }

  public function update()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = $this->request->getPost();

    if ($this->model->save($data) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil diperbarui']);
    }
  }
}
