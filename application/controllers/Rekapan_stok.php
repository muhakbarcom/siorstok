<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekapan_stok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Rekapan_stok_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'rekapan_stok?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'rekapan_stok?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'rekapan_stok';
            $config['first_url'] = base_url() . 'rekapan_stok';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        // $config['total_rows'] = $this->Rekapan_stok_model->total_rows($q);
        // $rekapan_stok = $this->Rekapan_stok_model->get_limit_data($config['per_page'], $start, $q);


        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        if ($dari) {
            $config['total_rows'] = $this->Rekapan_stok_model->laporan_stok_total($q, $dari, $sampai);
            $view_laporan_penjualan = $this->Rekapan_stok_model->laporan_stok($config['per_page'], $start, $q, $dari, $sampai);
        } else {
            $config['total_rows'] = $this->Rekapan_stok_model->total_rows($q);
            $view_laporan_penjualan = $this->Rekapan_stok_model->get_limit_data($config['per_page'], $start, $q);
        }

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'rekapan_stok_data' => $view_laporan_penjualan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Laporan';
        $data['subtitle'] = 'Laporan Stok Menu';
        $data['crumb'] = [
            'Rekapan Stok' => '',
        ];

        $data['page'] = 'rekapan_stok/rekapan_stok_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Rekapan_stok_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_rekapan_stok' => $row->id_rekapan_stok,
                'id_menu' => $row->id_menu,
                'tanggal_penjualan' => $row->tanggal_penjualan,
                'stok_terjual' => $row->stok_terjual,
                'stok_sisa' => $row->stok_sisa,
            );
            $data['title'] = 'Rekapan Stok';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'rekapan_stok/rekapan_stok_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('rekapan_stok'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rekapan_stok/create_action'),
            'id_rekapan_stok' => set_value('id_rekapan_stok'),
            'id_menu' => set_value('id_menu'),
            'tanggal_penjualan' => set_value('tanggal_penjualan'),
            'stok_terjual' => set_value('stok_terjual'),
            'stok_sisa' => set_value('stok_sisa'),
        );
        $data['title'] = 'Rekapan Stok';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'rekapan_stok/rekapan_stok_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_menu' => $this->input->post('id_menu', TRUE),
                'tanggal_penjualan' => $this->input->post('tanggal_penjualan', TRUE),
                'stok_terjual' => $this->input->post('stok_terjual', TRUE),
                'stok_sisa' => $this->input->post('stok_sisa', TRUE),
            );

            $this->Rekapan_stok_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('rekapan_stok'));
        }
    }

    public function update($id)
    {
        $row = $this->Rekapan_stok_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rekapan_stok/update_action'),
                'id_rekapan_stok' => set_value('id_rekapan_stok', $row->id_rekapan_stok),
                'id_menu' => set_value('id_menu', $row->id_menu),
                'tanggal_penjualan' => set_value('tanggal_penjualan', $row->tanggal_penjualan),
                'stok_terjual' => set_value('stok_terjual', $row->stok_terjual),
                'stok_sisa' => set_value('stok_sisa', $row->stok_sisa),
            );
            $data['title'] = 'Rekapan Stok';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'rekapan_stok/rekapan_stok_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('rekapan_stok'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rekapan_stok', TRUE));
        } else {
            $data = array(
                'id_menu' => $this->input->post('id_menu', TRUE),
                'tanggal_penjualan' => $this->input->post('tanggal_penjualan', TRUE),
                'stok_terjual' => $this->input->post('stok_terjual', TRUE),
                'stok_sisa' => $this->input->post('stok_sisa', TRUE),
            );

            $this->Rekapan_stok_model->update($this->input->post('id_rekapan_stok', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('rekapan_stok'));
        }
    }

    public function delete($id)
    {
        $row = $this->Rekapan_stok_model->get_by_id($id);

        if ($row) {
            $this->Rekapan_stok_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('rekapan_stok'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('rekapan_stok'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Rekapan_stok_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_menu', 'id menu', 'trim|required');
        $this->form_validation->set_rules('tanggal_penjualan', 'tanggal penjualan', 'trim|required');
        $this->form_validation->set_rules('stok_terjual', 'stok terjual', 'trim|required');
        $this->form_validation->set_rules('stok_sisa', 'stok sisa', 'trim|required');

        $this->form_validation->set_rules('id_rekapan_stok', 'id_rekapan_stok', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rekapan_stok.xls";
        $judul = "rekapan_stok";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Menu");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Penjualan");
        xlsWriteLabel($tablehead, $kolomhead++, "Stok Terjual");
        xlsWriteLabel($tablehead, $kolomhead++, "Stok Sisa");

        foreach ($this->Rekapan_stok_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_menu);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_penjualan);
            xlsWriteNumber($tablebody, $kolombody++, $data->stok_terjual);
            xlsWriteNumber($tablebody, $kolombody++, $data->stok_sisa);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rekapan_stok.doc");

        $data = array(
            'rekapan_stok_data' => $this->Rekapan_stok_model->get_all(),
            'start' => 0
        );

        $this->load->view('rekapan_stok/rekapan_stok_doc', $data);
    }

    public function printdoc()
    {
        $data = array(
            'rekapan_stok_data' => $this->Rekapan_stok_model->get_all(),
            'start' => 0
        );
        $this->load->view('rekapan_stok/rekapan_stok_print', $data);
    }
}

/* End of file Rekapan_stok.php */
/* Location: ./application/controllers/Rekapan_stok.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-10 20:31:10 */
/* http://harviacode.com */