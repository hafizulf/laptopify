<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pembobotan extends Seeder
{
  public function run()
  {
    $data = [
      ['id_kriteria' => 1, 'nilai_bobot' => 88],
      ['id_kriteria' => 2, 'nilai_bobot' => 86],
      ['id_kriteria' => 3, 'nilai_bobot' => 83],
      ['id_kriteria' => 4, 'nilai_bobot' => 94],
      ['id_kriteria' => 5, 'nilai_bobot' => 93],
      ['id_kriteria' => 6, 'nilai_bobot' => 91],
      ['id_kriteria' => 7, 'nilai_bobot' => 92],
      ['id_kriteria' => 8, 'nilai_bobot' => 84],
      ['id_kriteria' => 9, 'nilai_bobot' => 86],
      ['id_kriteria' => 10, 'nilai_bobot' => 91],
      ['id_kriteria' => 11, 'nilai_bobot' => 83],
      ['id_kriteria' => 12, 'nilai_bobot' => 96],
    ];

    $this->db->table('pembobotan')->insertBatch($data);
  }
}
