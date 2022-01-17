<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubKriteria extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id INT UNSIGNED AUTO_INCREMENT',
      'kriteria_id INT UNSIGNED',
      'nama VARCHAR(64)',
      'nilai_preferensi INT UNSIGNED DEFAULT "0"',
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('kriteria_id', 'kriteria', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('sub_kriteria');
  }

  public function down()
  {
    $this->forge->dropTable('sub_kriteria');
  }
}
