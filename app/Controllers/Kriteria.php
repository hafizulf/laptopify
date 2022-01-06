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

  public function getDataById()
  {
    $this->myHelper->checkAjaxRequest($this);

    $id = $this->request->getPost('id');
    $data = $this->model->find($id);
    echo json_encode($data);
  }

  public function update()
  {
    $id = $this->request->getPost('id');
    $nama = $this->request->getPost('nama');

    $data = $this->model->find($id);
    $rules = ($data['nama'] == $nama ? 'required' : 'required|is_unique[kriteria.nama]');

    $rules = [
      'nama' => $rules,
      'jenis' => 'required'
    ];

    $isValidated = $this->myHelper->fieldValidation($rules, $this);
    if ($isValidated !== TRUE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $isValidated]);
    }

    $this->model->save([
      'id' => $id,
      'nama' => $nama,
      'jenis' => $this->request->getPost('jenis'),
    ]);

    return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil diperbarui']);
  }
}
