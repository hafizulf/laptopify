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
            'id_alternatif' => $alternatif[$i]['id_alternatif'],
            'id_kriteria' => $kriteria[$j]['id_kriteria'],
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

    $data = [];
    $index = 0;
    $isExist = TRUE;
    $temp = '';

    for ($i = 0; $i < sizeof($alternatif); $i++) {

      for ($j = 0; $j < sizeof($subkriteria); $j++) {
        $init = $subkriteria[$j]['nama_kriteria'];

        if ($temp != '' && $temp != $init) {
          if ($isExist) {
            $data[$index] = [
              'id_alternatif' => $alternatif[$i]['id_alternatif'],
              'id_kriteria' => $subkriteria[$j - 1]['id_kriteria'],
              'nilai_kriteria' => 0,
            ];

            $index++;
          } else {
            $isExist = TRUE;
          }
        }

        if ($alternatif[$i][$init] == $subkriteria[$j]['nama']) {
          $data[$index] = [
            'id_alternatif' => $alternatif[$i]['id_alternatif'],
            'id_kriteria' => $subkriteria[$j]['id_kriteria'],
            'nilai_kriteria' => $subkriteria[$j]['nilai_preferensi'],
          ];

          $index++;
          $isExist = FALSE; // reset
        }

        $temp = $init;
      }
    }

    return $data;
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
