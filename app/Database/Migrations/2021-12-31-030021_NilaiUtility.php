<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiUtility extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id INT UNSIGNED AUTO_INCREMENT',
      'nilai_kriteria_id INT UNSIGNED',
      'nilai_utility FLOAT',
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('nilai_kriteria_id', 'nilai_kriteria', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('nilai_utility');
  }

  public function down()
  {
    $this->forge->dropTable('nilai_utility');
  }
}
