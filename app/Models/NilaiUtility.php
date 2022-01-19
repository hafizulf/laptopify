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

  public function getNilaiUtility()
  {
    return $this->db->query("
      SELECT nilai_kriteria.alternatif_id, nilai_utility.nilai_utility FROM " . $this->table . " JOIN nilai_kriteria ON nilai_utility.nilai_kriteria_id = nilai_kriteria.id
    ")->getResultArray();
  }
}
