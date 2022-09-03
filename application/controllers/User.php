<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'model');
        is_logout();
        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function index()
    {
        $data = [
            'judul' => $this->session->userdata('nama'),
            'user' => $this->user
        ];

        $this->templating->load('user/index', $data);
    }
    
    public function ubah_password()
    {
        $data = [
            'user' => $this->user,
            'judul' => 'Ubah Password'
        ];

        $this->form_validation->set_rules('password', 'Password Lama', 'required');
        $this->form_validation->set_rules('newpass', 'Password Baru', 'required|min_length[8]');
        $this->form_validation->set_rules('newpass2', 'Konfirmasi Password', 'required|matches[newpass]');

        if ($this->form_validation->run() == false) {
            $this->templating->load('user/ubah-password', $data);
        } else {
            $this->model->ubah_password();
        }
    }
}
