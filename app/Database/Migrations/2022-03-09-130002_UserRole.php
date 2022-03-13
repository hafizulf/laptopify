<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserRole extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_user_role INT UNSIGNED AUTO_INCREMENT',
      'role VARCHAR(64)',
    ]);
    $this->forge->addKey('id_user_role', true);
    $this->forge->createTable('user_roles');
  }

  public function down()
  {
    $this->forge->dropTable('user_roles');
  }
}
