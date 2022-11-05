<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Alternatif as ModelsAlternatif;

class Alternatif extends Seeder
{
  public function run()
  {
    $json = file_get_contents(ROOTPATH . 'data/products.json');
    $products = json_decode($json);

    foreach ($products as $product) {
      $object = new ModelsAlternatif();

      $object->insert([
        'kode' => $product->kode,
        'nama' => $product->nama,
        'url_produk' => $product->url_produk,
        'rating_produk' => $product->rating,
        'harga' => $product->harga,
        'merk' => $product->merk,
        'prosesor' => $product->prosesor,
        'kapasitas_ram' => $product->kapasitas_ram,
        'tipe_penyimpanan' => $product->tipe_penyimpanan,
        'kapasitas_penyimpanan' => $product->kapasitas_penyimpanan,
        'ukuran_layar' => $product->ukuran_layar,
        'sistem_operasi' => $product->sistem_operasi,
        'masa_garansi' => $product->masa_garansi,
        'kondisi_produk' => $product->kondisi_produk,
      ]);
    }
  }
}
