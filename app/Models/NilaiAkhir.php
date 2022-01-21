<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiAkhir extends Model
{
  protected $table            = 'nilai_akhir';
  protected $allowedFields    = ['alternatif_id', 'nilai_akhir'];
}
