<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pembobotan extends Seeder
{
  public function run()
  {
    $data = [
      ['kriteria_id' => 1, 'nilai_bobot' => 100],
      ['kriteria_id' => 2, 'nilai_bobot' => 85],
      ['kriteria_id' => 3, 'nilai_bobot' => 80],
      ['kriteria_id' => 4, 'nilai_bobot' => 95],
      ['kriteria_id' => 5, 'nilai_bobot' => 90],
      ['kriteria_id' => 6, 'nilai_bobot' => 90],
      ['kriteria_id' => 7, 'nilai_bobot' => 85],
      ['kriteria_id' => 8, 'nilai_bobot' => 90],
      ['kriteria_id' => 9, 'nilai_bobot' => 80],
      ['kriteria_id' => 10, 'nilai_bobot' => 100],
      ['kriteria_id' => 11, 'nilai_bobot' => 70],
      ['kriteria_id' => 12, 'nilai_bobot' => 100],
    ];

    $this->db->table('pembobotan')->insertBatch($data);
  }
}
