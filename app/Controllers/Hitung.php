<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;

class Hitung extends BaseController
{
  public function __construct()
  {
    $this->kriteriaModel = new Kriteria();
    $this->alternatifModel = new Alternatif();
    $this->nilaiKriteriaModel = new NilaiKriteria();
  }

  public function index()
  {
    $data = [
      'judul' => 'Proses Perhitungan',
      'kriteria' => $this->kriteriaModel->getCriteria(),
      'alternatif' => $this->alternatifModel->getKodeAlternatif(),
      'nilai_kriteria' => $this->nilaiKriteriaModel->getNilaiKriteria(),
    ];

    return view('perhitungan/index', $data);
  }
}
