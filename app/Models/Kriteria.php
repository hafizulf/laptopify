<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteria extends Model
{
  protected $table            = 'kriteria';
  protected $allowedFields    = ['nama', 'jenis'];

  protected $validationRules = [
    'nama' => 'required|is_unique[kriteria.nama]',
    'jenis' => 'required'
  ];
}
