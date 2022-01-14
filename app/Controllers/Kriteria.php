<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kriteria as KriteriaModel;

class Kriteria extends BaseController
{
  public function __construct()
  {
    $this->model = new KriteriaModel();
  }

  public function index()
  {
    $data = [
      'judul' => 'Data Kriteria',
      'kriteria' => $this->model->findAll(),
    ];

    return view('kriteria/index', $data);
  }

  public function create()
  {
    $this->myHelper->checkAjaxRequest($this);

    $nama = ucwords($this->request->getPost('nama'));
    $data = [
      'nama' => $nama,
      'jenis' => $this->request->getPost('jenis'),
      'data_kuantitatif' => $this->request->getPost('data_kuantitatif'),
    ];

    if ($this->model->save($data) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil ditambahkan']);
    }
  }

  public function delete()
  {
    $this->myHelper->checkAjaxRequest($this);

    $ids = $this->request->getPost('id');
    $this->model->whereIn('id', $ids)->delete();
    return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil dihapus']);
  }

  public function getDataById()
  {
    $this->myHelper->checkAjaxRequest($this);

    $id = $this->request->getPost('id');
    $data = $this->model->find($id);
    return $this->response->setJSON($data);
  }

  public function update()
  {
    $this->myHelper->checkAjaxRequest($this);

    $nama = ucwords($this->request->getPost('nama'));
    $data = [
      'id' => $this->request->getPost('id'),
      'nama' => $nama,
      'jenis' => $this->request->getPost('jenis'),
      'data_kuantitatif' => $this->request->getPost('data_kuantitatif'),
    ];

    if ($this->model->save($data) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil diperbarui']);
    }
  }
}
