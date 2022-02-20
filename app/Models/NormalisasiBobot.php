<?php

namespace App\Models;

use CodeIgniter\Model;

class NormalisasiBobot extends Model
{
  protected $table             = 'normalisasi_bobot';
  protected $normalisasi_bobot = 'id_normalisasi_bobot';
  protected $allowedFields     = ['id_pembobotan', 'nilai_normalisasi_bobot'];

  public function normalisasi($data)
  {
    $this->truncate();
    return $this->insertBatch($data);
  }

  public function getNilaiNormalisasiBobot()
  {
    return $this->db->query(
      "SELECT p.id_kriteria, nb.nilai_normalisasi_bobot FROM " . $this->table . " nb JOIN pembobotan p ON nb.id_pembobotan = p.id_pembobotan"
    )->getResultArray();
  }
}
