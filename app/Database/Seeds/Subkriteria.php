<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Subkriteria extends Seeder
{
  public function run()
  {
    $data = [
      ['kriteria_id' => 3, 'nama' => 'Asus', 'nilai_preferensi' => 9],
      ['kriteria_id' => 3, 'nama' => 'Lenovo', 'nilai_preferensi' => 7],
      ['kriteria_id' => 3, 'nama' => 'HP', 'nilai_preferensi' => 5],
      ['kriteria_id' => 3, 'nama' => 'Dell', 'nilai_preferensi' => 3],
      ['kriteria_id' => 3, 'nama' => 'Acer', 'nilai_preferensi' => 1],
      ['kriteria_id' => 4, 'nama' => 'Intel Core i7', 'nilai_preferensi' => 9],
      ['kriteria_id' => 4, 'nama' => 'AMD Ryzen 5', 'nilai_preferensi' => 7],
      ['kriteria_id' => 4, 'nama' => 'Intel Core i5', 'nilai_preferensi' => 5],
      ['kriteria_id' => 4, 'nama' => 'AMD Ryzen 3', 'nilai_preferensi' => 3],
      ['kriteria_id' => 4, 'nama' => 'Intel Core i3', 'nilai_preferensi' => 1],
      ['kriteria_id' => 6, 'nama' => 'SSD', 'nilai_preferensi' => 5],
      ['kriteria_id' => 6, 'nama' => 'eMMC', 'nilai_preferensi' => 3],
      ['kriteria_id' => 6, 'nama' => 'HDD', 'nilai_preferensi' => 1],
      ['kriteria_id' => 8, 'nama' => 'Standard (15-16,5 inch)', 'nilai_preferensi' => 5],
      ['kriteria_id' => 8, 'nama' => 'Portable (13-14,9 inch)', 'nilai_preferensi' => 3],
      ['kriteria_id' => 8, 'nama' => 'Ultra Portable (<13 inch)', 'nilai_preferensi' => 1],
      ['kriteria_id' => 9, 'nama' => 'Intel HD Graphics', 'nilai_preferensi' => 3],
      ['kriteria_id' => 9, 'nama' => 'AMD Radeon Graphics', 'nilai_preferensi' => 1],
      ['kriteria_id' => 10, 'nama' => 'Windows 11', 'nilai_preferensi' => 5],
      ['kriteria_id' => 10, 'nama' => 'Windows 10', 'nilai_preferensi' => 3],
      ['kriteria_id' => 10, 'nama' => 'Linux', 'nilai_preferensi' => 1],
      ['kriteria_id' => 12, 'nama' => 'Baru', 'nilai_preferensi' => 3],
      ['kriteria_id' => 12, 'nama' => 'Bekas', 'nilai_preferensi' => 1],
    ];

    $this->db->table('sub_kriteria')->insertBatch($data);
  }
}
