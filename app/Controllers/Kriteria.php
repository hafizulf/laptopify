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
    $this->myHelper->checkAjaxRequest($this); // check ajax request? return page not found

    $rules = [
      'nama' => 'required',
      'jenis' => 'required',
    ];

    $isValidated = $this->myHelper->fieldValidation($rules, $this);
    if ($isValidated !== TRUE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $isValidated]);
    }

    $this->model->save([
      'nama' => $this->request->getPost('nama'),
      'jenis' => $this->request->getPost('jenis'),
    ]);

    return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil ditambahkan']);
  }

  public function getData()
  {
    $this->myHelper->checkAjaxRequest($this);

    $data['kriteria'] = $this->model->findAll();
    echo json_encode(view('kriteria/source-data', $data));
  }
}
