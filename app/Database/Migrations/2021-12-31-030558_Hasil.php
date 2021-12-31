<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hasil extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id INT UNSIGNED AUTO_INCREMENT',
      'alternatif_id INT UNSIGNED NOT NULL',
      'nilai_akhir FLOAT NOT NULL',
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('alternatif_id', 'alternatif', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('hasil');
  }

  public function down()
  {
    $this->forge->dropTable('hasil');
  }
}
