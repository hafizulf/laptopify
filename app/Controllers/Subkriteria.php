<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Subkriteria as SubkriteriaModel;

class Subkriteria extends BaseController
{
  public function __construct()
  {
    $this->model = new SubkriteriaModel();
  }

  public function index()
  {
    $data = [
      'judul' => 'Sub Kriteria',
      'subkriteria' => $this->model->findAll(),
    ];
    return view('kriteria/subkriteria', $data);
  }
}
