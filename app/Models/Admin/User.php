<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class User extends Model
{
  protected $table            = 'users';
  protected $primaryKey       = 'id_user';
  protected $allowedFields    = ['nama', 'username', 'password', 'id_user_role'];

  protected $validationRules = [
    'nama' => 'required',
    'username' => 'required|is_unique[users.username, id_user, {id_user}]',
    'password' => 'required|min_length[6]',
    'id_user_role' => 'required',
  ];

  public function getUser($id = false)
  {
    return ($id == false) ? $this->findAll() : $this->find($id);
  }

  protected $beforeInsert = ['beforeInsert'];

  protected function beforeInsert($data)
  {
    return $this->getUpdatedDataWithHashedPassword($data);
  }

  private function getUpdatedDataWithHashedPassword($data)
  {
    if (isset($data['data']['password'])) {
      $plaintextPassword = $data['data']['password'];
      $data['data']['password'] = $this->hashPassword($plaintextPassword);
    }
    return $data;
  }

  private function hashPassword(string $plaintextPassword): string
  {
    return password_hash($plaintextPassword, PASSWORD_DEFAULT);
  }
}
