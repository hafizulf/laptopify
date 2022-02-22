<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiKriteria extends Model
{
  protected $table            = 'nilai_kriteria';
  protected $primaryKey       = 'id_nilai_kriteria';
  protected $allowedFields    = ['id_alternatif', 'id_kriteria', 'nilai_kriteria'];

  public function setNilaiKriteria($data)
  {
    $this->db->disableForeignKeyChecks();
    $this->truncate();
    $this->db->query('DELETE FROM nilai_utility');
    return $this->insertBatch($data);
  }

  public function getNilaiKriteria($clause = FALSE)
  {
    if ($clause !== FALSE) {
      return $this->db->query(
        "SELECT k.jenis, nk.* FROM " . $this->table . " nk JOIN kriteria k ON nk.id_kriteria = k.id_kriteria WHERE k.id_kriteria = " . $clause . ""
      )->getResultArray();
    } else {
      return $this->db->query(
        "SELECT id_alternatif, id_kriteria, nilai_kriteria FROM " . $this->table . " ORDER BY id_kriteria"
      )->getResultArray();
    }
  }
}
