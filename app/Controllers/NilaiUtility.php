<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;
use App\Models\NilaiUtility as ModelsNilaiUtility;

class NilaiUtility extends BaseController
{
  public function __construct()
  {
    $this->model = new ModelsNilaiUtility();
    $this->kriteriaModel = new Kriteria();
    $this->nilaiKriteriaModel = new NilaiKriteria();
  }

  public function generateNilaiUtility()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $kriteria = $this->kriteriaModel->getCriteria()->getResultArray();
    $nilaiUtility = [];

    for ($i = 0; $i < sizeof($kriteria); $i++) {
      // select data nilai kriteria based on kriteria_id
      $dataKriteria = $this->nilaiKriteriaModel->getNilaiKriteria($kriteria[$i]['id_kriteria']);

      // select spesific column ('nilai_kriteia')
      $nilaiKriteria = array_column($dataKriteria, 'nilai_kriteria');

      // select max & min value of nilai kriteria
      $maxNilaiKriteria = floatval(max($nilaiKriteria));
      $minNilaiKriteria = floatval(min($nilaiKriteria));


      for ($j = 0; $j < sizeof($dataKriteria); $j++) {
        $data['id_nilai_kriteria'] = $dataKriteria[$j]['id_nilai_kriteria'];

        // get nilai kriteria with kriteria.jenis = bc -> Formula: Benefit Criteria
        if ($dataKriteria[$j]['jenis'] === 'bc') {
          $first = ($dataKriteria[$j]['nilai_kriteria'] - $minNilaiKriteria);
          $second = ($maxNilaiKriteria - $minNilaiKriteria);

          $data['nilai_utility'] = ($second == 0) ? 0 : ($first / $second); // avoid division by zero

          // Formula: Cost criteria
        } else {
          $first = ($maxNilaiKriteria - $dataKriteria[$j]['nilai_kriteria']);
          $second = ($maxNilaiKriteria - $minNilaiKriteria);

          $data['nilai_utility'] = ($second == 0) ? 0 : ($first / $second);
        }

        array_push($nilaiUtility, $data);
      }
    }

    if (sizeOf($nilaiUtility) <= 0) {
      return $this->response->setJSON(['status' => TRUE, 'warning' => 'Belum ada data nilai kriteria']);
    }

    if ($this->model->saveNilaiUtility($nilaiUtility) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Nilai utility berhasil diperbarui']);
    }
  }
}
