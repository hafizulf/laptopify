<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;
use App\Models\NilaiUtility;

class Hitung extends BaseController
{
  public function __construct()
  {
    $this->kriteriaModel = new Kriteria();
    $this->alternatifModel = new Alternatif();
    $this->nilaiKriteriaModel = new NilaiKriteria();
    $this->nilaiUtilityModel = new NilaiUtility();
  }

  public function index()
  {
    $data = [
      'judul' => 'Proses Perhitungan',
      'kriteria' => $this->kriteriaModel->getCriteria(),
      'alternatif' => $this->alternatifModel->getKodeAlternatif(),
      'nilai_kriteria' => $this->nilaiKriteriaModel->getNilaiKriteria(),
      'nilai_utility' => $this->nilaiUtilityModel->getNilaiUtility(),
    ];

    return view('perhitungan/index', $data);
  }
}
