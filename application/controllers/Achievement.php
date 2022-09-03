<?php
defined('BASEPATH') or exit('No direct script access allowed');

function getDay($date){
    $datetime = DateTime::createFromFormat('Y-m-d', $date);
    return $datetime->format('l');
   }
   
   function getHari($date){
    $day=getDay($date);
    switch ($day) {
     case 'Sunday':
      $hari = 'Minggu';
      break;
     case 'Monday':
      $hari = 'Senin';
      break;
     case 'Tuesday':
      $hari = 'Selasa';
      break;
     case 'Wednesday':
      $hari = 'Rabu';
      break;
     case 'Thursday':
      $hari = 'Kamis';
      break;
     case 'Friday':
      $hari = 'Jum\'at';
      break;
     case 'Saturday':
      $hari = 'Sabtu';
      break;
     default:
      $hari = 'Tidak ada';
      break;
    }
    return $hari;
}

function dateIndonesia($date){
    if($date != '0000-00-00'){
        $date = explode('-', $date);

        $data = $date[2] . ' ' . bulan($date[1]) . ' '. $date[0];
    }else{
        $data = 'Format tanggal salah';
    }

    return $data;
}

function bulan($bln) {
    $bulan = $bln;

    switch ($bulan) {
        case 1:
            $bulan = "Januari";
            break;
        case 2:
            $bulan = "Februari";
            break;
        case 3:
            $bulan = "Maret";
            break;
        case 4:
            $bulan = "April";
            break;
        case 5:
            $bulan = "Mei";
            break;
        case 6:
            $bulan = "Juni";
            break;
        case 7:
            $bulan = "Juli";
            break;
        case 8:
            $bulan = "Agustus";
            break;
        case 9:
            $bulan = "September";
            break;
        case 10:
            $bulan = "Oktober";
            break;
        case 11:
            $bulan = "November";
            break;
        case 12:
            $bulan = "Desember";
            break;
    }
    return $bulan;
}

class Achievement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Achievement_model', 'model');
    }

    public function index()
    {
        $data = [
            'judul' => 'Achievement',
            'user' => $this->user
        ];

        $this->templating->load('achievement/index', $data);
    }

    public function read_data_manager()
    {
        if ($this->input->is_ajax_request() == true) {
            $list = $this->model->get_datatables_manager();
            $data = [];
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = [];
                
                $tgl = ''.getHari($field->tanggal).', '.dateIndonesia($field->tanggal).'';

                $btnAction = "<button type=\"button\" data-toggle=\"modal\" data-target=\"#detail-achievement-manager\" class='btn text-white btn-sm bg-gradient-info btn-hapus' data-id=\"$field->id\" data-tgl=\"$tgl\" data-divisi=\"$field->nama_divisi\" data-isi=\"$field->keterangan\"><i class=\"fas fa-fw fa-eye\"></i></button>";

                $row[] = $no;
                $row[] = $tgl;
                $row[] = $field->nama_divisi;
                $row[] = $btnAction;
                $data[] = $row;
            }

            $output = [
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->model->count_all_manager(),
                "recordsFiltered" => $this->model->count_filtered_manager(),
                "data" => $data,
            ];
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function read_data()
    {
        if ($this->input->is_ajax_request() == true) {
            $list = $this->model->get_datatables();
            $data = [];
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = [];
                
                $tgl = ''.getHari($field->tanggal).', '.dateIndonesia($field->tanggal).'';

                $btnAction = "
                <button type=\"button\" data-toggle=\"modal\" data-target=\"#detail-achievement\" class='btn text-white btn-sm bg-gradient-info btn-hapus' data-id=\"$field->id\" data-tgl=\"$tgl\" data-instansi=\"$field->nama\" data-isi=\"$field->keterangan\"><i class=\"fas fa-fw fa-eye\"></i></button>
                <button type=\"button\" data-toggle=\"modal\" data-target=\"#edit-achievement\" class='btn text-white btn-sm bg-gradient-primary btn-hapus' data-id=\"$field->id\" data-tgl=\"$tgl\" data-instansi=\"$field->nama\" data-isi=\"$field->keterangan\"><i class=\"fas fa-fw fa-edit\"></i></button>
                <button type=\"button\" data-toggle=\"modal\" data-target=\"#hapus-achievement\" class='btn text-white btn-sm bg-gradient-danger btn-hapus' data-id=\"$field->id\"><i class=\"fas fa-fw fa-trash-alt\"></i></button>";

                $row[] = $no;
                $row[] = $tgl;
                
                $row[] = $btnAction;
                $data[] = $row;
            }

            $output = [
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->model->count_all(),
                "recordsFiltered" => $this->model->count_filtered(),
                "data" => $data,
            ];
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function tambah_data_aksi()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
            $this->form_validation->set_rules('idtanggal', 'Tanggal ini', 'is_unique[achievement.idtanggal]');

            $this->form_validation->set_error_delimiters('', '');

            if ($this->form_validation->run() == false) {
                $errors = [
                    'tanggal' => form_error('tanggal'),
                    'keterangan' => form_error('keterangan'),
                    'keterangan' => form_error('idtanggal'),
                ];

                $data = [
                    'errors' => $errors
                ];

                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            } else {
                $this->model->tambah_data();
                $data['status'] = TRUE;
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        } else {
            redirect('DaftarAchievement');
        }
    }


    public function ubah_status()
    {
        $this->model->ubahStatusachievement();
    }

    public function hapus_data()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('achievement');
        $this->session->set_flashdata('msg', 'dihapus.');
        redirect('DaftarAchievement');
    }
}
