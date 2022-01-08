<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Subkriteria extends Seeder
{
  public function run()
  {
    $data = [
      ['kriteria_id' => 2, 'nama' => '>= 4,8', 'nilai_preferensi' => 7],
      ['kriteria_id' => 2, 'nama' => '< 4,8 - >= 4,6', 'nilai_preferensi' => 5],
      ['kriteria_id' => 2, 'nama' => '< 4,6 - >= 4,4', 'nilai_preferensi' => 3],
      ['kriteria_id' => 2, 'nama' => '< 4,4', 'nilai_preferensi' => 1],
      ['kriteria_id' => 3, 'nama' => 'Baru', 'nilai_preferensi' => 3],
      ['kriteria_id' => 3, 'nama' => 'Bekas', 'nilai_preferensi' => 1],
      ['kriteria_id' => 4, 'nama' => 'Apple', 'nilai_preferensi' => 9],
      ['kriteria_id' => 4, 'nama' => 'Asus', 'nilai_preferensi' => 7],
      ['kriteria_id' => 4, 'nama' => 'Lenovo', 'nilai_preferensi' => 5],
      ['kriteria_id' => 4, 'nama' => 'HP', 'nilai_preferensi' => 3],
      ['kriteria_id' => 4, 'nama' => 'Lain', 'nilai_preferensi' => 1],
      ['kriteria_id' => 5, 'nama' => '>= 24 bulan', 'nilai_preferensi' => 9],
      ['kriteria_id' => 5, 'nama' => '< 24 - > 12 bulan', 'nilai_preferensi' => 7],
      ['kriteria_id' => 5, 'nama' => '< 12 - > 6 bulan', 'nilai_preferensi' => 5],
      ['kriteria_id' => 5, 'nama' => '< 6 bulan', 'nilai_preferensi' => 3],
      ['kriteria_id' => 5, 'nama' => 'Tidak Ada', 'nilai_preferensi' => 1],
    ];

    $this->db->table('sub_kriteria')->insertBatch($data);
  }
}
