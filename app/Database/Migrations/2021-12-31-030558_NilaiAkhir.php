<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NIlaiAkhir extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id INT UNSIGNED AUTO_INCREMENT',
      'alternatif_id INT UNSIGNED',
      'nilai_akhir FLOAT',
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('alternatif_id', 'alternatif', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('nilai_akhir');
  }

  public function down()
  {
    $this->forge->dropTable('nilai_akhir');
  }
}
