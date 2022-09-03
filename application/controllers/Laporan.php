<?php
defined('BASEPATH') or exit('No direct script access allowed');
setlocale(LC_ALL, 'IND');
class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Kegiatan_model', 'model');
    }

    public function laporan()
    {
        $data = [
            'judul' => 'Laporan',
            'user' => $this->user,
            'namauser' => $this->model->getNamaUser(),
            'divisi' => $this->model->getNamaDivisi()
        ];

        $this->templating->load('report/index', $data);
    }

    public function laporan_kadiv()
    {
        $data = [
            'judul' => 'Laporan Kadiv',
            'user' => $this->user,
            'namauser' => $this->model->getNamaUserDivisi(),
        ];

        $this->templating->load('report/index_kadiv', $data);
    }

    public function cetak_laporan()
    { 
        if (isset($_POST['btn-cek'])) {
            $mulai = $this->input->post('tgl_mulai');
            $selesai = $this->input->post('tgl_selesai');
            $user = $this->input->post('namauser');
            $divisi = $this->input->post('divisi');

            $data = [
                'judul' => 'Laporan',
                'user' => $this->user,
                'namauser' => $this->model->getNamaUser(),
                'divisi' => $this->model->getNamaDivisi(),
                'data' => $this->model->getkegiatanByDate($mulai, $selesai, $user, $divisi)
            ];

            $this->templating->load('report/index', $data);

        } else if (isset($_POST['cetak-pdf'])) {
            $mulai = $this->input->post('tgl_mulai');
            $selesai = $this->input->post('tgl_selesai');
            $user = $this->input->post('namauser');
            $divisi = $this->input->post('divisi');

            $this->load->library('dompdf_gen');

            $data = [
                'data' => $this->model->getkegiatanByDate($mulai, $selesai, $user, $divisi)
            ];

            $this->load->view('report/laporan_pdf', $data);

            $paper_size = 'A4';
            $orientation = 'landscape';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation);

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream('Laporan kegiatan Jaringan.pdf', ['Attachment' => true]); 

            exit;
        } else {
            redirect('laporan-kegiatan');
        }
    }

    public function cetak_laporan_kadiv()
    { 
        if (isset($_POST['btn-cek'])) {
            $mulai = $this->input->post('tgl_mulai');
            $selesai = $this->input->post('tgl_selesai');
            $user = $this->input->post('namauser');
            $divisi = $this->input->post('divisi');

            $data = [
                'judul' => 'Laporan Kadiv',
                'user' => $this->user,
                'divisi' => $this->model->getNamaDivisi(),
                'namauser' => $this->model->getNamaUserDivisi(),
                'data' => $this->model->getkegiatanByDateKadiv($mulai, $selesai, $user, $divisi)
            ];

            $this->templating->load('report/index_kadiv', $data);

        } else if (isset($_POST['cetak-pdf'])) {
            $mulai = $this->input->post('tgl_mulai');
            $selesai = $this->input->post('tgl_selesai');
            $user = $this->input->post('namauser');
            $divisi = $this->input->post('divisi');

            $this->load->library('dompdf_gen');

            $data = [
                'data' => $this->model->getkegiatanByDate($mulai, $selesai, $user, $divisi)
            ];

            $this->load->view('report/laporan_pdf', $data);

            $paper_size = 'A4';
            $orientation = 'landscape';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation);

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream('Laporan kegiatan Jaringan.pdf', ['Attachment' => true]); 

            exit;
        } else {
            redirect('laporan-kegiatan');
        }
    }
}
