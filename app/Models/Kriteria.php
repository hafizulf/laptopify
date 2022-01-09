<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteria extends Model
{
  protected $table            = 'kriteria';
  protected $allowedFields    = ['nama', 'jenis', 'data_kuantitatif'];

  protected $validationRules = [
    'nama' => 'required|is_unique[kriteria.nama, id, {id}]',
    'jenis' => 'required',
    'data_kuantitatif' => 'required',
  ];

  public function getQualitativeBenefitCriteria()
  {
    // query
  }
}
