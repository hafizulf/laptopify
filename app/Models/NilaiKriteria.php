<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiKriteria extends Model
{
  protected $table            = 'nilai_kriteria';
  protected $allowedFields    = ['alternatif_id', 'kriteria_id', 'nilai_kriteria'];

  public function setNilaiKriteria($data)
  {
    $this->db->disableForeignKeyChecks();
    $this->truncate();
    return $this->insertBatch($data);
  }
}
