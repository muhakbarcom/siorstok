<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Detail_transaksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detail_transaksi?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detail_transaksi?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detail_transaksi';
            $config['first_url'] = base_url() . 'detail_transaksi';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detail_transaksi_model->total_rows($q);
        $detail_transaksi = $this->Detail_transaksi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detail_transaksi_data' => $detail_transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Detail Transaksi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Detail Transaksi' => '',
        ];

        $data['page'] = 'detail_transaksi/detail_transaksi_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Detail_transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_detail_transaksi' => $row->id_detail_transaksi,
		'id_transaksi' => $row->id_transaksi,
		'id_menu' => $row->id_menu,
		'jumlah_item' => $row->jumlah_item,
		'total_bayar' => $row->total_bayar,
		'tanggal_transaksi' => $row->tanggal_transaksi,
		'catatan' => $row->catatan,
	    );
        $data['title'] = 'Detail Transaksi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'detail_transaksi/detail_transaksi_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('detail_transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_transaksi/create_action'),
	    'id_detail_transaksi' => set_value('id_detail_transaksi'),
	    'id_transaksi' => set_value('id_transaksi'),
	    'id_menu' => set_value('id_menu'),
	    'jumlah_item' => set_value('jumlah_item'),
	    'total_bayar' => set_value('total_bayar'),
	    'tanggal_transaksi' => set_value('tanggal_transaksi'),
	    'catatan' => set_value('catatan'),
	);
        $data['title'] = 'Detail Transaksi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'detail_transaksi/detail_transaksi_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
		'id_menu' => $this->input->post('id_menu',TRUE),
		'jumlah_item' => $this->input->post('jumlah_item',TRUE),
		'total_bayar' => $this->input->post('total_bayar',TRUE),
		'tanggal_transaksi' => $this->input->post('tanggal_transaksi',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->Detail_transaksi_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('detail_transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_transaksi/update_action'),
		'id_detail_transaksi' => set_value('id_detail_transaksi', $row->id_detail_transaksi),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'id_menu' => set_value('id_menu', $row->id_menu),
		'jumlah_item' => set_value('jumlah_item', $row->jumlah_item),
		'total_bayar' => set_value('total_bayar', $row->total_bayar),
		'tanggal_transaksi' => set_value('tanggal_transaksi', $row->tanggal_transaksi),
		'catatan' => set_value('catatan', $row->catatan),
	    );
            $data['title'] = 'Detail Transaksi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'detail_transaksi/detail_transaksi_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('detail_transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_detail_transaksi', TRUE));
        } else {
            $data = array(
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
		'id_menu' => $this->input->post('id_menu',TRUE),
		'jumlah_item' => $this->input->post('jumlah_item',TRUE),
		'total_bayar' => $this->input->post('total_bayar',TRUE),
		'tanggal_transaksi' => $this->input->post('tanggal_transaksi',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->Detail_transaksi_model->update($this->input->post('id_detail_transaksi', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('detail_transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_transaksi_model->get_by_id($id);

        if ($row) {
            $this->Detail_transaksi_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('detail_transaksi'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('detail_transaksi'));
        }
    }

    public function deletebulk(){
        $delete = $this->Detail_transaksi_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('success', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_transaksi', 'id transaksi', 'trim|required');
	$this->form_validation->set_rules('id_menu', 'id menu', 'trim|required');
	$this->form_validation->set_rules('jumlah_item', 'jumlah item', 'trim|required');
	$this->form_validation->set_rules('total_bayar', 'total bayar', 'trim|required');
	$this->form_validation->set_rules('tanggal_transaksi', 'tanggal transaksi', 'trim|required');
	$this->form_validation->set_rules('catatan', 'catatan', 'trim|required');

	$this->form_validation->set_rules('id_detail_transaksi', 'id_detail_transaksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detail_transaksi.php */
/* Location: ./application/controllers/Detail_transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-26 16:55:50 */
/* http://harviacode.com */