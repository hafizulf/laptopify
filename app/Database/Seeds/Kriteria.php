<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kriteria extends Seeder
{
  /*
    cc stand for cost criteria
    bc stand for benefit criteria
  */
  public function run()
  {
    $data = [
      ['nama' => 'harga', 'jenis' => 'cc'],
      ['nama' => 'rating_produk', 'jenis' => 'bc'],
      ['nama' => 'merk', 'jenis' => 'bc'],
      ['nama' => 'prosesor', 'jenis' => 'bc'],
      ['nama' => 'kapasitas_ram', 'jenis' => 'bc'],
      ['nama' => 'tipe_penyimpanan', 'jenis' => 'bc'],
      ['nama' => 'kapasitas_penyimpanan', 'jenis' => 'bc'],
      ['nama' => 'ukuran_layar', 'jenis' => 'bc'],
      ['nama' => 'kartu_grafis', 'jenis' => 'bc'],
      ['nama' => 'sistem_operasi', 'jenis' => 'bc'],
      ['nama' => 'masa_garansi', 'jenis' => 'bc'],
      ['nama' => 'kondisi_produk', 'jenis' => 'bc'],
    ];

    // Simple Queries
    // $this->db->query("INSERT INTO kriteria (name, type, description) VALUES(:name:, :type:, :description:)", $data);

    // Using Query Builder
    // $this->db->table('kriteria')->insert($data);
    $this->db->table('kriteria')->insertBatch($data);
  }
}
