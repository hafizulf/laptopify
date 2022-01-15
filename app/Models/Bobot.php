<?php

namespace App\Models;

use CodeIgniter\Model;

class Bobot extends Model
{
  protected $table = 'pembobotan';
  protected $allowedFields = ['kriteria_id', 'nilai_bobot'];
  protected $validationRules = [
    'kriteria_id' => 'required|is_unique[pembobotan.kriteria_id]',
    'nilai_bobot' => 'required|is_numeric'
  ];
  protected $validationMessages = [
    'kriteria_id' => [
      'required' => 'wajib dipilih.',
      'is_unique' => 'bobot kriteria sudah ada, coba lain.'
    ]
  ];

  public function findAllBobot()
  {
    return $this->db->query(
      "SELECT k.nama as nama_kriteria, p.* FROM " . $this->table . " AS p JOIN kriteria AS k ON p.kriteria_id = k.id"
    );
  }

  public function findBobotById($id)
  {
    return $this->db->query(
      "SELECT k.nama as nama_kriteria, p.id, p.nilai_bobot FROM " . $this->table . " AS p JOIN kriteria AS k ON p.kriteria_id = k.id WHERE p.id = $id"
    )->getRowArray();
  }

  public function getNilaiBobot()
  {
    return $this->db->query(
      "SELECT id, nilai_bobot FROM " . $this->table . ""
    )->getResultArray();
  }
}
