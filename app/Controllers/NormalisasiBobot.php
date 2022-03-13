<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bobot;
use App\Models\NormalisasiBobot as ModelsNormalisasiBobot;

class NormalisasiBobot extends BaseController
{
  public function __construct()
  {
    $this->model = new ModelsNormalisasiBobot();
    $this->bobotModel = new Bobot();
  }

  public function normalisasi()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $bobot = $this->bobotModel->getNilaiBobot();
    $nilaiBobot = array_column($bobot, 'nilai_bobot');
    $totalNilaiBobot = array_sum($nilaiBobot);

    $bobotTernormalisasi = [];
    for ($i = 0; $i < sizeof($bobot); $i++) {
      $nilaiNormalisasiBobot = ($bobot[$i]['nilai_bobot'] / $totalNilaiBobot);
      $data = [
        'id_pembobotan' => $bobot[$i]['id_pembobotan'],
        'nilai_normalisasi_bobot' => $nilaiNormalisasiBobot,
      ];

      array_push($bobotTernormalisasi, $data);
    }

    if (sizeOf($bobot) <= 0) {
      return $this->response->setJSON(['status' => TRUE, 'warning' => 'Belum ada data bobot kriteria']);
    }

    if ($this->model->normalisasi($bobotTernormalisasi) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Normalisasi bobot berhasil']);
    }
  }
}
