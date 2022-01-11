<?php

namespace App\Models;

use CodeIgniter\Model;

class Subkriteria extends Model
{
  protected $table            = 'sub_kriteria';
  protected $allowedFields    = ['kriteria_id', 'nama', 'nilai_preferensi'];

  protected $validationRules = [
    'kriteria_id' => 'required',
    'nama.*' => 'required|is_unique[sub_kriteria.nama, id, {id}]',
    'nilai_preferensi.*' => 'required|is_numeric',
  ];

  protected $validationMessages = [
    "kriteria_id" => [
      "required" => "Kriteria wajib diisi",
    ],
    "nama.*" => [
      "required" => "Sub kriteria wajib diisi",
      "is_unique" => 'Sub kriteria sudah ada'
    ],
    "nilai_preferensi.*" => [
      "required" => "Nilai wajib diisi",
      "is_numeric" => "Nilai harus numerik",
    ],
  ];

  public function findAllSubkriteria()
  {
    return $this->db->query(
      "SELECT k.nama as nama_kriteria, sk.* FROM " . $this->table . " AS sk JOIN kriteria AS k ON sk.kriteria_id = k.id ORDER BY kriteria_id"
    );
  }

  public function saveSubkriteria($data)
  {
    $this->db->disableForeignKeyChecks();
    return $this->insertBatch($data);
  }
}
