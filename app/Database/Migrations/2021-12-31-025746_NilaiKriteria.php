<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiKriteria extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id INT UNSIGNED AUTO_INCREMENT',
      'kriteria_id INT UNSIGNED',
      'nilai_kriteria INT UNSIGNED DEFAULT "0"',
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('kriteria_id', 'kriteria', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('nilai_kriteria');
  }

  public function down()
  {
    $this->forge->dropTable('nilai_kriteria');
  }
}
