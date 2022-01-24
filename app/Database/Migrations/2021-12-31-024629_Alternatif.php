<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alternatif extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id INT UNSIGNED AUTO_INCREMENT',
      'nama VARCHAR(255)',
      'kode VARCHAR(64)',
      'harga INT UNSIGNED',
      'rating_produk FLOAT',
      'merk VARCHAR(64)',
      'prosesor VARCHAR(64)',
      'kapasitas_ram INT UNSIGNED',
      'tipe_penyimpanan VARCHAR(64)',
      'kapasitas_penyimpanan INT UNSIGNED',
      'ukuran_layar VARCHAR(64)',
      'kartu_grafis VARCHAR(64)',
      'sistem_operasi VARCHAR(64)',
      'masa_garansi FLOAT UNSIGNED',
      'kondisi_produk VARCHAR(64)',
      'url_produk TEXT',
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('alternatif');
  }

  public function down()
  {
    $this->forge->dropTable('alternatif');
  }
}
