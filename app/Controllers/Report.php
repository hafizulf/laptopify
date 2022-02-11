<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends BaseController
{
  protected $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function excelReporting()
  {
    if (!isset($_POST['excel'])) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $styleArray = array(
      'borders' => array(
        'allBorders' => array(
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => array('hex' => '#000000'),
        ),
      ),
    );

    $sheet->getStyle('A1:N21')->applyFromArray($styleArray);

    $sheet->setCellValue('A1', 'Nama Produk');
    $sheet->setCellValue('B1', 'Harga');
    $sheet->setCellValue('C1', 'Rating');
    $sheet->setCellValue('D1', 'Merk');
    $sheet->setCellValue('E1', 'Prosesor');
    $sheet->setCellValue('F1', 'Kapasitas Memori (RAM)');
    $sheet->setCellValue('G1', 'Tipe Penyimpanan');
    $sheet->setCellValue('H1', 'Kapasitas Penyimpanan');
    $sheet->setCellValue('I1', 'Ukuran Layar');
    $sheet->setCellValue('J1', 'Kartu Grafis');
    $sheet->setCellValue('K1', 'Sistem Operasi');
    $sheet->setCellValue('L1', 'Masa Garansi');
    $sheet->setCellValue('M1', 'Kondisi Produk');
    $sheet->setCellValue('N1', 'URL Produk');

    $sheet->getStyle('A1:N1')->getFont()->setBold(true);

    $data = $this->db->query(
      "SELECT a.* FROM nilai_akhir na JOIN alternatif a ON na.alternatif_id = a.id ORDER BY nilai_akhir DESC"
    )->getResultArray();

    foreach ($data as $key => $value) {
      $sheet->setCellValue('A' . ($key + 2), $value['nama']);
      $sheet->setCellValue('B' . ($key + 2), $value['harga']);
      $sheet->setCellValue('C' . ($key + 2), $value['rating_produk']);
      $sheet->setCellValue('D' . ($key + 2), $value['merk']);
      $sheet->setCellValue('E' . ($key + 2), $value['prosesor']);
      $sheet->setCellValue('F' . ($key + 2), $value['kapasitas_ram']);
      $sheet->setCellValue('G' . ($key + 2), $value['tipe_penyimpanan']);
      $sheet->setCellValue('H' . ($key + 2), $value['kapasitas_penyimpanan']);
      $sheet->setCellValue('I' . ($key + 2), $value['ukuran_layar']);
      $sheet->setCellValue('J' . ($key + 2), $value['kartu_grafis']);
      $sheet->setCellValue('K' . ($key + 2), $value['sistem_operasi']);
      $sheet->setCellValue('L' . ($key + 2), $value['masa_garansi']);
      $sheet->setCellValue('M' . ($key + 2), $value['kondisi_produk']);
      $sheet->setCellValue('N' . ($key + 2), $value['url_produk']);
    }

    $filename = 'Laporan peringkat alternatif.xlsx';

    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Laporan peringkat alternatif.xlsx"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('pragma: public');
    header('Content-Length: ' . filesize($filename));

    flush();
    readfile($filename);
    unlink($filename);
    exit;
  }
}
