<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiUtility extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_nilai_utility INT UNSIGNED AUTO_INCREMENT',
      'id_nilai_kriteria INT UNSIGNED',
      'nilai_utility DOUBLE UNSIGNED',
    ]);
    $this->forge->addKey('id_nilai_utility', true);
    $this->forge->addForeignKey('id_nilai_kriteria', 'nilai_kriteria', 'id_nilai_kriteria', 'CASCADE', 'CASCADE');
    $this->forge->createTable('nilai_utility');
  }

  public function down()
  {
    $this->forge->dropTable('nilai_utility');
  }
}
