<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    public $table = 'transaksi';
    public $id = 'id_transaksi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_transaksi', $q);
        $this->db->or_like('jumlah_item', $q);
        $this->db->or_like('nama_konsumen', $q);
        $this->db->or_like('tanggal_transaksi', $q);
        $this->db->or_like('total_bayar', $q);
        $this->db->or_like('status_transaksi', $q);
        $this->db->or_like('status_pelayanan', $q);
        $this->db->or_like('id_user', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function total_pesanan_masuk()
    {
        $this->db->where('status_transaksi', 'SELESAI');
        $this->db->where('status_pelayanan', 'Belum Dimasak');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function total_trx_today()
    {
        $tgl = date('Y-m-d');
        $juml = $this->db->query("select count(id_transaksi) as jml from transaksi where status_transaksi='SELESAI' and substr(tanggal_transaksi, 1, 10)=$tgl")->result();
        return $juml;
        // $this->db->where('status_transaksi', 'SELESAI');
        // $this->db->where(substr(tanggal_transaksi, 1, 10), date('Y-m-d'));
        // $this->db->from($this->table);
        // return $this->db->count_all_results();
    }
    function total_pesanan_selesai()
    {
        $this->db->where('status_transaksi', 'SELESAI');
        $this->db->where('status_pelayanan', 'Selesai');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function total_pesanan_selesai_today($hari_ini)
    {
        $this->db->where('status_transaksi', 'SELESAI');
        $this->db->where('status_pelayanan', 'Selesai');
        $this->db->where('tanggal_transaksi', $hari_ini);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('id_transaksi', $q);
        // $this->db->or_like('jumlah_item', $q);
        // $this->db->or_like('nama_konsumen', $q);
        // $this->db->or_like('tanggal_transaksi', $q);
        // $this->db->or_like('total_bayar', $q);
        // $this->db->or_like('status_pelayanan', $q);
        // $this->db->or_like('id_user', $q);
        $this->db->where('status_transaksi', 'Belum Diterima');
        $this->db->or_where('status_transaksi', 'diterima');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_koki($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('id_transaksi', $q);
        // $this->db->or_like('jumlah_item', $q);
        // $this->db->or_like('nama_konsumen', $q);
        // $this->db->or_like('tanggal_transaksi', $q);
        // $this->db->or_like('total_bayar', $q);
        // $this->db->or_like('status_transaksi', $q);
        // // $this->db->or_like('status_pelayanan', $q);
        // $this->db->or_like('id_user', $q);
        $this->db->where('status_transaksi', 'SELESAI');
        $this->db->where('status_pelayanan', 'Belum Dimasak');
        $this->db->or_where('status_pelayanan', 'Pesanan diterima');
        $this->db->or_where('status_pelayanan', 'Proses Dimasak');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_koki_selesai($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('id_transaksi', $q);
        // $this->db->or_like('jumlah_item', $q);
        // $this->db->or_like('nama_konsumen', $q);
        // $this->db->or_like('tanggal_transaksi', $q);
        // $this->db->or_like('total_bayar', $q);
        // $this->db->or_like('status_transaksi', $q);
        // // $this->db->or_like('status_pelayanan', $q);
        // $this->db->or_like('id_user', $q);
        $this->db->where('status_pelayanan', 'Selesai');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // delete bulkdata
    function deletebulk()
    {
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-26 16:55:20 */
/* http://harviacode.com */