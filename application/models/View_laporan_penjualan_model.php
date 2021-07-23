<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_laporan_penjualan_model extends CI_Model
{

    public $table = 'view_laporan_penjualan';
    public $id = '';
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
        // $this->db->like('', $q);
        // $this->db->or_like('tanggal_transaksi', $q);
        // $this->db->or_like('kode_nota', $q);
        // $this->db->or_like('nama_konsumen', $q);
        // $this->db->or_like('qty', $q);
        // $this->db->or_like('total_bayar', $q);
        $this->db->like('kode_nota', $q);
        $this->db->or_like('nama_konsumen', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function laporan_penjualan_total($q = NULL, $dari, $sampai)
    {
        // $this->db->like('kode_nota', $q);
        $this->db->like('nama_konsumen', $q);
        $this->db->where('tanggal_transaksi >=', $dari);
        $this->db->where('tanggal_transaksi <=', $sampai);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    // get data with limit and search
    function get_total_keseluruhan($limit, $start = 0, $q = NULL)
    {
        $this->db->select('sum(total_bayar) as total_keseluruhan');
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        $tk = $this->db->get($this->table)->row();
        var_dump($tk);
        exit;
    }
    function get_total_keseluruhan_2($limit, $start = 0, $q = NULL, $dari, $sampai)
    {
        $this->db->select('sum(total_bayar) as total_keseluruhan');
        $this->db->where('tanggal_transaksi >=', $dari);
        $this->db->where('tanggal_transaksi <=', $sampai);
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        $tk = $this->db->get($this->table)->row();
        return $tk->total_keseluruhan;
    }
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        // $this->db->select("tanggal_transaksi,kode_nota,nama_konsumen,jumlah_items,qty,total_bayar,sum(total_bayar) as total_pendapatan");
        $this->db->like('kode_nota', $q);
        $this->db->or_like('nama_konsumen', $q);
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function get_limit_data_x($q = NULL)
    {
        // $this->db->select("tanggal_transaksi,kode_nota,nama_konsumen,jumlah_items,qty,total_bayar,sum(total_bayar) as total_pendapatan");
        $this->db->like('kode_nota', $q);
        $this->db->or_like('nama_konsumen', $q);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    function get_limit_data_tp($q = NULL)
    {
        $this->db->select('sum(total_bayar)as total_bayar');
        $this->db->like('kode_nota', $q);
        $this->db->or_like('nama_konsumen', $q);
        return $this->db->get($this->table)->row();
    }
    function laporan_penjualan_tp($q = NULL, $dari, $sampai)
    {
        $this->db->select("sum(total_bayar) as total_bayar");
        $this->db->like('nama_konsumen', $q);
        $this->db->where('tanggal_transaksi >=', $dari);
        $this->db->where('tanggal_transaksi <=', $sampai);
        return $this->db->get($this->table)->row();
    }
    function laporan_penjualan($limit, $start = 0, $q = NULL, $dari, $sampai)
    {

        // $this->db->select("tanggal_transaksi,kode_nota,nama_konsumen,jumlah_items,qty,total_bayar,sum(total_bayar) as total_pendapatan");
        $this->db->like('nama_konsumen', $q);
        $this->db->where('tanggal_transaksi >=', $dari);
        $this->db->where('tanggal_transaksi <=', $sampai);
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function laporan_penjualan_x($q = NULL, $dari, $sampai)
    {

        // $this->db->select("tanggal_transaksi,kode_nota,nama_konsumen,jumlah_items,qty,total_bayar,sum(total_bayar) as total_pendapatan");
        $this->db->like('nama_konsumen', $q);
        $this->db->where('tanggal_transaksi >=', $dari);
        $this->db->where('tanggal_transaksi <=', $sampai);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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

/* End of file View_laporan_penjualan_model.php */
/* Location: ./application/models/View_laporan_penjualan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-05 16:27:59 */
/* http://harviacode.com */