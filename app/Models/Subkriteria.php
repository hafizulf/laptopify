<?php

namespace App\Models;

use CodeIgniter\Model;

class Subkriteria extends Model
{
  protected $table            = 'sub_kriteria';
  protected $primaryKey       = 'id_sub_kriteria';
  protected $allowedFields    = ['id_kriteria', 'nama', 'nilai_preferensi'];

  protected $validationRules = [
    'id_kriteria' => 'required',
    'nama.*' => 'required',
    'nilai_preferensi.*' => 'required|is_numeric',
  ];

  protected $validationMessages = [
    "id_kriteria" => [
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
      "SELECT k.nama as nama_kriteria, sk.* FROM " . $this->table . " sk JOIN kriteria k ON sk.id_kriteria = k.id_kriteria ORDER BY id_kriteria"
    );
  }

  public function findSubkriteriaById($id)
  {
    return $this->db->query(
      "SELECT id_sub_kriteria, nama, nilai_preferensi FROM " . $this->table . " WHERE id_sub_kriteria = $id"
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
        "SELECT sk.nama, k.id_kriteria FROM " . $this->table . " sk JOIN kriteria k ON sk.id_kriteria = k.id_kriteria WHERE k.nama = '" . $clause . "' ORDER BY id_kriteria"
      )->getResultArray();
    } else {
      return $this->db->query(
        "SELECT k.nama as nama_kriteria, sk.id_kriteria, sk.nama, sk.nilai_preferensi FROM " . $this->table . " sk JOIN kriteria k ON sk.id_kriteria = k.id_kriteria ORDER BY id_kriteria"
      )->getResultArray();
    }
  }
}
