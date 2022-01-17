<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiKriteria extends Model
{
  protected $table            = 'nilai_kriteria';
  protected $allowedFields    = ['alternatif_id', 'kriteria_id', 'nilai_kriteria'];
}
