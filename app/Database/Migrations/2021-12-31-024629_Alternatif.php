<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alternatif extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_alternatif INT UNSIGNED AUTO_INCREMENT',
      'kode VARCHAR(64)',
      'nama VARCHAR(255)',
      'url_produk TEXT',
      'rating_produk FLOAT',
      'harga INT UNSIGNED',
      'merk VARCHAR(64)',
      'prosesor VARCHAR(64)',
      'kapasitas_ram INT UNSIGNED',
      'tipe_penyimpanan VARCHAR(64)',
      'kapasitas_penyimpanan INT UNSIGNED',
      'ukuran_layar VARCHAR(64)',
      'kartu_grafis VARCHAR(64)',
      'sistem_operasi VARCHAR(64)',
      'masa_garansi INT UNSIGNED',
      'kondisi_produk VARCHAR(64)',
    ]);
    $this->forge->addKey('id_alternatif', true);
    $this->forge->createTable('alternatif');
  }

  public function down()
  {
    $this->forge->dropTable('alternatif');
  }
}
