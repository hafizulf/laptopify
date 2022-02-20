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
      'judul' => 'Subkriteria - Tambah Data',
      'kriteria' => $this->kriteriaModel->getQualitativeBenefitCriteria(),
    ];

    return view('kriteria/create-subkriteria', $data);
  }

  public function create()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $id_kriteria = $this->request->getPost('id_kriteria');
    $nama = $this->request->getPost('nama');
    $nilai_preferensi = $this->request->getPost('nilai_preferensi');
    $jumlahSk = $this->request->getPost('jumlahsk');

    $batchData = [];
    for ($i = 0; $i < $jumlahSk; $i++) {
      $data = [
        'id_kriteria' => $id_kriteria,
        'nama' => $nama[$i],
        'nilai_preferensi' => $nilai_preferensi[$i],
      ];

      array_push($batchData, $data);
    }

    if ($this->model->saveSubkriteria($batchData) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil ditambahkan']);
    }
  }

  public function delete()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $ids = $this->request->getPost('id');
    $this->model->whereIn('id_sub_kriteria', $ids)->delete();
    return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil dihapus']);
  }

  public function getDataById()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $id = $this->request->getPost('id');
    $data = $this->model->findSubkriteriaById($id);
    return $this->response->setJSON($data);
  }

  public function update()
  {
    if (!$this->request->isAJAX()) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = $this->request->getPost();

    $this->model->setValidationRules([
      'id_kriteria' => 'required',
      'nama' => 'required',
      'nilai_preferensi' => 'required|is_numeric',
    ]);

    if ($this->model->save($data) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil diperbarui']);
    }
  }
}
