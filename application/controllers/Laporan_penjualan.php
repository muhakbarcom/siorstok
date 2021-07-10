<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Laporan_penjualan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan_penjualan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan_penjualan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan_penjualan';
            $config['first_url'] = base_url() . 'laporan_penjualan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Laporan_penjualan_model->total_rows($q);
        $laporan_penjualan = $this->Laporan_penjualan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporan_penjualan_data' => $laporan_penjualan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Laporan Penjualan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Laporan Penjualan' => '',
        ];

        $data['page'] = 'laporan_penjualan/view_laporan_penjualan_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Laporan_penjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'tanggal_transaksi' => $row->tanggal_transaksi,
		'kode_nota' => $row->kode_nota,
		'nama_konsumen' => $row->nama_konsumen,
		'jumlah_item' => $row->jumlah_item,
		'total_bayar' => $row->total_bayar,
	    );
        $data['title'] = 'Laporan Penjualan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'laporan_penjualan/view_laporan_penjualan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('laporan_penjualan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan_penjualan/create_action'),
	    'tanggal_transaksi' => set_value('tanggal_transaksi'),
	    'kode_nota' => set_value('kode_nota'),
	    'nama_konsumen' => set_value('nama_konsumen'),
	    'jumlah_item' => set_value('jumlah_item'),
	    'total_bayar' => set_value('total_bayar'),
	);
        $data['title'] = 'Laporan Penjualan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'laporan_penjualan/view_laporan_penjualan_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal_transaksi' => $this->input->post('tanggal_transaksi',TRUE),
		'kode_nota' => $this->input->post('kode_nota',TRUE),
		'nama_konsumen' => $this->input->post('nama_konsumen',TRUE),
		'jumlah_item' => $this->input->post('jumlah_item',TRUE),
		'total_bayar' => $this->input->post('total_bayar',TRUE),
	    );

            $this->Laporan_penjualan_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('laporan_penjualan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Laporan_penjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laporan_penjualan/update_action'),
		'tanggal_transaksi' => set_value('tanggal_transaksi', $row->tanggal_transaksi),
		'kode_nota' => set_value('kode_nota', $row->kode_nota),
		'nama_konsumen' => set_value('nama_konsumen', $row->nama_konsumen),
		'jumlah_item' => set_value('jumlah_item', $row->jumlah_item),
		'total_bayar' => set_value('total_bayar', $row->total_bayar),
	    );
            $data['title'] = 'Laporan Penjualan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'laporan_penjualan/view_laporan_penjualan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('laporan_penjualan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'tanggal_transaksi' => $this->input->post('tanggal_transaksi',TRUE),
		'kode_nota' => $this->input->post('kode_nota',TRUE),
		'nama_konsumen' => $this->input->post('nama_konsumen',TRUE),
		'jumlah_item' => $this->input->post('jumlah_item',TRUE),
		'total_bayar' => $this->input->post('total_bayar',TRUE),
	    );

            $this->Laporan_penjualan_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('laporan_penjualan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Laporan_penjualan_model->get_by_id($id);

        if ($row) {
            $this->Laporan_penjualan_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('laporan_penjualan'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('laporan_penjualan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Laporan_penjualan_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('success', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal_transaksi', 'tanggal transaksi', 'trim|required');
	$this->form_validation->set_rules('kode_nota', 'kode nota', 'trim|required');
	$this->form_validation->set_rules('nama_konsumen', 'nama konsumen', 'trim|required');
	$this->form_validation->set_rules('jumlah_item', 'jumlah item', 'trim|required');
	$this->form_validation->set_rules('total_bayar', 'total bayar', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Laporan_penjualan.php */
/* Location: ./application/controllers/Laporan_penjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-05 16:19:29 */
/* http://harviacode.com */