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

  protected function fieldValidation($rules)
  {
    $rulesSize = count($rules);
    $rulesConverted = array_keys($rules);

    if (!$this->validate($rules)) {
      $errors = [];

      for ($i = 0; $i < $rulesSize; $i++) {
        $errors[$rulesConverted[$i]] = $this->validation->getError($rulesConverted[$i]);
      }

      return $errors;
    } else {
      return TRUE;
    }
  }

  public function create()
  {
    $this->pnf->checkAjaxRequest($this); // check ajax request? return page not found

    $rules = [
      'nama' => 'required',
      'jenis' => 'required',
    ];

    $isValidated = $this->formValidator->fieldValidation($rules, $this);

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
    $this->pnf->checkAjaxRequest($this);

    $data['kriteria'] = $this->model->findAll();
    echo json_encode(view('kriteria/source-data', $data));
  }
}
