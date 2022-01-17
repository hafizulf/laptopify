<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NilaiKriteria as ModelsNilaiKriteria;
use App\Models\Alternatif as modelsAlternatif;
use App\Models\Kriteria as modelsKriteria;

class NilaiKriteria extends BaseController
{
  public function __construct()
  {
    $this->model = new ModelsNilaiKriteria();
    $this->kriteriaModel = new modelsKriteria();
    $this->alternatifModel = new modelsAlternatif();
  }

  public function setNilaiKriteria()
  {
    $alternatif = $this->alternatifModel->getAlternatifCriteria();
    $kriteria = $this->kriteriaModel->findAll();

    /*
    Expected Array value of $nilaiKriteria

      $nilaiKriteria = [
        'id' => AUTO_INCREMENT,
        'alternatif_id' => $alternatif_id,
        'kriteria_id' => $kriteria_id,
        'nilai_kriteria' => alternatif value OR sub_kriteria.nilai_preferensi
      ]
    */
    $nilaiKriteria = [];

    for ($j = 0; $j < sizeOf($kriteria); $j++) {

      for ($i = 0; $i < sizeOf($alternatif); $i++) {
        if ($kriteria[$j]['data_kuantitatif'] == 1) {
          $nilaiKriteria[$j]['alternatif_id'] = $alternatif[$i]['id'];
          $nilaiKriteria[$j]['kriteria_id'] = $kriteria[$j]['id'];

          if (array_key_exists($kriteria[$j]['nama'],  $alternatif[$i])) {
            $nilaiKriteria[$j]['nilai_kriteria'] = $alternatif[$i][$kriteria[$j]['nama']];
          }
        }
      }
    }

    var_dump($nilaiKriteria);
  }
}
