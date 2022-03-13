<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Dompdf\Dompdf;

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

    $sheet->getStyle('A1:O21')->applyFromArray($styleArray);

    $sheet->setCellValue('A1', 'No.');
    $sheet->setCellValue('B1', 'Nama Produk');
    $sheet->setCellValue('C1', 'Harga');
    $sheet->setCellValue('D1', 'Rating');
    $sheet->setCellValue('E1', 'Merk');
    $sheet->setCellValue('F1', 'Prosesor');
    $sheet->setCellValue('G1', 'Kapasitas Memori (RAM)');
    $sheet->setCellValue('H1', 'Tipe Penyimpanan');
    $sheet->setCellValue('I1', 'Kapasitas Penyimpanan');
    $sheet->setCellValue('J1', 'Ukuran Layar');
    $sheet->setCellValue('K1', 'Kartu Grafis');
    $sheet->setCellValue('L1', 'Sistem Operasi');
    $sheet->setCellValue('M1', 'Masa Garansi');
    $sheet->setCellValue('N1', 'Kondisi Produk');
    $sheet->setCellValue('O1', 'URL Produk');

    $sheet->getStyle('A1:O1')->getFont()->setBold(true);

    $data = $this->db->query(
      "SELECT a.* FROM nilai_akhir na JOIN alternatif a ON na.id_alternatif = a.id_alternatif ORDER BY nilai_akhir DESC"
    )->getResultArray();

    foreach ($data as $key => $value) {
      $sheet->setCellValue('A' . ($key + 2), $key + 1);
      $sheet->setCellValue('B' . ($key + 2), $value['nama']);
      $sheet->setCellValue('C' . ($key + 2), $value['harga']);
      $sheet->setCellValue('D' . ($key + 2), $value['rating_produk']);
      $sheet->setCellValue('E' . ($key + 2), $value['merk']);
      $sheet->setCellValue('F' . ($key + 2), $value['prosesor']);
      $sheet->setCellValue('G' . ($key + 2), $value['kapasitas_ram']);
      $sheet->setCellValue('H' . ($key + 2), $value['tipe_penyimpanan']);
      $sheet->setCellValue('I' . ($key + 2), $value['kapasitas_penyimpanan']);
      $sheet->setCellValue('J' . ($key + 2), $value['ukuran_layar']);
      $sheet->setCellValue('K' . ($key + 2), $value['kartu_grafis']);
      $sheet->setCellValue('L' . ($key + 2), $value['sistem_operasi']);
      $sheet->setCellValue('M' . ($key + 2), $value['masa_garansi']);
      $sheet->setCellValue('N' . ($key + 2), $value['kondisi_produk']);
      $sheet->setCellValue('O' . ($key + 2), $value['url_produk']);
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

  public function pdfReporting()
  {
    if (!isset($_POST['pdf'])) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data['query'] = $this->db->query(
      "SELECT a.* FROM nilai_akhir na JOIN alternatif a ON na.id_alternatif = a.id_alternatif ORDER BY nilai_akhir DESC"
    )->getResultArray();

    $dompdf = new Dompdf();
    $options = $dompdf->getOptions();
    $options->setDefaultFont('Courier');
    $dompdf->setOptions($options);

    $dompdf->loadHtml(view('perhitungan/pdf-reporting', $data));

    $dompdf->setPaper('A4', 'portrait');
    $dompdf->filename = "laporan peringkat alternatif.pdf";
    $dompdf->render();

    $dompdf->stream();
  }
}
