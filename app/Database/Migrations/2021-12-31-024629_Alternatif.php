<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alternatif extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id INT UNSIGNED AUTO_INCREMENT',
      'nama VARCHAR(255) NOT NULL',
      'kode VARCHAR(64) NOT NULL',
      'harga INT UNSIGNED NOT NULL',
      'rating_produk VARCHAR(64) NOT NULL',
      'merk VARCHAR(64) NOT NULL',
      'prosesor VARCHAR(64) NOT NULL',
      'kapasitas_ram INT UNSIGNED NOT NULL',
      'tipe_penyimpanan VARCHAR(64) NOT NULL',
      'kapasitas_penyimpanan INT UNSIGNED NOT NULL',
      'ukuran_layar VARCHAR(64) NOT NULL',
      'kartu_grafis VARCHAR(64) NOT NULL',
      'sistem_operasi VARCHAR(64) NOT NULL',
      'masa_garansi INT UNSIGNED NOT NULL',
      'kondisi_produk VARCHAR(64) NOT NULL',
      'link_produk TEXT NOT NULL',
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('alternatif');
  }

  public function down()
  {
    $this->forge->dropTable('alternatif');
  }
}
