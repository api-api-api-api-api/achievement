<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getData()
    {
        return $this->db->get_where('achievement', ['user_id' => $this->user['id_user']])->result_array();
    }

    public function ubah_data()
    {
        $id = $this->input->post('id_user');
        $isi = $this->input->post('keterangan', true);

        $this->db->set('keterangan', $isi);

        $this->db->where('id_user', $id);
        $query = $this->db->update('achievement');

        if ($this->db->affected_rows($query) > 0) {
            $this->session->set_flashdata('msg', 'diupdate.');
            redirect('DaftarAchievement');
        } else {
            $this->session->set_flashdata('err', 'diupdate.');
            redirect('DaftarAchievement');
        }
    }

    public function ubah_password()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $upass = $data['user']['password'];
        $pass = $this->input->post('password');
        $newpass = $this->input->post('newpass');

        // jika password yang di verify tidak sama dengan password user dari db
        if (!password_verify($pass, $upass)) {
            $this->session->set_flashdata('msg', 'Password Lama Salah!');
            redirect('ubah-password');
        } else {
            // jika input password lama sama dengan input password baru
            if ($newpass == $pass) {
                $this->session->set_flashdata('msg', 'Password baru tidak boleh sama dengan password lama.');
                redirect('ubah-password');
            } else {
                // jika tidak sama dengan password baru
                $pass_hash = password_hash($newpass, PASSWORD_DEFAULT);

                $this->db->set('password', $pass_hash);
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->update('user');

                $this->session->set_flashdata('ubahpass', '<div class="alert alert-success">Password berhasil diubah.</div>');
                redirect('ubah-password');
            }
        }
    }
}
