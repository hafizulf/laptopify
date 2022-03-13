<?php

namespace App\Models;

use CodeIgniter\Model;

class Alternatif extends Model
{
  protected $table          = 'alternatif';
  protected $primaryKey     = 'id_alternatif';
  protected $allowedFields  = ['id_user', 'kode', 'nama', 'harga', 'rating_produk', 'merk', 'prosesor', 'kapasitas_ram', 'tipe_penyimpanan', 'kapasitas_penyimpanan', 'ukuran_layar', 'kartu_grafis', 'sistem_operasi', 'masa_garansi', 'kondisi_produk', 'url_produk'];

  protected $validationRules = [
    'kode' => 'required|is_unique[alternatif.kode, id_alternatif, {id_alternatif}]',
    'nama' => 'required',
    'harga' => 'required|is_numeric',
    'rating_produk' => 'required|is_numeric',
    'merk' => 'required',
    'prosesor' => 'required',
    'kapasitas_ram' => 'required|is_numeric',
    'tipe_penyimpanan' => 'required',
    'kapasitas_penyimpanan' => 'required|is_numeric',
    'ukuran_layar' => 'required',
    'kartu_grafis' => 'required',
    'sistem_operasi' => 'required',
    'masa_garansi' => 'required|is_numeric',
    'kondisi_produk' => 'required',
    'url_produk' => 'required',
  ];

  public function getAlternatifCriteria()
  {
    return $this->db->query("
      SELECT id_alternatif, harga, rating_produk, merk, prosesor, kapasitas_ram, tipe_penyimpanan, kapasitas_penyimpanan, ukuran_layar, kartu_grafis, sistem_operasi, masa_garansi, kondisi_produk FROM " . $this->table . " WHERE id_user = " . session('id_user') . "
    ")->getResultArray();
  }

  public function getKodeAlternatif()
  {
    return $this->db->query("
      SELECT id_alternatif, kode FROM " . $this->table . " WHERE id_user = " . session('id_user') . " ORDER BY id_alternatif
    ")->getResultArray();
  }

  public function countAlternatifByUser($id_user)
  {
    return $this->where('id_user', $id_user)->countAllResults();
  }
}
