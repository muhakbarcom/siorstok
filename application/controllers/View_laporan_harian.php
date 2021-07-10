<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_laporan_harian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('View_laporan_harian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'view_laporan_harian?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'view_laporan_harian?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'view_laporan_harian';
            $config['first_url'] = base_url() . 'view_laporan_harian';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        // $config['total_rows'] = $this->View_laporan_harian_model->total_rows($q);
        // $view_laporan_harian = $this->View_laporan_harian_model->get_limit_data($config['per_page'], $start, $q);

        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        if ($dari) {
            $config['total_rows'] = $this->View_laporan_harian_model->laporan_harian_total($q, $dari, $sampai);
            $view_laporan_harian = $this->View_laporan_harian_model->laporan_harian($config['per_page'], $start, $q, $dari, $sampai);
        } else {
            $config['total_rows'] = $this->View_laporan_harian_model->total_rows($q);
            $view_laporan_harian = $this->View_laporan_harian_model->get_limit_data($config['per_page'], $start, $q);
        }

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'view_laporan_harian_data' => $view_laporan_harian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Laporan';
        $data['subtitle'] = 'Laporan Penjualan Harian';
        $data['crumb'] = [
            'View Laporan Harian' => '',
        ];

        $data['page'] = 'view_laporan_harian/view_laporan_harian_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->View_laporan_harian_model->get_by_id($id);
        if ($row) {
            $data = array(
                'tanggal_transaksi' => $row->tanggal_transaksi,
                'jumlah_item_terjual' => $row->jumlah_item_terjual,
                'total_pendapatan' => $row->total_pendapatan,
            );
            $data['title'] = 'View Laporan Harian';
            $data['subtitle'] = 'Laporan Penjualan Harian';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'view_laporan_harian/view_laporan_harian_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('view_laporan_harian'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('view_laporan_harian/create_action'),
            'tanggal_transaksi' => set_value('tanggal_transaksi'),
            'jumlah_item_terjual' => set_value('jumlah_item_terjual'),
            'total_pendapatan' => set_value('total_pendapatan'),
        );
        $data['title'] = 'View Laporan Harian';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'view_laporan_harian/view_laporan_harian_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tanggal_transaksi' => $this->input->post('tanggal_transaksi', TRUE),
                'jumlah_item_terjual' => $this->input->post('jumlah_item_terjual', TRUE),
                'total_pendapatan' => $this->input->post('total_pendapatan', TRUE),
            );

            $this->View_laporan_harian_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('view_laporan_harian'));
        }
    }

    public function update($id)
    {
        $row = $this->View_laporan_harian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('view_laporan_harian/update_action'),
                'tanggal_transaksi' => set_value('tanggal_transaksi', $row->tanggal_transaksi),
                'jumlah_item_terjual' => set_value('jumlah_item_terjual', $row->jumlah_item_terjual),
                'total_pendapatan' => set_value('total_pendapatan', $row->total_pendapatan),
            );
            $data['title'] = 'View Laporan Harian';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'view_laporan_harian/view_laporan_harian_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('view_laporan_harian'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
                'tanggal_transaksi' => $this->input->post('tanggal_transaksi', TRUE),
                'jumlah_item_terjual' => $this->input->post('jumlah_item_terjual', TRUE),
                'total_pendapatan' => $this->input->post('total_pendapatan', TRUE),
            );

            $this->View_laporan_harian_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('view_laporan_harian'));
        }
    }

    public function delete($id)
    {
        $row = $this->View_laporan_harian_model->get_by_id($id);

        if ($row) {
            $this->View_laporan_harian_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('view_laporan_harian'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('view_laporan_harian'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->View_laporan_harian_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tanggal_transaksi', 'tanggal transaksi', 'trim|required');
        $this->form_validation->set_rules('jumlah_item_terjual', 'jumlah item terjual', 'trim|required|numeric');
        $this->form_validation->set_rules('total_pendapatan', 'total pendapatan', 'trim|required|numeric');

        $this->form_validation->set_rules('', '', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "view_laporan_harian.xls";
        $judul = "view_laporan_harian";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Transaksi");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Item Terjual");
        xlsWriteLabel($tablehead, $kolomhead++, "Total Pendapatan");

        foreach ($this->View_laporan_harian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_transaksi);
            xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_item_terjual);
            xlsWriteNumber($tablebody, $kolombody++, $data->total_pendapatan);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=view_laporan_harian.doc");

        $data = array(
            'view_laporan_harian_data' => $this->View_laporan_harian_model->get_all(),
            'start' => 0
        );

        $this->load->view('view_laporan_harian/view_laporan_harian_doc', $data);
    }

    public function printdoc()
    {
        $data = array(
            'view_laporan_harian_data' => $this->View_laporan_harian_model->get_all(),
            'start' => 0
        );
        $this->load->view('view_laporan_harian/view_laporan_harian_print', $data);
    }
}

/* End of file View_laporan_harian.php */
/* Location: ./application/controllers/View_laporan_harian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-10 06:00:53 */
/* http://harviacode.com */