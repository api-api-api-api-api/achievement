<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getPengguna()
    {
        // menggunankan where !=1 -> untuk menampilkan user instansi saja (tidak termasuk admin)
        
        $this->db->join('divisi', 'id_divisi = divisi');
        return $this->db->get_where('user')->result_array();
    }

    public function getDivisi()
    {
        // menggunankan where !=1 -> untuk menampilkan user instansi saja (tidak termasuk admin)
        $this->db->order_by('nama_divisi','ASC');
        return $this->db->get_where('divisi')->result_array();
    }

    function datadivisi()
    {
        $this->db->order_by('nama_divisi','ASC');
        return $query = $this->db->get('divisi');
    }

    function datalevel()
    {
        $this->db->order_by('role','ASC');
        return $query = $this->db->get('user_role');
    }

    public function tambah_pengguna()
    {
        // tangkap data dan encrypt password
        $password = password_hash($this->input->post('pass1'), PASSWORD_DEFAULT);
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'divisi' => htmlspecialchars($this->input->post('divisi', true)),
            'role_id' => htmlspecialchars($this->input->post('level', true)),
            'password' => $password,
        ];

        // insert data ke database
        $this->db->insert('user', $data);
        // set session
        $this->session->set_flashdata('msg', 'ditambahkan.');
        // kembalikan ke halaman pengguna
        redirect('data-pengguna');
    }

    public function tambah_divisi()
    {
        $data = [
            'nama_divisi' => htmlspecialchars($this->input->post('nama', true)),
        ];

        $this->db->insert('divisi', $data);

        $this->session->set_flashdata('msg', 'ditambahkan.');
        redirect('data-divisi');
    }

    public function resetPassword()
    {
        $id = $this->input->post('id');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $this->db->set('password', $password);
        $this->db->where('id_user', $id);
        $this->db->update('user');

        $this->session->set_flashdata('msg', 'diubah.');
        redirect('data-pengguna');
    }

}
