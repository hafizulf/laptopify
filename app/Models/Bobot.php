<?php

namespace App\Models;

use CodeIgniter\Model;

class Bobot extends Model
{
  protected $table = 'pembobotan';
  protected $allowedFields = ['kriteria_id', 'nilai_bobot'];
  protected $validationRules = [
    'kriteria_id' => 'required',
    'nilai_bobot' => 'required|is_numeric'
  ];
  protected $validationMessages = [
    'kriteria_id' => [
      'required' => 'wajib dipilih.'
    ]
  ];

  public function findAllBobot()
  {
    return $this->db->query(
      "SELECT k.nama as nama_kriteria, p.* FROM " . $this->table . " AS p JOIN kriteria AS k ON p.kriteria_id = k.id"
    );
  }
}
