<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Subkriteria as SubkriteriaModel;
use App\Models\Kriteria as KriteriaModel;

class Subkriteria extends BaseController
{
  public function __construct()
  {
    $this->model = new SubkriteriaModel();
    $this->kriteriaModel = new KriteriaModel();
  }

  public function getRowSpan(array $data)
  {
    $arr = [];
    for ($i = 0; $i < sizeof($data); $i++) {
      $dataName = $data[$i];

      # If there is no array for the data, then create a element.
      if (!isset($arr[$dataName])) {
        $arr[$dataName] = [];
        $arr[$dataName]['rowspan'] = 0;
      }
      $arr[$dataName]['printed'] = "yes";

      # Increment the row span value.
      $arr[$dataName]['rowspan'] += 1;
    }

    return $arr;
  }

  public function index()
  {
    $query = $this->model->findAllSubkriteria();

    $kriteria = [];
    foreach ($query->getResultArray() as $row) {
      array_push($kriteria, $row['nama_kriteria']);
    }

    $data = [
      'judul' => 'Sub Kriteria',
      'subkriteria' => $query,
      'rowspan' => $this->getRowSpan($kriteria),
    ];

    return view('kriteria/subkriteria', $data);
  }

  public function create_page()
  {
    $data = [
      'kriteria' => $this->kriteriaModel->getQualitativeBenefitCriteria(),
    ];

    return view('kriteria/create-subkriteria', $data);
  }

  public function create()
  {
    //
  }
}
