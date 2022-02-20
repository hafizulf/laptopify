<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubKriteria extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_sub_kriteria INT UNSIGNED AUTO_INCREMENT',
      'id_kriteria INT UNSIGNED',
      'nama VARCHAR(64)',
      'nilai_preferensi INT UNSIGNED DEFAULT "0"',
    ]);
    $this->forge->addKey('id_sub_kriteria', true);
    $this->forge->addForeignKey('id_kriteria', 'kriteria', 'id_kriteria', 'CASCADE', 'CASCADE');
    $this->forge->createTable('sub_kriteria');
  }

  public function down()
  {
    $this->forge->dropTable('sub_kriteria');
  }
}
