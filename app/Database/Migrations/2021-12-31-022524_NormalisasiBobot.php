<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NormalisasiBobot extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_normalisasi_bobot INT UNSIGNED AUTO_INCREMENT',
      'id_pembobotan INT UNSIGNED',
      'nilai_normalisasi_bobot DOUBLE UNSIGNED DEFAULT "0"',
    ]);
    $this->forge->addKey('id_normalisasi_bobot', true);
    $this->forge->addForeignKey('id_pembobotan', 'pembobotan', 'id_pembobotan', 'CASCADE', 'CASCADE');
    $this->forge->createTable('normalisasi_bobot');
  }

  public function down()
  {
    $this->forge->dropTable('normalisasi_bobot');
  }
}
