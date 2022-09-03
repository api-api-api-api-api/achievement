<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'model');
        is_logout();
        is_admin();
        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function pengguna()
    {
        $data = [
            'judul' => 'Pengguna',
            'user' => $this->user,
            'pengguna' => $this->model->getPengguna()
        ];

        $this->templating->load('admin/pengguna', $data);
    }

    public function tambah_pengguna()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('pass1', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('pass2', 'Konfirmasi Password', 'required|matches[pass1]');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Tambah Pengguna',
                'user' => $this->user,
                'divisi' => $this->model->datadivisi()->result(),
                'level' => $this->model->datalevel()->result()
            ];

            $this->templating->load('admin/tambah-pengguna', $data);
        } else {
            $this->model->tambah_pengguna();
        }
    }

    public function hapus_pengguna()
    {
        $id = $this->input->post('id');
        $this->db->where('id_user', $id);
        $this->db->delete('user');
        $this->db->where('user_id', $id);
        $this->db->delete('achievement');

        $this->session->set_flashdata('msg', 'dihapus.');

        redirect('data-pengguna');
    }

    public function divisi()
    {
        $data = [
            'judul' => 'Divisi',
            'user' => $this->user,
            'divisi' => $this->model->getDivisi()
        ];

        $this->templating->load('admin/divisi', $data);
    }

    public function tambah_divisi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Tambah Divisi',
                'user' => $this->user,
                
            ];

            $this->templating->load('admin/tambah-divisi', $data);
        } else {
            $this->model->tambah_divisi();
        }
    }

    public function hapus_divisi()
    {
        $id = $this->input->post('id');
        $this->db->where('id_divisi', $id);
        $this->db->delete('divisi');
        $this->session->set_flashdata('msg', 'dihapus.');
        redirect('data-divisi');
    }
}
