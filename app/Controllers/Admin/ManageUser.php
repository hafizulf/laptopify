<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class ManageUser extends Controller
{
  public function __construct()
  {
    $this->model = new \App\Models\Admin\User();
    $this->userRoleModel = new \App\Models\Admin\UserRole();
  }

  public function index()
  {
    $data = [
      'judul' => 'Manage User',
      'users' => $this->model->getUser(),
      'roles' => $this->userRoleModel->findAll(),
    ];

    return view('admin/manage-user', $data);
  }

  public function create()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = $this->request->getPost();

    if ($this->model->save($data) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil ditambahkan']);
    }
  }
}
