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

  public function create()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = $this->request->getPost();
    $result = $this->model->save($data);

    if ($result === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil ditambahkan']);
    }
  }

  public function getDataById()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $id = $this->request->getPost('id');
    $data = $this->model->find($id);
    return $this->response->setJSON($data);
  }
}
