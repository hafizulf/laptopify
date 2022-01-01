<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kriteria as KriteriaModel;

class Kriteria extends BaseController
{
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

    $model = new KriteriaModel();

    $model->save([
      'nama' => $this->request->getPost('nama'),
      'jenis' => $this->request->getPost('jenis'),
    ]);

    return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil ditambahkan']);
  }
}
