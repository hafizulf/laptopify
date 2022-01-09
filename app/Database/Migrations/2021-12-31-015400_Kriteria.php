<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kriteria extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id INT UNSIGNED AUTO_INCREMENT',
      'nama VARCHAR(64) NOT NULL',
      'jenis VARCHAR(64) NOT NULL',
      'data_kuantitatif INT NOT NULL',
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('kriteria');
  }

  public function down()
  {
    $this->forge->dropTable('kriteria');
  }
}
