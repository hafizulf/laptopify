<?php

namespace App\Models;

use CodeIgniter\Model;

class NormalisasiBobot extends Model
{
  protected $table            = 'normalisasi_bobot';
  protected $allowedFields    = ['pembobotan_id', 'nilai_normalisasi_bobot'];

  public function normalisasi($data)
  {
    $this->truncate();
    return $this->insertBatch($data);
  }

  public function getNilaiNormalisasiBobot()
  {
    return $this->db->query(
      "SELECT nilai_normalisasi_bobot FROM " . $this->table . ""
    )->getResultArray();
  }
}
