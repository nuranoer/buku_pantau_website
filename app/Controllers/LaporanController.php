<?php

namespace App\Controllers;

use App\Models\Laporan;
use Dompdf\Dompdf;

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

    public function printPDF()
    {
        // Mengambil tanggal dari input form
        $dari = $this->request->getPost('dari'); // Ambil nilai dari input "dari" pada form
        $sampai = $this->request->getPost('sampai'); // Ambil nilai dari input "sampai" pada form

        // Mengambil data dari database menggunakan model
        $model = new Laporan();
        $laporan = $model->getLaporan($dari, $sampai); // Ubah metode ini sesuai dengan kebutuhan Anda

        // Menggabungkan kop dan informasi data ke dalam variabel "$html"
        $html = view('admin/datalaporan/laporankegiatan', ['laporan' => $laporan]);

        // Membuat objek Dompdf
        $dompdf = new Dompdf();

        // Memuat konten HTML ke Dompdf
        $dompdf->loadHtml($html);

        // (Opsional) Mengatur ukuran dan orientasi halaman PDF
        $dompdf->setPaper('A4', 'portrait');

        // Merender konten HTML menjadi PDF
        $dompdf->render();

        // Mengirimkan hasil PDF ke browser untuk ditampilkan atau didownload
        $dompdf->stream('Laporan Kegiatan.pdf', ['Attachment' => false]);
    }
    

}
