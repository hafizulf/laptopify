<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bobot as ModelsBobot;
use App\Models\Kriteria;
use App\Models\NormalisasiBobot;

class Bobot extends BaseController
{
  public function __construct()
  {
    $this->model = new ModelsBobot();
    $this->kriteriaModel = new Kriteria();
    $this->normalisasiBobotModel = new NormalisasiBobot();
  }

  public function index()
  {
    $bobot = $this->model->findAllBobot()->getResultArray();
    $normalisasiBobot = $this->normalisasiBobotModel->getNilaiNormalisasiBobot();

    if (sizeOf($bobot) > 0 && sizeOf($normalisasiBobot) > 0) {
      $jmlNilaiBobot = count($bobot);
      $jmlNilaiBobotTernormalisasi = count($normalisasiBobot);

      if ($jmlNilaiBobot !== $jmlNilaiBobotTernormalisasi) {
        $normalisasiBobot = 0;
      }
    }

    $data = [
      'judul' => 'Pembobotan',
      'bobot' => $bobot,
      'kriteria' => $this->kriteriaModel->getCriteria(),
      'normalisasi_bobot' => $normalisasiBobot,
    ];

    return view('bobot/index', $data);
  }

  public function create()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = $this->request->getPost();

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
    $this->model->whereIn('id_pembobotan', $ids)->delete();
    return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil dihapus']);
  }

  public function getDataById()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $id = $this->request->getPost('id');
    $data = $this->model->findBobotById($id);
    return $this->response->setJSON($data);
  }

  public function update()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = $this->request->getPost();

    if ($this->model->save($data) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil diperbarui']);
    }
  }
}
