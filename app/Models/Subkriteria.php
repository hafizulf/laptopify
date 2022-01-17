<?php

namespace App\Models;

use CodeIgniter\Model;

class Subkriteria extends Model
{
  protected $table            = 'sub_kriteria';
  protected $allowedFields    = ['kriteria_id', 'nama', 'nilai_preferensi'];

  protected $validationRules = [
    'kriteria_id' => 'required',
    'nama.*' => 'required',
    'nilai_preferensi.*' => 'required|is_numeric',
  ];

  protected $validationMessages = [
    "kriteria_id" => [
      "required" => "Kriteria wajib dipilih",
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

  public function findSubkriteriaById($id)
  {
    return $this->db->query(
      "SELECT id, nama, nilai_preferensi FROM " . $this->table . " WHERE id = $id"
    )->getRowArray();
  }

  public function saveSubkriteria($data)
  {
    $this->db->disableForeignKeyChecks();
    return $this->insertBatch($data);
  }

  public function getSpesificSubkriteria($clause = FALSE)
  {
    if ($clause) {
      return $this->db->query(
        "SELECT sk.nama FROM " . $this->table . " AS sk JOIN kriteria ON sk.kriteria_id = kriteria.id WHERE kriteria.nama = '" . $clause . "' ORDER BY kriteria_id"
      )->getResultArray();
    } else {
      return $this->db->query(
        "SELECT k.nama as nama_kriteria, sk.kriteria_id, sk.nama, sk.nilai_preferensi FROM " . $this->table . " AS sk JOIN kriteria AS k ON sk.kriteria_id = k.id ORDER BY kriteria_id"
      )->getResultArray();
    }
  }
}
