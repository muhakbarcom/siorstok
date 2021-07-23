<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_laporan_penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('View_laporan_penjualan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'view_laporan_penjualan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'view_laporan_penjualan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'view_laporan_penjualan';
            $config['first_url'] = base_url() . 'view_laporan_penjualan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        // $config['total_rows'] = $this->View_laporan_penjualan_model->total_rows($q);
        // $view_laporan_penjualan = $this->View_laporan_penjualan_model->get_limit_data($config['per_page'], $start, $q);

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

            $config['total_rows'] = $this->View_laporan_penjualan_model->laporan_penjualan_total($q, $dari, $sampai);

            $view_laporan_penjualan = $this->View_laporan_penjualan_model->laporan_penjualan($config['per_page'], $start, $q, $dari, $sampai);
            $view_laporan_penjualan_x = $this->View_laporan_penjualan_model->laporan_penjualan_x($q, $dari, $sampai);
            // $total_pendapatan = $this->View_laporan_penjualan_model->laporan_penjualan_tp($q, $dari, $sampai);
            // $total_pendapatan = $total_pendapatan->total_bayar;
        } else {

            $config['total_rows'] = $this->View_laporan_penjualan_model->total_rows($q);
            $view_laporan_penjualan = $this->View_laporan_penjualan_model->get_limit_data($config['per_page'], $start, $q);
            $view_laporan_penjualan_x = $this->View_laporan_penjualan_model->get_limit_data_x($q);
            // $total_pendapatan = $this->View_laporan_penjualan_model->get_limit_data_tp($q);
            // $total_pendapatan = $total_pendapatan->total_bayar;
        }

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'dari' => $dari,
            'sampai' => $sampai,
            // 'total_pendapatan' => $total_pendapatan,
            'view_laporan_penjualan_data' => $view_laporan_penjualan,
            'view_laporan_penjualan_data_x' => $view_laporan_penjualan_x,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            // 'total_keseluruhan' => $total_keseluruhan,
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Laporan';
        $data['subtitle'] = 'History Penjualan';
        $data['crumb'] = [
            'View Laporan Penjualan' => '',
        ];

        $data['page'] = 'view_laporan_penjualan/view_laporan_penjualan_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->View_laporan_penjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'tanggal_transaksi' => $row->tanggal_transaksi,
                'kode_nota' => $row->kode_nota,
                'nama_konsumen' => $row->nama_konsumen,
                'qty' => $row->qty,
                'total_bayar' => $row->total_bayar,
            );
            $data['title'] = 'View Laporan Penjualan';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'view_laporan_penjualan/view_laporan_penjualan_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('view_laporan_penjualan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('view_laporan_penjualan/create_action'),
            'tanggal_transaksi' => set_value('tanggal_transaksi'),
            'kode_nota' => set_value('kode_nota'),
            'nama_konsumen' => set_value('nama_konsumen'),
            'qty' => set_value('qty'),
            'total_bayar' => set_value('total_bayar'),
        );
        $data['title'] = 'View Laporan Penjualan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'view_laporan_penjualan/view_laporan_penjualan_form';
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
                'kode_nota' => $this->input->post('kode_nota', TRUE),
                'nama_konsumen' => $this->input->post('nama_konsumen', TRUE),
                'qty' => $this->input->post('qty', TRUE),
                'total_bayar' => $this->input->post('total_bayar', TRUE),
            );

            $this->View_laporan_penjualan_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('view_laporan_penjualan'));
        }
    }

    public function update($id)
    {
        $row = $this->View_laporan_penjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('view_laporan_penjualan/update_action'),
                'tanggal_transaksi' => set_value('tanggal_transaksi', $row->tanggal_transaksi),
                'kode_nota' => set_value('kode_nota', $row->kode_nota),
                'nama_konsumen' => set_value('nama_konsumen', $row->nama_konsumen),
                'qty' => set_value('qty', $row->qty),
                'total_bayar' => set_value('total_bayar', $row->total_bayar),
            );
            $data['title'] = 'View Laporan Penjualan';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'view_laporan_penjualan/view_laporan_penjualan_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('view_laporan_penjualan'));
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
                'kode_nota' => $this->input->post('kode_nota', TRUE),
                'nama_konsumen' => $this->input->post('nama_konsumen', TRUE),
                'qty' => $this->input->post('qty', TRUE),
                'total_bayar' => $this->input->post('total_bayar', TRUE),
            );

            $this->View_laporan_penjualan_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('view_laporan_penjualan'));
        }
    }

    public function delete($id)
    {
        $row = $this->View_laporan_penjualan_model->get_by_id($id);

        if ($row) {
            $this->View_laporan_penjualan_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('view_laporan_penjualan'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('view_laporan_penjualan'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->View_laporan_penjualan_model->deletebulk();
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
        $this->form_validation->set_rules('kode_nota', 'kode nota', 'trim|required');
        $this->form_validation->set_rules('nama_konsumen', 'nama konsumen', 'trim|required');
        $this->form_validation->set_rules('qty', 'jumlah item', 'trim|required');
        $this->form_validation->set_rules('total_bayar', 'total bayar', 'trim|required');

        $this->form_validation->set_rules('', '', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "view_laporan_penjualan.xls";
        $judul = "view_laporan_penjualan";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Kode Nota");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Konsumen");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Item");
        xlsWriteLabel($tablehead, $kolomhead++, "Total Bayar");

        foreach ($this->View_laporan_penjualan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_transaksi);
            xlsWriteLabel($tablebody, $kolombody++, $data->kode_nota);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_konsumen);
            xlsWriteNumber($tablebody, $kolombody++, $data->qty);
            xlsWriteNumber($tablebody, $kolombody++, $data->total_bayar);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=view_laporan_penjualan.doc");

        $data = array(
            'view_laporan_penjualan_data' => $this->View_laporan_penjualan_model->get_all(),
            'start' => 0
        );

        $this->load->view('view_laporan_penjualan/view_laporan_penjualan_doc', $data);
    }

    public function printdoc()
    {
        $data = array(
            'view_laporan_penjualan_data' => $this->View_laporan_penjualan_model->get_all(),
            'start' => 0
        );
        $this->load->view('view_laporan_penjualan/view_laporan_penjualan_print', $data);
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

            $view_laporan_penjualan_x = $this->View_laporan_penjualan_model->laporan_penjualan_x($q, $dari, $sampai);
        } else {
            $view_laporan_penjualan_x = $this->View_laporan_penjualan_model->get_limit_data_x($q);
        }

        $data = array(
            'view_laporan_penjualan_data' => $view_laporan_penjualan_x,
            'start' => 0
        );
        $this->load->view('view_laporan_penjualan/view_laporan_penjualan_print', $data);
    }
}

/* End of file View_laporan_penjualan.php */
/* Location: ./application/controllers/View_laporan_penjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-05 16:27:59 */
/* http://harviacode.com */