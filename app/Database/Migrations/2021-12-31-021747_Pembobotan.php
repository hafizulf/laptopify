<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembobotan extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_pembobotan INT UNSIGNED AUTO_INCREMENT',
      'id_kriteria INT UNSIGNED',
      'nilai_bobot INT UNSIGNED DEFAULT "0"',
    ]);
    $this->forge->addKey('id_pembobotan', true);
    $this->forge->addForeignKey('id_kriteria', 'kriteria', 'id_kriteria', 'CASCADE', 'CASCADE');
    $this->forge->createTable('pembobotan');
  }

  public function down()
  {
    $this->forge->dropTable('pembobotan');
  }
}
