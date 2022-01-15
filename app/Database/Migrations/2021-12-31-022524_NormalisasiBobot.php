<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NormalisasiBobot extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id INT UNSIGNED AUTO_INCREMENT',
      'pembobotan_id INT UNSIGNED NOT NULL',
      'nilai_normalisasi_bobot FLOAT UNSIGNED NOT NULL DEFAULT "0"',
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('pembobotan_id', 'pembobotan', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('normalisasi_bobot');
  }

  public function down()
  {
    $this->forge->dropTable('normalisasi_bobot');
  }
}
