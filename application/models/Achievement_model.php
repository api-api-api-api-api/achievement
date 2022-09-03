<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Achievement_model extends CI_Model
{
    var $column_order = [null, 'tanggal',  'nama', 'tanggal'];
    var $column_order_user = ['tanggal',  'keterangan', 'tanggal'];
    var $column_search = ['tanggal', 'nama', 'keterangan'];
    var $order = ['tanggal' => 'desc'];

    private function _get_datatables_query_manager()
    {

        $this->db->from('achievement');
        $this->db->join('user', 'user_id = id_user');
        $this->db->join('divisi', 'divisi_id = id_divisi');

        $i = 0;

        // looping awal
        foreach ($this->column_search as $item) {
            // jika datatable mengirimkan value untuk pencarian
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function _get_datatables_query()
    {

        $this->db->from('achievement');
        $this->db->join('user', 'user_id = id_user');
        $this->db->where('achievement.divisi_id', $this->session->userdata('divisi'));

        $i = 0;

        // looping awal
        foreach ($this->column_search as $item) {
            // jika datatable mengirimkan value untuk pencarian
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function _get_datatables_query_user()
    {

        $this->db->from('achievement');
        $this->db->join('user', 'user_id = id_user');
        $this->db->where('achievement.user_id', $this->session->userdata('id_user'));

        $i = 0;

        // looping awal
        foreach ($this->column_search as $item) {
            // jika datatable mengirimkan value untuk pencarian
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order_user[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_manager()
    {
        $this->_get_datatables_query_manager();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_manager()
    {
        $this->_get_datatables_query_manager();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_datatables_user()
    {
        $this->_get_datatables_query_user();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_user()
    {
        $this->_get_datatables_query_user();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_manager()
    {
        $this->db->from('achievement');
        return $this->db->count_all_results();
    }

    public function count_all()
    {
        $this->db->from('achievement');
        $this->db->where('achievement.divisi_id', $this->session->userdata('divisi'));
        return $this->db->count_all_results();
    }

    public function count_all_user()
    {
        $this->db->from('achievement');
        $this->db->where('achievement.user_id', $this->session->userdata('id_user'));
        return $this->db->count_all_results();
    }

    public function tambah_data()
    {
        $user = $this->user['id_user'];
        $divisi = $this->user['divisi'];
        $tanggal = htmlspecialchars($this->input->post('tanggal', true));
        $idtanggal = $user.$tanggal;
        $data = [
            'user_id' => $user,
            'divisi_id' => $divisi,
            'tanggal' => htmlspecialchars($this->input->post('tanggal', true)),
            'idtanggal' => $idtanggal,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true))
        ];

        $this->db->insert('achievement', $data);
        $this->session->set_flashdata('msg', 'submit.');
    }

    public function ubahStatusachievement()
    {
        $id = $this->input->post('id');
        $keterangan = $this->input->post('keterangan');
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id', $id);
        $this->db->update('achievement');

        $this->session->set_flashdata('msg', 'diubah.');
        redirect('DaftarAchievement');
    }

    public function getNamaUser()
    {
        return $this->db->get_where('user', 'user.role_id != 1')->result_array();
    }

    public function getNamaDivisi()
    {
        return $this->db->get_where('divisi')->result_array();
    }

    public function getachievementByDate($mulai, $selesai, $user = false, $divisi = false)
    {
        if ($user == false and $divisi == false) {
            return $this->db->select('p.*, u.*')
                ->from('achievement p')
                ->join('user u', 'p.user_id = u.id_user')
                ->where('tanggal >=', $mulai)
                ->where('tanggal <=', $selesai)
                ->get()->result_array();
        } else if ($user == false) {
            return $this->db->select('p.*, u.*')
                ->from('achievement p')
                ->join('user u', 'p.user_id = u.id_user')
                ->where('tanggal >=', $mulai)
                ->where('tanggal <=', $selesai)
                ->where('divisi_id', $divisi)
                ->get()->result_array();
        } else if ($divisi == false) {
            return $this->db->select('p.*, u.*')
                ->from('achievement p')
                ->join('user u', 'p.user_id = u.id_user')
                ->where('tanggal >=', $mulai)
                ->where('tanggal <=', $selesai)
                ->where('user_id', $user)
                ->get()->result_array();
        }
    }
}
