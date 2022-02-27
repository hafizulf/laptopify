<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Subkriteria extends Seeder
{
  public function run()
  {
    $data = [
      ['id_kriteria' => 3, 'nama' => 'Apple', 'nilai_preferensi' => 5],
      ['id_kriteria' => 3, 'nama' => 'Asus', 'nilai_preferensi' => 4],
      ['id_kriteria' => 3, 'nama' => 'Lenovo', 'nilai_preferensi' => 3],
      ['id_kriteria' => 3, 'nama' => 'HP', 'nilai_preferensi' => 2],
      ['id_kriteria' => 3, 'nama' => 'Lain', 'nilai_preferensi' => 1],
      ['id_kriteria' => 4, 'nama' => 'Intel Core i7', 'nilai_preferensi' => 7],
      ['id_kriteria' => 4, 'nama' => 'AMD Ryzen 5', 'nilai_preferensi' => 6],
      ['id_kriteria' => 4, 'nama' => 'Intel Core i5', 'nilai_preferensi' => 5],
      ['id_kriteria' => 4, 'nama' => 'AMD Ryzen 3', 'nilai_preferensi' => 4],
      ['id_kriteria' => 4, 'nama' => 'Intel Core i3', 'nilai_preferensi' => 3],
      ['id_kriteria' => 4, 'nama' => 'Intel Celeron', 'nilai_preferensi' => 2],
      ['id_kriteria' => 4, 'nama' => 'Lain', 'nilai_preferensi' => 1],
      ['id_kriteria' => 6, 'nama' => 'SSD', 'nilai_preferensi' => 3],
      ['id_kriteria' => 6, 'nama' => 'eMMC', 'nilai_preferensi' => 2],
      ['id_kriteria' => 6, 'nama' => 'HDD', 'nilai_preferensi' => 1],
      ['id_kriteria' => 8, 'nama' => 'Standard (15-15,6 inch)', 'nilai_preferensi' => 4],
      ['id_kriteria' => 8, 'nama' => 'Portable (13-14,9 inch)', 'nilai_preferensi' => 3],
      ['id_kriteria' => 8, 'nama' => 'Large (>17,3 inch)', 'nilai_preferensi' => 2],
      ['id_kriteria' => 8, 'nama' => 'Ultra Portable (<13 inch)', 'nilai_preferensi' => 1],
      ['id_kriteria' => 9, 'nama' => 'Nvidia GeForce', 'nilai_preferensi' => 4],
      ['id_kriteria' => 9, 'nama' => 'AMD Radeon', 'nilai_preferensi' => 3],
      ['id_kriteria' => 9, 'nama' => 'Intel HD/UHD', 'nilai_preferensi' => 2],
      ['id_kriteria' => 9, 'nama' => 'Lain', 'nilai_preferensi' => 1],
      ['id_kriteria' => 10, 'nama' => 'Windows', 'nilai_preferensi' => 4],
      ['id_kriteria' => 10, 'nama' => 'MacOs Based', 'nilai_preferensi' => 3],
      ['id_kriteria' => 10, 'nama' => 'Linux Based', 'nilai_preferensi' => 2],
      ['id_kriteria' => 10, 'nama' => 'Lain', 'nilai_preferensi' => 1],
      ['id_kriteria' => 12, 'nama' => 'Baru', 'nilai_preferensi' => 2],
      ['id_kriteria' => 12, 'nama' => 'Bekas', 'nilai_preferensi' => 1],
    ];

    $this->db->table('sub_kriteria')->insertBatch($data);
  }
}
