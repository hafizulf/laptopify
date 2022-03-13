<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ManageRole extends BaseController
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

  public function save()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = $this->request->getPost();
    $result = $this->model->save($data);

    if ($result === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      $msg = isset($data['id_user_role']) ? 'diperbaharui' : 'ditambahkan';
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil ' . $msg]);
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

  public function delete()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $ids = $this->request->getPost('id');
    $this->model->whereIn('id_user_role', $ids)->delete();
    return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil dihapus']);
  }
}
