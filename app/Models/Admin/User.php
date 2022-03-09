<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class User extends Model
{
  protected $table            = 'users';
  protected $primaryKey       = 'id_user';
  protected $allowedFields    = ['username', 'password', 'id_user_role'];

  public function getUser($id = false)
  {
    return ($id == false) ? $this->findAll() : $this->find($id);
  }
}
