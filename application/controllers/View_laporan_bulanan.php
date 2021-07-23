<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_laporan_bulanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('View_laporan_bulanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'view_laporan_bulanan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'view_laporan_bulanan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'view_laporan_bulanan';
            $config['first_url'] = base_url() . 'view_laporan_bulanan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        // $config['total_rows'] = $this->View_laporan_bulanan_model->total_rows($q);
        // $view_laporan_bulanan = $this->View_laporan_bulanan_model->get_limit_data($config['per_page'], $start, $q);

        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $g_dari = $this->input->get('dari');
        $g_sampai = $this->input->get('sampai');

        if ($dari or $g_dari) {

            if ($dari) {
                $dari = $dari;
                $sampai = $sampai;
                $q = null;
            } else {
                $dari = $g_dari;
                $sampai = $g_sampai;
            }
            $config['total_rows'] = $this->View_laporan_bulanan_model->laporan_bulanan_total($q, $dari, $sampai);
            $view_laporan_bulanan = $this->View_laporan_bulanan_model->laporan_bulanan($config['per_page'], $start, $q, $dari, $sampai);
        } else {
            $config['total_rows'] = $this->View_laporan_bulanan_model->total_rows($q);
            $view_laporan_bulanan = $this->View_laporan_bulanan_model->get_limit_data($config['per_page'], $start, $q);
        }

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'dari' => $dari,
            'sampai' => $sampai,
            'view_laporan_bulanan_data' => $view_laporan_bulanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Laporan';
        $data['subtitle'] = 'Laporan Penjualan Bulanan';
        $data['crumb'] = [
            'View Laporan Bulanan' => '',
        ];

        $data['page'] = 'view_laporan_bulanan/view_laporan_bulanan_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->View_laporan_bulanan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'tanggal_transaksi' => $row->tanggal_transaksi,
                'qty_terjual' => $row->qty_terjual,
                'total_pendapatan' => $row->total_pendapatan,
            );
            $data['title'] = 'View Laporan Bulanan';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'view_laporan_bulanan/view_laporan_bulanan_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('view_laporan_bulanan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('view_laporan_bulanan/create_action'),
            'tanggal_transaksi' => set_value('tanggal_transaksi'),
            'qty_terjual' => set_value('qty_terjual'),
            'total_pendapatan' => set_value('total_pendapatan'),
        );
        $data['title'] = 'View Laporan Bulanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'view_laporan_bulanan/view_laporan_bulanan_form';
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
                'qty_terjual' => $this->input->post('qty_terjual', TRUE),
                'total_pendapatan' => $this->input->post('total_pendapatan', TRUE),
            );

            $this->View_laporan_bulanan_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('view_laporan_bulanan'));
        }
    }

    public function update($id)
    {
        $row = $this->View_laporan_bulanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('view_laporan_bulanan/update_action'),
                'tanggal_transaksi' => set_value('tanggal_transaksi', $row->tanggal_transaksi),
                'qty_terjual' => set_value('qty_terjual', $row->qty_terjual),
                'total_pendapatan' => set_value('total_pendapatan', $row->total_pendapatan),
            );
            $data['title'] = 'View Laporan Bulanan';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'view_laporan_bulanan/view_laporan_bulanan_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('view_laporan_bulanan'));
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
                'qty_terjual' => $this->input->post('qty_terjual', TRUE),
                'total_pendapatan' => $this->input->post('total_pendapatan', TRUE),
            );

            $this->View_laporan_bulanan_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('view_laporan_bulanan'));
        }
    }

    public function delete($id)
    {
        $row = $this->View_laporan_bulanan_model->get_by_id($id);

        if ($row) {
            $this->View_laporan_bulanan_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('view_laporan_bulanan'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('view_laporan_bulanan'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->View_laporan_bulanan_model->deletebulk();
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
        $this->form_validation->set_rules('qty_terjual', 'jumlah item terjual', 'trim|required|numeric');
        $this->form_validation->set_rules('total_pendapatan', 'total pendapatan', 'trim|required|numeric');

        $this->form_validation->set_rules('', '', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "view_laporan_bulanan.xls";
        $judul = "view_laporan_bulanan";
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

        foreach ($this->View_laporan_bulanan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_transaksi);
            xlsWriteNumber($tablebody, $kolombody++, $data->qty_terjual);
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
        header("Content-Disposition: attachment;Filename=view_laporan_bulanan.doc");

        $data = array(
            'view_laporan_bulanan_data' => $this->View_laporan_bulanan_model->get_all(),
            'start' => 0
        );

        $this->load->view('view_laporan_bulanan/view_laporan_bulanan_doc', $data);
    }

    public function printdoc()
    {
        $data = array(
            'view_laporan_bulanan_data' => $this->View_laporan_bulanan_model->get_all(),
            'start' => 0
        );
        $this->load->view('view_laporan_bulanan/view_laporan_bulanan_print', $data);
    }

    public function printdoc_filter()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $g_dari = $this->input->get('dari');
        $g_sampai = $this->input->get('sampai');

        if ($dari or $g_dari) {

            if ($dari) {
                $dari = $dari;
                $sampai = $sampai;
                $q = null;
            } else {
                $dari = $g_dari;
                $sampai = $g_sampai;
            }

            $view_laporan_bulanan = $this->View_laporan_bulanan_model->laporan_bulanan_x($q, $dari, $sampai);
        } else {
            $view_laporan_bulanan = $this->View_laporan_bulanan_model->get_limit_data_x($q);
        }


        $data = array(
            'view_laporan_bulanan_data' => $view_laporan_bulanan,
            'start' => 0
        );
        $this->load->view('view_laporan_bulanan/view_laporan_bulanan_print', $data);
    }
}

/* End of file View_laporan_bulanan.php */
/* Location: ./application/controllers/View_laporan_bulanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-10 06:36:49 */
/* http://harviacode.com */