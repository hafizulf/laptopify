<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UserRole extends Model
{
  protected $table            = 'user_roles';
  protected $primaryKey       = 'id_user_role';
  protected $allowedFields    = ['role'];

  protected $validationRules  = [
    'role' => 'required|is_unique[user_roles.role, id_user_role, {id_user_role}]',
  ];
}
