<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NilaiKriteria as ModelsNilaiKriteria;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Subkriteria;

class NilaiKriteria extends BaseController
{
  public function __construct()
  {
    $this->model = new ModelsNilaiKriteria();
    $this->kriteriaModel = new Kriteria();
    $this->alternatifModel = new Alternatif();
    $this->subkriteriaModel = new Subkriteria();
  }

  public function setNilaiKriteriaKuantitatif($alternatif, $kriteria)
  {
    $nilaiKriteria = [];
    for ($i = 0; $i < sizeOf($kriteria); $i++) {

      for ($j = 0; $j < sizeOf($alternatif); $j++) {
        // cek kriteria dengan tipe data kuantitatif
        if ($kriteria[$i]['data_kuantitatif'] == 1) {
          $nilaiKriteria[$i]['alternatif_id'] = $alternatif[$j]['id'];
          $nilaiKriteria[$i]['kriteria_id'] = $kriteria[$i]['id'];

          // cek kriteria.nama dlm array alternatif
          if (array_key_exists($kriteria[$i]['nama'],  $alternatif[$j])) {
            // set nilai_kriteria = value dari alternatif.nama
            $nilaiKriteria[$i]['nilai_kriteria'] = $alternatif[$j][$kriteria[$i]['nama']];
          }
        }
      }
    }
    return $nilaiKriteria;
  }

  public function setNilaiKriteriaKualitatif($alternatif, $subkriteria)
  {
    $nilaiKriteria = [];

    for ($i = 0; $i < sizeof($alternatif); $i++) {

      $keysAlternatif = array_keys($alternatif[$i]);
      for ($j = 0; $j < sizeof($keysAlternatif); $j++) {

        foreach ($subkriteria as $key => $row) {

          if ($keysAlternatif[$j] === $row['nama_kriteria']) {
            if ($alternatif[$i][$row['nama_kriteria']] == $row['nama']) {
              $nilaiKriteria[$i]['alternatif_id'] = $alternatif[$i]['id'];
              $nilaiKriteria[$i]['kriteria_id'] = $row['kriteria_id'];
              $nilaiKriteria[$i]['nilai_kriteria'] = $row['nilai_preferensi'];
            }
          }
        }
      }
    }

    return $nilaiKriteria;
  }

  public function setNilaiKriteria()
  {
    $alternatif = $this->alternatifModel->getAlternatifCriteria();
    $kriteria = $this->kriteriaModel->findAll();
    $subkriteria = $this->subkriteriaModel->getSpesificSubkriteria();

    $dataKuantitatif = $this->setNilaiKriteriaKuantitatif($alternatif, $kriteria);
    $dataKualitatif = $this->setNilaiKriteriaKualitatif($alternatif, $subkriteria);

    $nilaiKriteria = array_merge($dataKuantitatif, $dataKualitatif);

    if (sizeOf($nilaiKriteria) <= 0) {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Belum ada data bobot kriteria']);
    }

    if ($this->model->setNilaiKriteria($nilaiKriteria) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Nilai Kriteria Telah Diperbarui']);
    }
  }
}
