<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Exception;

class Automatic extends BaseController
{
  public function index()
  {
    $data = [
      'judul' => 'Pencarian Otomatis'
    ];

    return view('otomatis/index', $data);
  }

  public function get_data()
  {

    try {
      $maxPrice = $this->request->getGet('max_price');
      $minPrice = $this->request->getGet('min_price');
      $limit = $this->request->getGet('limit');

      // Request data
      ini_set('max_execution_time', '1200');

      $ch = curl_init("http://127.0.0.1:8000/products?max={$maxPrice}&min={$minPrice}&limit={$limit}");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $response = curl_exec($ch);
      curl_close($ch);

      sleep(1);

      // Save products to a json file
      $products = json_encode(json_decode($response), JSON_PRETTY_PRINT);
      $file_path = ROOTPATH . 'data/products.json';
      file_put_contents($file_path, $products);

      sleep(1);

      // re-migrate table and seed alternatif data
      exec('php ' . $_ENV['PHP_SPARK_PATH'] . ' migrate:refresh');

      sleep(1);

      exec('php ' . $_ENV['PHP_SPARK_PATH'] . ' db:seed kriteria');
      exec('php ' . $_ENV['PHP_SPARK_PATH'] . ' db:seed subkriteria');
      exec('php ' . $_ENV['PHP_SPARK_PATH'] . ' db:seed pembobotan');
      exec('php ' . $_ENV['PHP_SPARK_PATH'] . ' db:seed alternatif');

      sleep(1);

      // return if successfully
      echo json_encode(["status" => TRUE]);
    } catch (Exception $e) {
      echo json_encode(["status" => FALSE]);
    }
  }
}
