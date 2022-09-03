<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        is_login();
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] =  'Halaman Login';
            $this->load->view('auth/index', $data);
        } else {
            // jika lolos validasi, proses..
            $this->_login();
        }
    }

    public function _login()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = $this->input->post('pass', true);

        $user = $this->db->join('divisi', 'id_divisi = divisi');
        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'nama_divisi' => $user['nama_divisi'],
                    'divisi' => $user['divisi'],
                ];

                $this->session->set_userdata($data);

                $this->session->set_flashdata('message',  $data['nama']);
                redirect('DaftarAchievement');
                
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username / Password salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('divisi');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar!</div>');
        redirect('auth');
    }

    public function notfound()
    {
        $data['judul'] = 'Page Not Found';
        $this->load->view('auth/error_404', $data);
    }
}
