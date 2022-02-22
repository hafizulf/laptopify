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
    $nilaiUtility = $this->nilaiUtilityModel->getNilaiUtility();

    if (sizeOf($nilaiBobotTernormalisasi) <= 0 || sizeof($nilaiUtility) <= 0) {
      return $this->response->setJSON(['status' => TRUE, 'warning' => 'Data normalisasi bobot atau nilai utility belum ada!']);
    }

    $alternatif = $this->alternatifModel->getKodeAlternatif();

    $nilaiAkhir = [];

    for ($i = 0; $i < sizeof($alternatif); $i++) {
      $nilaiUtilityAlternatif = $this->nilaiUtilityModel->getNilaiUtility($alternatif[$i]['id_alternatif']);

      $nilaiPenjumlahan = 0;
      for ($j = 0; $j < sizeof($nilaiUtilityAlternatif); $j++) {

        for ($k = 0; $k < sizeof($nilaiBobotTernormalisasi); $k++) {

          if ($nilaiUtilityAlternatif[$j]['id_kriteria'] == $nilaiBobotTernormalisasi[$k]['id_kriteria']) {
            $nilaiUtility = $nilaiUtilityAlternatif[$j]['nilai_utility'];
            $nilaiBobot = $nilaiBobotTernormalisasi[$k]['nilai_normalisasi_bobot'];

            $nilaiPenjumlahan += ($nilaiUtility * $nilaiBobot);
            break;
          }
        }
      }

      $data = [
        'id_alternatif' => $alternatif[$i]['id_alternatif'],
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
