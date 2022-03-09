<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class ManageUser extends Controller
{
  public function __construct()
  {
    $this->model = new \App\Models\Admin\ManageUser();
  }

  public function index()
  {
    $data = [
      'judul' => 'Manage User',
      'users' => $this->model->getUser(),
    ];

    return view('admin/manage-user', $data);
  }
}
