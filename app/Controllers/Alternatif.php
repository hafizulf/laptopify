<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Alternatif as ModelsAlternatif;

class Alternatif extends BaseController
{
  public function __construct()
  {
    $this->model = new ModelsAlternatif();
  }

  public function index()
  {
    $data = [
      'judul' => 'Alternatif',
      'alternatif' => $this->model->findAll(),
    ];

    return view('alternatif/index', $data);
  }
}
