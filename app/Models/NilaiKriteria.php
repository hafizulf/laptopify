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

  public function getNilaiKriteria($clause = FALSE)
  {
    if ($clause !== FALSE) {
      return $this->db->query(
        "SELECT kriteria.jenis, nilai_kriteria.* FROM " . $this->table . " JOIN kriteria ON nilai_kriteria.kriteria_id = kriteria.id WHERE kriteria_id = " . $clause . ""
      )->getResultArray();
    } else {
      return $this->db->query(
        "SELECT alternatif_id, kriteria_id, nilai_kriteria FROM " . $this->table . " ORDER BY kriteria_id"
      )->getResultArray();
    }
  }
}
