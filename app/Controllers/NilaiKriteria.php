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
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $nilaiKriteria = [];

    for ($i = 0; $i < sizeof($alternatif); $i++) {
      for ($j = 0; $j < sizeof($kriteria); $j++) {
        // cek kriteria.nama dlm array alternatif
        if (array_key_exists($kriteria[$j]['nama'],  $alternatif[$i])) {
          $data = [
            'alternatif_id' => $alternatif[$i]['id'],
            'kriteria_id' => $kriteria[$j]['id'],
            'nilai_kriteria' => $alternatif[$i][$kriteria[$j]['nama']],
          ];

          array_push($nilaiKriteria, $data);
        }
      }
    }

    return $nilaiKriteria;
  }

  public function setNilaiKriteriaKualitatif($alternatif, $subkriteria)
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $nilaiKriteria = [];

    for ($i = 0; $i < sizeof($alternatif); $i++) {

      foreach ($subkriteria as $key => $row) {
        if ($alternatif[$i][$row['nama_kriteria']] == $row['nama']) {
          $data = [
            'alternatif_id' => $alternatif[$i]['id'],
            'kriteria_id' => $row['kriteria_id'],
            'nilai_kriteria' => $row['nilai_preferensi'],
          ];

          array_push($nilaiKriteria, $data);
        }
      }
    }

    return $nilaiKriteria;
  }

  public function setNilaiKriteria()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $alternatif = $this->alternatifModel->getAlternatifCriteria();
    $kriteria = $this->kriteriaModel->getQuantitativeCriteria();
    $subkriteria = $this->subkriteriaModel->getSpesificSubkriteria();

    $dataKuantitatif = $this->setNilaiKriteriaKuantitatif($alternatif, $kriteria);
    $dataKualitatif = $this->setNilaiKriteriaKualitatif($alternatif, $subkriteria);

    $nilaiKriteria = array_merge($dataKuantitatif, $dataKualitatif);

    if (sizeOf($nilaiKriteria) <= 0) {
      return $this->response->setJSON(['status' => TRUE, 'warning' => 'Belum ada data!']);
    }

    if ($this->model->setNilaiKriteria($nilaiKriteria) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Nilai Kriteria Berhasil Diperbarui']);
    }
  }
}
