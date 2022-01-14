<?php

namespace App\Models;

use CodeIgniter\Model;

class Bobot extends Model
{
  protected $table = 'pembobotan';
  protected $allowedFields = ['kriteria_id', 'nilai_bobot'];
  protected $validationRules = [
    'kriteria_id' => 'required',
    'nilai_bobot' => 'required|is_numeric'
  ];
  protected $validationMessages = [
    'kriteria_id' => [
      'required' => 'wajib dipilih.'
    ]
  ];
}
