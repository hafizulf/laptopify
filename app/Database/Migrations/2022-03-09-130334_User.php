<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_user INT UNSIGNED AUTO_INCREMENT',
      'nama VARCHAR(64)',
      'username VARCHAR(64)',
      'password VARCHAR(64)',
      'id_user_role INT UNSIGNED',
    ]);
    $this->forge->addKey('id_user', true);
    $this->forge->addForeignKey('id_user_role', 'user_roles', 'id_user_role', 'CASCADE', 'CASCADE');
    $this->forge->createTable('users');
  }

  public function down()
  {
    $this->forge->dropTable('users');
  }
}
