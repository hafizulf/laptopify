<?php

namespace App\Models;

use CodeIgniter\Model;

class Subkriteria extends Model
{
  protected $table            = 'sub_kriteria';
  protected $allowedFields    = ['nama', 'nilai_preferensi'];
}
