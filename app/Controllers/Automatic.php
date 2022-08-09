<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
    $params = $this->request->getGet();

    $maxPrice = isset($params['max_price']) ? $params['max_price'] : 0;
    $minPrice = isset($params['min_price']) ? $params['min_price'] : 0;
    $limit = isset($params['limit']) ? $params['limit'] : 20;

    ini_set('max_execution_time', '1200');

    $ch = curl_init("http://127.0.0.1:8000/products?max={$maxPrice}&min={$minPrice}&limit={$limit}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    sleep(1);

    // Save products to a json file
    $products = json_encode(json_decode($response), JSON_PRETTY_PRINT);
    $file_path = 'data/products.json';
    file_put_contents($file_path, $products);

    sleep(1);

    // re-migrate table and seed alternatif data
    exec('php C:\xampp\htdocs\laptopify\spark migrate:refresh');

    sleep(1);

    exec('php  C:\xampp\htdocs\laptopify\spark db:seed kriteria');
    exec('php  C:\xampp\htdocs\laptopify\spark db:seed subkriteria');
    exec('php  C:\xampp\htdocs\laptopify\spark db:seed pembobotan');
    exec('php  C:\xampp\htdocs\laptopify\spark db:seed alternatif');
  }
}
