<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class ManageRole extends Controller
{
  public function __construct()
  {
    $this->model = new \App\Models\Admin\UserRole();
  }
  public function index()
  {
    $data = [
      'judul' => 'Manage Role',
      'roles' => $this->model->findAll(),
    ];

    return view('admin/manage-role', $data);
  }
}
