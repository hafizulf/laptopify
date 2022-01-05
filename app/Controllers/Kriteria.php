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
    $data['judul'] = 'Data Kriteria';
    return view('kriteria/index', $data);
  }

  public function create()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $rules = [
      'nama' => 'required',
      'jenis' => 'required',
    ];

    if (!$this->validate($rules)) {
      $errors  = [
        'nama' => $this->validation->getError('nama'),
        'jenis' => $this->validation->getError('jenis'),
      ];

      return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
    }

    $this->model->save([
      'nama' => $this->request->getPost('nama'),
      'jenis' => $this->request->getPost('jenis'),
    ]);

    return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil ditambahkan']);
  }

  public function getData()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
    $data['kriteria'] = $this->model->findAll();
    echo json_encode(view('kriteria/source-data', $data));
  }
}
