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
}
