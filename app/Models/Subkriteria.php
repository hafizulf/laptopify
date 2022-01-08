<?php

namespace App\Models;

use CodeIgniter\Model;

class Subkriteria extends Model
{
  protected $table            = 'sub_kriteria';
  protected $allowedFields    = ['nama', 'nilai_preferensi'];

  public function findAllSubkriteria()
  {
    return $this->db->query(
      'SELECT k.nama as nama_kriteria, sk.* FROM sub_kriteria AS sk JOIN kriteria AS k ON sk.kriteria_id = k.id ORDER BY kriteria_id'
    );
  }
}
