<?php

namespace App\Models;

use CodeIgniter\Model;

class Bobot extends Model
{
  protected $table          = 'pembobotan';
  protected $primaryKey     = 'id_pembobotan';
  protected $allowedFields  = ['id_kriteria', 'nilai_bobot'];

  protected $validationRules = [
    'id_kriteria' => 'required|is_unique[pembobotan.id_kriteria]',
    'nilai_bobot' => 'required|is_numeric'
  ];
  protected $validationMessages = [
    'id_kriteria' => [
      'required' => 'wajib dipilih.',
      'is_unique' => 'bobot kriteria sudah ada, coba lain.'
    ]
  ];

  public function findAllBobot()
  {
    return $this->db->query(
      "SELECT k.nama as nama_kriteria, p.* FROM " . $this->table . " p JOIN kriteria k ON p.id_kriteria = k.id_kriteria"
    );
  }

  public function findBobotById($id)
  {
    return $this->db->query(
      "SELECT k.nama as nama_kriteria, p.id_pembobotan, p.nilai_bobot FROM " . $this->table . " p JOIN kriteria k ON p.id_kriteria = k.id_kriteria WHERE p.id_pembobotan = $id"
    )->getRowArray();
  }

  public function getNilaiBobot()
  {
    return $this->db->query(
      "SELECT id_pembobotan, nilai_bobot FROM " . $this->table . ""
    )->getResultArray();
  }
}
