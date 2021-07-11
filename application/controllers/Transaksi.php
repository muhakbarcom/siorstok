<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
        $this->load->model('Detail_transaksi_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi';
            $config['first_url'] = base_url() . 'transaksi';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_model->total_rows($q);
        $transaksi = $this->Transaksi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_data' => $transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Transaksi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Transaksi' => '',
        ];

        $data['page'] = 'transaksi/transaksi_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_transaksi' => $row->id_transaksi,
                'jumlah_item' => $row->jumlah_item,
                'nama_konsumen' => $row->nama_konsumen,
                'tanggal_transaksi' => $row->tanggal_transaksi,
                'total_bayar' => $row->total_bayar,
                'status_transaksi' => $row->status_transaksi,
                'status_pelayanan' => $row->status_pelayanan,
                'id_user' => $row->id_user,
            );
            $data['title'] = 'Transaksi';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'transaksi/transaksi_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/create_action'),
            'id_transaksi' => set_value('id_transaksi'),
            'jumlah_item' => set_value('jumlah_item'),
            'nama_konsumen' => set_value('nama_konsumen'),
            'tanggal_transaksi' => set_value('tanggal_transaksi'),
            'total_bayar' => set_value('total_bayar'),
            'status_transaksi' => set_value('status_transaksi'),
            'status_pelayanan' => set_value('status_pelayanan'),
            'id_user' => set_value('id_user'),
        );
        $data['title'] = 'Transaksi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'transaksi/transaksi_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'jumlah_item' => $this->input->post('jumlah_item', TRUE),
                'nama_konsumen' => $this->input->post('nama_konsumen', TRUE),
                'tanggal_transaksi' => $this->input->post('tanggal_transaksi', TRUE),
                'total_bayar' => $this->input->post('total_bayar', TRUE),
                'status_transaksi' => $this->input->post('status_transaksi', TRUE),
                'status_pelayanan' => $this->input->post('status_pelayanan', TRUE),
                'id_user' => $this->input->post('id_user', TRUE),
            );

            $this->Transaksi_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }

    public function update($id)
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
                'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
                'jumlah_item' => set_value('jumlah_item', $row->jumlah_item),
                'nama_konsumen' => set_value('nama_konsumen', $row->nama_konsumen),
                'tanggal_transaksi' => set_value('tanggal_transaksi', $row->tanggal_transaksi),
                'total_bayar' => set_value('total_bayar', $row->total_bayar),
                'status_transaksi' => set_value('status_transaksi', $row->status_transaksi),
                'status_pelayanan' => set_value('status_pelayanan', $row->status_pelayanan),
                'id_user' => set_value('id_user', $row->id_user),
            );
            $data['title'] = 'Transaksi';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'transaksi/transaksi_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
                'jumlah_item' => $this->input->post('jumlah_item', TRUE),
                'nama_konsumen' => $this->input->post('nama_konsumen', TRUE),
                'tanggal_transaksi' => $this->input->post('tanggal_transaksi', TRUE),
                'total_bayar' => $this->input->post('total_bayar', TRUE),
                'status_transaksi' => $this->input->post('status_transaksi', TRUE),
                'status_pelayanan' => $this->input->post('status_pelayanan', TRUE),
                'id_user' => $this->input->post('id_user', TRUE),
            );

            $this->Transaksi_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Transaksi_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('jumlah_item', 'jumlah item', 'trim|required');
        $this->form_validation->set_rules('nama_konsumen', 'nama konsumen', 'trim|required');
        $this->form_validation->set_rules('tanggal_transaksi', 'tanggal transaksi', 'trim|required');
        $this->form_validation->set_rules('total_bayar', 'total bayar', 'trim|required');
        $this->form_validation->set_rules('status_transaksi', 'status transaksi', 'trim|required');
        $this->form_validation->set_rules('status_pelayanan', 'status pelayanan', 'trim|required');
        $this->form_validation->set_rules('id_user', 'id user', 'trim|required');

        $this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function masuk()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi/masuk?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi/masuk?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi/masuk';
            $config['first_url'] = base_url() . 'transaksi/masuk';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_model->total_rows($q);
        $transaksi = $this->Transaksi_model->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_data' => $transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Transaksi Masuk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Transaksi' => '',
        ];

        $data['page'] = 'transaksi/transaksi_masuk';
        $this->load->view('template/backend', $data);
    }

    public function terima_kasir($id_trx)
    {
        $data = array(
            'status_transaksi' => 'diterima'
        );

        $this->Transaksi_model->update(($id_trx), $data);
        redirect('transaksi/masuk');
    }

    public function tampil_trx($id)
    {
        // $row =  $this->Detail_transaksi_model->get_by_trx($id);
        $data['konfirmasi'] = $this->db->query("select menu_food_and_beverage.nama_menu, detail_transaksi.jumlah_item, menu_food_and_beverage.harga_menu, detail_transaksi.total_bayar, detail_transaksi.catatan from detail_transaksi join menu_food_and_beverage on detail_transaksi.id_menu=menu_food_and_beverage.id_menu where detail_transaksi.id_transaksi=$id")->result();
        $atas_nama = $this->db->query("select nama_konsumen from transaksi where id_transaksi=$id")->row();
        $data['atas_nama'] = $atas_nama->nama_konsumen;
        $total_bayar = $this->db->query("select total_bayar from transaksi where id_transaksi=$id")->row();
        $data['total_bayar'] = $total_bayar->total_bayar;
        // var_dump($data['total_bayar']);
        // exit;
        $data['id_trx'] = $id;
        $data['title'] = 'Konfirmasi Transaksi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'transaksi/transaksi_konfirmasi';
        $this->load->view('template/backend', $data);
    }

    public function konfirmasi_trx($id)
    {
        $data['id_trx'] = $id;
        // $row =  $this->Detail_transaksi_model->get_by_trx($id);
        $data['konfirmasi'] = $this->db->query("select menu_food_and_beverage.nama_menu, detail_transaksi.jumlah_item, menu_food_and_beverage.harga_menu, detail_transaksi.total_bayar, detail_transaksi.catatan from detail_transaksi join menu_food_and_beverage on detail_transaksi.id_menu=menu_food_and_beverage.id_menu where detail_transaksi.id_transaksi=$id")->result();
        $atas_nama = $this->db->query("select nama_konsumen from transaksi where id_transaksi=$id")->row();
        $data['atas_nama'] = $atas_nama->nama_konsumen;
        $total_bayar = $this->db->query("select total_bayar from transaksi where id_transaksi=$id")->row();
        $data['total_bayar'] = $total_bayar->total_bayar;
        // var_dump($data['total_bayar']);
        // exit;

        $data['title'] = 'Transaksi Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'transaksi/transaksi_konfirmasi2';
        $this->load->view('template/backend', $data);
    }

    public function selesai_trx()
    {
        $id_trx = $this->input->post('id_trx');
        $data = array(

            'status_transaksi' => 'SELESAI',
            'status_pelayanan' => 'Belum Dimasak',
            'bayar' => $this->input->post('bayar', TRUE),
            'kembalian' => $this->input->post('kembalian', TRUE),
        );

        $this->Transaksi_model->update($id_trx, $data);

        redirect('transaksi_selesai');
    }

    public function cetak_trx($id)
    {
        $data['id_trx'] = $id;
        // $row =  $this->Detail_transaksi_model->get_by_trx($id);
        $data['cetak'] = $this->db->query("select menu_food_and_beverage.nama_menu, detail_transaksi.jumlah_item, menu_food_and_beverage.harga_menu, detail_transaksi.total_bayar from detail_transaksi join menu_food_and_beverage on detail_transaksi.id_menu=menu_food_and_beverage.id_menu where detail_transaksi.id_transaksi=$id")->result();
        $atas_nama = $this->db->query("select nama_konsumen from transaksi where id_transaksi=$id")->row();
        $data['atas_nama'] = $atas_nama->nama_konsumen;
        $tanggal_trx = $this->db->query("select tanggal_transaksi from transaksi where id_transaksi=$id")->row();
        $data['tanggal_trx'] = $tanggal_trx->tanggal_transaksi;
        $total_bayar = $this->db->query("select total_bayar from transaksi where id_transaksi=$id")->row();
        $data['total_bayar'] = $total_bayar->total_bayar;
        $kembalian = $this->db->query("select kembalian from transaksi where id_transaksi=$id")->row();
        $data['kembalian'] = $kembalian->kembalian;
        $bayar = $this->db->query("select bayar from transaksi where id_transaksi=$id")->row();
        $data['bayar'] = $bayar->bayar;
        // var_dump($data['total_bayar']);
        // exit;

        $data['title'] = 'Transaksi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'transaksi/cetak_trx';
        $this->load->view('template/backend', $data);
    }

    public function koki_masuk()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi/koki_masuk?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi/koki_masuk?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi/koki_masuk';
            $config['first_url'] = base_url() . 'transaksi/koki_masuk';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_model->total_rows($q);
        $transaksi = $this->Transaksi_model->get_limit_data_koki($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_data' => $transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Pesanan Masuk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Transaksi' => '',
        ];

        $data['page'] = 'transaksi/koki_masuk';
        $this->load->view('template/backend', $data);
    }

    public function terima_koki($id_trx)
    {
        $data = array(
            'status_pelayanan' => 'Pesanan diterima'
        );

        $this->Transaksi_model->update(($id_trx), $data);
        redirect('transaksi/koki_masuk');
    }

    public function tampil_koki($id)
    {
        // $row =  $this->Detail_transaksi_model->get_by_trx($id);
        $data['konfirmasi'] = $this->db->query("select menu_food_and_beverage.nama_menu, detail_transaksi.jumlah_item, detail_transaksi.catatan from detail_transaksi join menu_food_and_beverage on detail_transaksi.id_menu=menu_food_and_beverage.id_menu where detail_transaksi.id_transaksi=$id")->result();
        $atas_nama = $this->db->query("select nama_konsumen from transaksi where id_transaksi=$id")->row();
        $data['atas_nama'] = $atas_nama->nama_konsumen;
        $data['id_trx'] = $id;
        $data['title'] = 'Detail Pesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'transaksi/transaksi_konfirmasi_koki';
        $this->load->view('template/backend', $data);
    }

    public function konfirmasi_trx_koki($id)
    {
        $data = array(
            'status_pelayanan' => 'Proses Dimasak'
        );
        // var_dump($data);
        // exit;
        $this->Transaksi_model->update(($id), $data);
        redirect('transaksi/koki_masuk');
    }
    public function konfirmasi_trx_koki_selesai($id)
    {
        $data = array(
            'status_pelayanan' => 'Selesai'
        );
        // var_dump($data);
        // exit;
        $this->Transaksi_model->update(($id), $data);
        redirect('transaksi/koki_selesai');
    }

    public function koki_selesai()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi/koki_selesai?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi/koki_selesai?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi/koki_selesai';
            $config['first_url'] = base_url() . 'transaksi/koki_selesai';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_model->total_rows($q);
        $transaksi = $this->Transaksi_model->get_limit_data_koki_selesai($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_data' => $transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Pesanan Selesai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Transaksi' => '',
        ];

        $data['page'] = 'transaksi/koki_selesai';
        $this->load->view('template/backend', $data);
    }
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-26 16:55:20 */
/* http://harviacode.com */