<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bobot as ModelsBobot;
use App\Models\Kriteria;

class Bobot extends BaseController
{
  public function __construct()
  {
    $this->model = new ModelsBobot();
    $this->kriteriaModel = new Kriteria();
  }

  public function index()
  {
    $data = [
      'judul' => 'Pembobotan',
      'bobot' => $this->model->findAllBobot(),
      'kriteria' => $this->kriteriaModel->getCriteria(),
    ];
    return view('bobot/index', $data);
  }

  public function create()
  {
    $this->myHelper->checkAjaxRequest($this);

    $data = [
      'kriteria_id' => $this->request->getPost('kriteria_id'),
      'nilai_bobot' => $this->request->getPost('nilai_bobot'),
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
    $data = $this->model->findBobotById($id);
    return $this->response->setJSON($data);
  }

  public function update()
  {
    $this->myHelper->checkAjaxRequest($this);

    $data = [
      'id' => $this->request->getPost('id'),
      'nilai_bobot' => $this->request->getPost('nilai_bobot'),
    ];

    if ($this->model->save($data) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil diperbarui']);
    }
  }
}
