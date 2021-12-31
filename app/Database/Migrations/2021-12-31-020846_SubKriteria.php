<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubKriteria extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id INT UNSIGNED AUTO_INCREMENT',
      'kriteria_id INT UNSIGNED NOT NULL',
      'nama VARCHAR(64) NOT NULL',
      'nila_preferensi INT UNSIGNED NOT NULL DEFAULT "0"',
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('kriteria_id', 'kriteria', 'id');
    $this->forge->createTable('sub_kriteria');
  }

  public function down()
  {
    $this->forge->dropTable('sub_kriteria');
  }
}
