<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiKriteria extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_nilai_kriteria INT UNSIGNED AUTO_INCREMENT',
      'id_alternatif INT UNSIGNED NOT NULL',
      'id_kriteria INT UNSIGNED NOT NULL',
      'nilai_kriteria DOUBLE UNSIGNED NOT NULL DEFAULT "0"',
    ]);
    $this->forge->addKey('id_nilai_kriteria', true);
    $this->forge->addForeignKey('id_kriteria', 'kriteria', 'id_kriteria', 'CASCADE', 'CASCADE');
    $this->forge->addForeignKey('id_alternatif', 'alternatif', 'id_alternatif', 'CASCADE', 'CASCADE');
    $this->forge->createTable('nilai_kriteria');
  }

  public function down()
  {
    $this->forge->dropTable('nilai_kriteria');
  }
}
