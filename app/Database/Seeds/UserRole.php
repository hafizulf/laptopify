<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserRole extends Seeder
{
  public function run()
  {
    $data = [
      ['role' => 'Admin'],
      ['role' => 'User'],
    ];
    $this->db->table('user_roles')->insertBatch($data);
  }
}
