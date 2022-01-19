<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiUtility extends Model
{
  protected $table            = 'nilai_utility';
  protected $allowedFields    = ['nilai_kriteria_id', 'nilai_utility'];

  public function saveNilaiUtility($data)
  {
    $this->truncate();
    return $this->insertBatch($data);
  }
}
