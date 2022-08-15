<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Subkriteria extends Seeder
{
  public function run()
  {
    $data = [
      ['id_kriteria' => 3, 'nama' => 'apple', 'nilai_preferensi' => 5],
      ['id_kriteria' => 3, 'nama' => 'asus', 'nilai_preferensi' => 4],
      ['id_kriteria' => 3, 'nama' => 'lenovo', 'nilai_preferensi' => 3],
      ['id_kriteria' => 3, 'nama' => 'hp', 'nilai_preferensi' => 2],
      ['id_kriteria' => 3, 'nama' => 'lain', 'nilai_preferensi' => 1],
      ['id_kriteria' => 4, 'nama' => 'intel core i7', 'nilai_preferensi' => 7],
      ['id_kriteria' => 4, 'nama' => 'amd ryzen 5', 'nilai_preferensi' => 6],
      ['id_kriteria' => 4, 'nama' => 'intel core i5', 'nilai_preferensi' => 5],
      ['id_kriteria' => 4, 'nama' => 'amd ryzen 3', 'nilai_preferensi' => 4],
      ['id_kriteria' => 4, 'nama' => 'intel core i3', 'nilai_preferensi' => 3],
      ['id_kriteria' => 4, 'nama' => 'intel celeron', 'nilai_preferensi' => 2],
      ['id_kriteria' => 4, 'nama' => 'lain', 'nilai_preferensi' => 1],
      ['id_kriteria' => 6, 'nama' => 'ssd', 'nilai_preferensi' => 4],
      ['id_kriteria' => 6, 'nama' => 'emmc', 'nilai_preferensi' => 3],
      ['id_kriteria' => 6, 'nama' => 'hdd', 'nilai_preferensi' => 2],
      ['id_kriteria' => 6, 'nama' => 'lain', 'nilai_preferensi' => 1],
      ['id_kriteria' => 8, 'nama' => 'Standard (15-16,5 inch)', 'nilai_preferensi' => 4],
      ['id_kriteria' => 8, 'nama' => 'Portable (13-14,9 inch)', 'nilai_preferensi' => 3],
      ['id_kriteria' => 8, 'nama' => 'Large (>16,5 inch)', 'nilai_preferensi' => 2],
      ['id_kriteria' => 8, 'nama' => 'Ultra Portable (<13 inch)', 'nilai_preferensi' => 1],
      ['id_kriteria' => 9, 'nama' => 'windows', 'nilai_preferensi' => 4],
      ['id_kriteria' => 9, 'nama' => 'macos based', 'nilai_preferensi' => 3],
      ['id_kriteria' => 9, 'nama' => 'linux based', 'nilai_preferensi' => 2],
      ['id_kriteria' => 9, 'nama' => 'lain', 'nilai_preferensi' => 1],
      ['id_kriteria' => 11, 'nama' => 'baru', 'nilai_preferensi' => 2],
      ['id_kriteria' => 11, 'nama' => 'bekas', 'nilai_preferensi' => 1],
    ];

    $this->db->table('sub_kriteria')->insertBatch($data);
  }
}
