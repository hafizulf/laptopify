<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiAkhir extends Model
{
  protected $table            = 'nilai_akhir';
  protected $primaryKey       = 'id_nilai_akhir';
  protected $allowedFields    = ['id_alternatif', 'nilai_akhir'];

  public function saveNilaiAkhir($data)
  {
    $this->truncate();
    return $this->insertBatch($data);
  }

  public function getNilaiAkhir()
  {
    return $this->db->query(
      "SELECT a.kode, na.* FROM " . $this->table . " na JOIN alternatif a ON na.id_alternatif = a.id_alternatif WHERE a.id_user = " . session('id_user') . " ORDER BY nilai_akhir DESC"
    )->getResultArray();
  }
}
