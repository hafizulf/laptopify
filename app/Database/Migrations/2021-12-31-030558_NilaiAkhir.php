<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NIlaiAkhir extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_nilai_akhir INT UNSIGNED AUTO_INCREMENT',
      'id_alternatif INT UNSIGNED',
      'nilai_akhir DOUBLE UNSIGNED',
    ]);
    $this->forge->addKey('id_nilai_akhir', true);
    $this->forge->addForeignKey('id_alternatif', 'alternatif', 'id_alternatif', 'CASCADE', 'CASCADE');
    $this->forge->createTable('nilai_akhir');
  }

  public function down()
  {
    $this->forge->dropTable('nilai_akhir');
  }
}
