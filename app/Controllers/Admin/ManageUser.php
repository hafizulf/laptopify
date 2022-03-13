<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ManageUser extends BaseController
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

  public function save()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = $this->request->getPost();

    if ($this->model->save($data) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      $msg = isset($data['id_user']) ? 'diperbaharui' : 'ditambahkan';
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
    $this->model->whereIn('id_user', $ids)->delete();
    return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil dihapus']);
  }
}
