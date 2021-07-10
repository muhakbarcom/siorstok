<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_selesai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Transaksi_selesai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi_selesai?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi_selesai?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi_selesai';
            $config['first_url'] = base_url() . 'transaksi_selesai';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_selesai_model->total_rows($q);
        $transaksi_selesai = $this->Transaksi_selesai_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_selesai_data' => $transaksi_selesai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Transaksi Selesai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Transaksi Selesai' => '',
        ];

        $data['page'] = 'transaksi_selesai/view_transaksi_selesai_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Transaksi_selesai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_transaksi' => $row->id_transaksi,
		'nama_konsumen' => $row->nama_konsumen,
		'status_transaksi' => $row->status_transaksi,
		'tanggal_transaksi' => $row->tanggal_transaksi,
	    );
        $data['title'] = 'Transaksi Selesai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'transaksi_selesai/view_transaksi_selesai_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('transaksi_selesai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi_selesai/create_action'),
	    'id_transaksi' => set_value('id_transaksi'),
	    'nama_konsumen' => set_value('nama_konsumen'),
	    'status_transaksi' => set_value('status_transaksi'),
	    'tanggal_transaksi' => set_value('tanggal_transaksi'),
	);
        $data['title'] = 'Transaksi Selesai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'transaksi_selesai/view_transaksi_selesai_form';
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
		'nama_konsumen' => $this->input->post('nama_konsumen',TRUE),
		'status_transaksi' => $this->input->post('status_transaksi',TRUE),
		'tanggal_transaksi' => $this->input->post('tanggal_transaksi',TRUE),
	    );

            $this->Transaksi_selesai_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('transaksi_selesai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_selesai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi_selesai/update_action'),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'nama_konsumen' => set_value('nama_konsumen', $row->nama_konsumen),
		'status_transaksi' => set_value('status_transaksi', $row->status_transaksi),
		'tanggal_transaksi' => set_value('tanggal_transaksi', $row->tanggal_transaksi),
	    );
            $data['title'] = 'Transaksi Selesai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'transaksi_selesai/view_transaksi_selesai_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('transaksi_selesai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
		'nama_konsumen' => $this->input->post('nama_konsumen',TRUE),
		'status_transaksi' => $this->input->post('status_transaksi',TRUE),
		'tanggal_transaksi' => $this->input->post('tanggal_transaksi',TRUE),
	    );

            $this->Transaksi_selesai_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('transaksi_selesai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_selesai_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_selesai_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('transaksi_selesai'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('transaksi_selesai'));
        }
    }

    public function deletebulk(){
        $delete = $this->Transaksi_selesai_model->deletebulk();
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
	$this->form_validation->set_rules('nama_konsumen', 'nama konsumen', 'trim|required');
	$this->form_validation->set_rules('status_transaksi', 'status transaksi', 'trim|required');
	$this->form_validation->set_rules('tanggal_transaksi', 'tanggal transaksi', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transaksi_selesai.php */
/* Location: ./application/controllers/Transaksi_selesai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-03 19:11:23 */
/* http://harviacode.com */