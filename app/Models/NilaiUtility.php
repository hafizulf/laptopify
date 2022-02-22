<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiUtility extends Model
{
  protected $table            = 'nilai_utility';
  protected $primaryKey       = 'id_nilai_utility';
  protected $allowedFields    = ['id_nilai_kriteria', 'nilai_utility'];

  public function saveNilaiUtility($data)
  {
    $this->truncate();
    $this->db->query('DELETE FROM nilai_akhir');
    return $this->insertBatch($data);
  }

  public function getNilaiUtility($clause = FALSE)
  {
    if ($clause === FALSE) {
      return $this->db->query("
        SELECT nk.id_alternatif, nu.nilai_utility FROM " . $this->table . " nu JOIN nilai_kriteria nk ON nu.id_nilai_kriteria = nk.id_nilai_kriteria
      ")->getResultArray();
    } else {
      return $this->db->query("
        SELECT nk.id_alternatif, nk.id_kriteria, nu.nilai_utility FROM " . $this->table . " nu JOIN nilai_kriteria nk ON nu.id_nilai_kriteria = nk.id_nilai_kriteria WHERE id_alternatif = " . $clause . "
      ")->getResultArray();
    }
  }
}
