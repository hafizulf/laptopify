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
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $nama = strtolower(str_replace(" ", "_", $this->request->getPost('nama')));
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
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $ids = $this->request->getPost('id');
    $this->model->whereIn('id', $ids)->delete();
    return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil dihapus']);
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

  public function update()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

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
