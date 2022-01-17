<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Subkriteria extends Seeder
{
  public function run()
  {
    $data = [
      ['kriteria_id' => 3, 'nama' => 'Apple', 'nilai_preferensi' => 9],
      ['kriteria_id' => 3, 'nama' => 'Asus', 'nilai_preferensi' => 7],
      ['kriteria_id' => 3, 'nama' => 'Lenovo', 'nilai_preferensi' => 5],
      ['kriteria_id' => 3, 'nama' => 'HP', 'nilai_preferensi' => 3],
      ['kriteria_id' => 3, 'nama' => 'Lain', 'nilai_preferensi' => 1],
      ['kriteria_id' => 12, 'nama' => 'Baru', 'nilai_preferensi' => 3],
      ['kriteria_id' => 12, 'nama' => 'Bekas', 'nilai_preferensi' => 1],
    ];

    $this->db->table('sub_kriteria')->insertBatch($data);
  }
}
