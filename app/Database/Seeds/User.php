<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
  public function run()
  {
    $data = [
      [
        'nama' => 'My Admin',
        'username' => 'admin123',
        'password' => '$2y$10$H/a4efAvwObVJrHrTs7dIeD0BGvnjIRI/UTwQTFejj0yAyrVM4gJa',
        'id_user_role' => 1
      ],
      [
        'nama' => 'User Demo',
        'username' => 'user123',
        'password' => '$2y$10$AYhC42cSVfQ5/Z0k/QPcVOs5CfN/MQLTYVTERstRu8WXSqQ18ihPW',
        'id_user_role' => 2
      ],
    ];
    $this->db->table('users')->insertBatch($data);
  }
}
