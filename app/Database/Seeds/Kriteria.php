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
      ['nama' => 'harga', 'jenis' => 'cc', 'data_kuantitatif' => 1],
      ['nama' => 'rating_produk', 'jenis' => 'bc', 'data_kuantitatif' => 1],
      ['nama' => 'merk', 'jenis' => 'bc', 'data_kuantitatif' => 0],
      ['nama' => 'prosesor', 'jenis' => 'bc', 'data_kuantitatif' => 0],
      ['nama' => 'kapasitas_ram', 'jenis' => 'bc', 'data_kuantitatif' => 1],
      ['nama' => 'tipe_penyimpanan', 'jenis' => 'bc', 'data_kuantitatif' => 0],
      ['nama' => 'kapasitas_penyimpanan', 'jenis' => 'bc', 'data_kuantitatif' => 1],
      ['nama' => 'ukuran_layar', 'jenis' => 'bc', 'data_kuantitatif' => 0],
      ['nama' => 'kartu_grafis', 'jenis' => 'bc', 'data_kuantitatif' => 0],
      ['nama' => 'sistem_operasi', 'jenis' => 'bc', 'data_kuantitatif' => 0],
      ['nama' => 'masa_garansi', 'jenis' => 'bc', 'data_kuantitatif' => 1],
      ['nama' => 'kondisi_produk', 'jenis' => 'bc', 'data_kuantitatif' => 0],
    ];

    // Simple Queries
    // $this->db->query("INSERT INTO kriteria (name, type, description) VALUES(:name:, :type:, :description:)", $data);

    // Using Query Builder
    // $this->db->table('kriteria')->insert($data);
    $this->db->table('kriteria')->insertBatch($data);
  }
}
