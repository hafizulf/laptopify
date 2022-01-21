<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Alternatif;
use App\Models\NilaiAkhir as ModelsNilaiAkhir;
use App\Models\NilaiUtility;
use App\Models\NormalisasiBobot;

class NilaiAkhir extends BaseController
{
  public function __construct()
  {
    $this->model = new ModelsNilaiAkhir();
    $this->alternatifModel = new Alternatif();
    $this->normalisasiBobotModel = new NormalisasiBobot();
    $this->nilaiUtilityModel = new NilaiUtility();
  }

  public function generateNilaiAkhir()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $nilaiBobotTernormalisasi = $this->normalisasiBobotModel->getNilaiNormalisasiBobot();
    $alternatif = $this->alternatifModel->getKodeAlternatif();

    $nilaiAkhir = [];
    $nilaiPenjumlahan = 0;

    for ($i = 0; $i < sizeof($alternatif); $i++) {
      $nilaiUtilityAlternatif = $this->nilaiUtilityModel->getNilaiUtility($alternatif[$i]['id']);

      for ($j = 0; $j < sizeof($nilaiUtilityAlternatif); $j++) {

        for ($k = 0; $k < sizeof($nilaiBobotTernormalisasi); $k++) {

          if ($nilaiUtilityAlternatif[$j]['kriteria_id'] == $nilaiBobotTernormalisasi[$k]['kriteria_id']) {
            $nilaiUtility = $nilaiUtilityAlternatif[$j]['nilai_utility'];
            $nilaiBobot = $nilaiBobotTernormalisasi[$k]['nilai_normalisasi_bobot'];

            $nilaiPenjumlahan +=  ($nilaiUtility * $nilaiBobot);
            break;
          }
        }
      }

      $data = [
        'alternatif_id' => $alternatif[$i]['id'],
        'nilai_akhir' => $nilaiPenjumlahan,
      ];

      array_push($nilaiAkhir, $data);
    }

    if ($this->model->saveNilaiAkhir($nilaiAkhir) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Nilai akhir berhasil diperbarui']);
    }
  }
}
