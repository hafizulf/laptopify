<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kriteria extends BaseController
{
  public function index()
  {
    $data['judul'] = 'Data Kriteria';
    return view('kriteria/index', $data);
  }

  public function create()
  {
    if(!$this->request->isAJAX()) {
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

      echo json_encode(['status' => FALSE, 'errors' => $errors]);
    }
  }
}
