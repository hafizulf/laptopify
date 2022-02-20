<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kriteria extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_kriteria INT UNSIGNED AUTO_INCREMENT',
      'nama VARCHAR(64)',
      'jenis VARCHAR(64)',
      'data_kuantitatif INT',
    ]);
    $this->forge->addKey('id_kriteria', true);
    $this->forge->createTable('kriteria');
  }

  public function down()
  {
    $this->forge->dropTable('kriteria');
  }
}
