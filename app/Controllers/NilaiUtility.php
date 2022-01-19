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
    $kriteria = $this->kriteriaModel->getCriteria()->getResultArray();
    $nilaiUtility = [];

    for ($i = 0; $i < sizeof($kriteria); $i++) {
      // select data nilai kriteria based on kriteria_id
      $dataKriteria = $this->nilaiKriteriaModel->getNilaiKriteria($kriteria[$i]['id']);

      // select spesific column ('nilai_kriteia')
      $nilaiKriteria = array_column($dataKriteria, 'nilai_kriteria');

      // select max & min value of nilai kriteria
      $maxNilaiKriteria = floatval(max($nilaiKriteria));
      $minNilaiKriteria = floatval(min($nilaiKriteria));


      for ($j = 0; $j < sizeof($dataKriteria); $j++) {
        $data['nilai_kriteria_id'] = $dataKriteria[$j]['id'];

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
  }
}
