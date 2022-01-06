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

  public function delete()
  {
    $this->myHelper->checkAjaxRequest($this);

    $ids = $this->request->getPost('id');
    $this->model->whereIn('id', $ids)->delete();
    echo json_encode(['status' => TRUE, 'message' => 'Data berhasil dihapus']);
  }
}
