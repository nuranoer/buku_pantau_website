<?php

namespace App\Controllers;

use App\Models\Laporan;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanController extends BaseController
{
    private Laporan $laporan;

    public function __construct()
    {
        $this->laporan = new Laporan();
        $this->laporan->asObject();
    }

    public function index()
    {
        $dari = $this->request->getPost('dari');
        $sampai = $this->request->getPost('sampai');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        if (!$validation->run($this->request->getPost())) {
            return view('admin/datalaporan/filter_laporan');
        } else {
            $data['laporan'] = $this->laporan->getLaporan($dari, $sampai);

            return view('admin/datalaporan/laporankegiatan', $data);
        }
    }
    

    public function export()
    {
        $dari = $this->request->getPost('dari');
        $sampai = $this->request->getPost('sampai');

        $model = new Laporan();
        $laporan = $model->getLaporan($dari, $sampai);
    
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Set judul kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Kegiatan');
        $sheet->setCellValue('C1', 'Hari');
        $sheet->setCellValue('D1', 'Tanggal');
        $sheet->setCellValue('E1', 'Waktu');
        $sheet->setCellValue('F1', 'Nama Guru');
    
        // Set data laporan
        $kolom = 2;
        $nomor = 1;
        foreach ($laporan as $data) {
            $sheet->setCellValue('A' . $kolom, $nomor);
            $sheet->setCellValue('B' . $kolom, $data['nama_kegiatan']);
            $sheet->setCellValue('C' . $kolom, $data['hari']);
            $sheet->setCellValue('D' . $kolom, $data['tanggal']);
            $sheet->setCellValue('E' . $kolom, $data['waktu']);
            $sheet->setCellValue('F' . $kolom, $data['nama_guru']);
            $kolom++;
            $nomor++;
        }
    
        // Mengeksport ke file
        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Kegiatan.xlsx';
    
        // Mengatur header dan output file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
    
        $writer->save('php://output');
    }
}
