<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_fb_model extends CI_Model
{

    public $table = 'menu_food_and_beverage';
    public $id = 'id_menu';
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
        $this->db->like('id_menu', $q);
        $this->db->or_like('nama_menu', $q);
        $this->db->or_like('harga_menu', $q);
        $this->db->or_like('gambar', $q);
        // $this->db->or_like('deskripsi', $q);
        $this->db->or_like('kategori_menu', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function total_menu_food()
    {
        $this->db->where('kategori_menu', 'Food');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function total_menu_beverage()
    {
        $this->db->where('kategori_menu', 'Beverage');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_menu', $q);
        $this->db->or_like('nama_menu', $q);
        $this->db->or_like('harga_menu', $q);
        $this->db->or_like('gambar', $q);
        // $this->db->or_like('deskripsi', $q);
        $this->db->or_like('kategori_menu', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_food($limit, $start = 0, $q = NULL)
    {
        $this->db->where('kategori_menu', 'Food');
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('id_menu', $q);
        // $this->db->or_like('nama_menu', $q);
        // $this->db->or_like('harga_menu', $q);
        // $this->db->or_like('gambar', $q);
        // $this->db->or_like('deskripsi', $q);
        // $this->db->or_like('kategori_menu', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_menu($limit, $start = 0, $q = NULL, $x = "food")
    {
        $qry = $this->db->query("select * from menu_food_and_beverage m
        right join stok_menu s
        on (m.id_menu = s.id_menu)
        where s.sisa>0 and
         m.kategori_menu='$x'
        order by m.id_menu $this->order
        limit $start,$limit
        ")->result();
        return $qry;
    }

    function total_rows_menu($q = NULL, $x)
    {
        $query = $this->db->query("select count(s.id_menu) as jumlah_baris from menu_food_and_beverage m
        right join stok_menu s
        on (m.id_menu = s.id_menu)
        where s.sisa>0 and
         m.kategori_menu='$x'
        order by m.id_menu $this->order
        ")->result();
        return $query;
        // return $this->db->count_all_results();
    }

    function get_limit_data_beverage($limit, $start = 0, $q = NULL)
    {
        $qry = $this->db->query("select * from menu_food_and_beverage m
        right join stok_menu s
        on (m.id_menu = s.id_menu)
        where s.sisa>0 and
         m.kategori_menu='Beverage'
        order by m.id_menu $this->order
        limit $start,$limit
        ")->result();
        return $qry;
    }

    function get_limit_data_food_kelola($limit, $start = 0, $q = NULL)
    {
        if ($q == NULL) {
            $qry = $this->db->query("select * from menu_food_and_beverage
            where kategori_menu='food'
            order by id_menu $this->order
            limit $start,$limit
            ")->result();
            return $qry;
        } else {
            // $this->db->like('id_menu', $q);
            $this->db->order_by($this->id, $this->order);
            $this->db->like('nama_menu', $q);
            $this->db->where('kategori_menu', 'Food');
            $this->db->limit($limit, $start);
            return $this->db->get($this->table)->result();
        }
    }

    function get_limit_data_beverage_kelola($limit, $start = 0, $q = NULL, $x = "Beverage")
    {
        if ($q == NULL) {
            $qry = $this->db->query("select * from menu_food_and_beverage
            where kategori_menu='$x'
            order by id_menu $this->order
            limit $start,$limit
            ")->result();
            return $qry;
        } else {
            // $this->db->like('id_menu', $q);
            $this->db->order_by($this->id, $this->order);
            $this->db->like('nama_menu', $q);
            $this->db->where('kategori_menu', 'Beverage');
            $this->db->limit($limit, $start);
            return $this->db->get($this->table)->result();
        }
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

/* End of file Menu_fb_model.php */
/* Location: ./application/models/Menu_fb_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-27 06:04:11 */
/* http://harviacode.com */