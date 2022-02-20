<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteria extends Model
{
  protected $table            = 'kriteria';
  protected $primaryKey       = 'id_kriteria';
  protected $allowedFields    = ['nama', 'jenis', 'data_kuantitatif'];

  protected $validationRules = [
    'nama' => 'required|is_unique[kriteria.nama, id_kriteria, {id_kriteria}]',
    'jenis' => 'required',
    'data_kuantitatif' => 'required',
  ];

  public function getQualitativeBenefitCriteria()
  {
    return $this->db->query(
      "SELECT * FROM " . $this->table . " WHERE jenis = 'bc' AND data_kuantitatif = 0"
    );
  }

  public function getCriteria()
  {
    return $this->db->query(
      "SELECT id_kriteria, nama FROM " . $this->table . ""
    );
  }

  public function getQuantitativeCriteria()
  {
    return $this->db->query(
      "SELECT id_kriteria, nama FROM " . $this->table . " WHERE data_kuantitatif = 1"
    )->getResultArray();
  }
}
