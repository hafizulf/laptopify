<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembobotan extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id INT UNSIGNED AUTO_INCREMENT',
      'kriteria_id INT UNSIGNED NOT NULL',
      'nila_bobot INT UNSIGNED NOT NULL DEFAULT "0"',
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('kriteria_id', 'kriteria', 'id');
    $this->forge->createTable('pembobotan');
  }

  public function down()
  {
    $this->forge->dropTable('pembobotan');
  }
}
