<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stok_menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Stok_menu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'stok_menu?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'stok_menu?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'stok_menu';
            $config['first_url'] = base_url() . 'stok_menu';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Stok_menu_model->total_rows($q);
        $stok_menu = $this->Stok_menu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'stok_menu_data' => $stok_menu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Kelola Stok Menu';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Stok Menu' => '',
        ];

        $data['page'] = 'stok_menu/stok_menu_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Stok_menu_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_stok_menu' => $row->id_stok_menu,
                'id_menu' => $row->id_menu,
                'jumlah_stok_menu' => $row->jumlah_stok_menu,
                'terjual' => $row->terjual,
                'sisa' => $row->sisa,
            );
            $data['title'] = 'Stok Menu';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'stok_menu/stok_menu_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('stok_menu'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('stok_menu/create_action'),
            'id_stok_menu' => set_value('id_stok_menu'),
            'id_menu' => set_value('id_menu'),
            'jumlah_stok_menu' => set_value('jumlah_stok_menu'),
            'terjual' => set_value('terjual'),
            'sisa' => set_value('sisa'),
        );
        $data['title'] = 'Stok Menu';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        $data['fungsi'] = 'create';

        $data['nama_menu'] = $this->db->query("SELECT * FROM menu_food_and_beverage WHERE NOT EXISTS (SELECT * FROM stok_menu WHERE menu_food_and_beverage.id_menu = stok_menu.id_menu)")->result();
        $data['page'] = 'stok_menu/stok_menu_form';
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
                'jumlah_stok_menu' => $this->input->post('jumlah_stok_menu', TRUE),
                'terjual' => $this->input->post('terjual', TRUE),
                'sisa' => $this->input->post('sisa', TRUE),
            );

            $this->Stok_menu_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('stok_menu'));
        }
    }

    public function update($id)
    {
        $row = $this->Stok_menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('stok_menu/update_action'),
                'id_stok_menu' => set_value('id_stok_menu', $row->id_stok_menu),
                'id_menu' => set_value('id_menu', $row->id_menu),
                'jumlah_stok_menu' => set_value('jumlah_stok_menu', $row->jumlah_stok_menu),
                'terjual' => set_value('terjual', $row->terjual),
                'sisa' => set_value('sisa', $row->sisa),
            );
            $data['title'] = 'Stok Menu';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['fungsi'] = 'update';
            $data['page'] = 'stok_menu/stok_menu_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('stok_menu'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_stok_menu', TRUE));
        } else {
            $data = array(
                'id_menu' => $this->input->post('id_menu', TRUE),
                'jumlah_stok_menu' => $this->input->post('jumlah_stok_menu', TRUE),
                'terjual' => $this->input->post('terjual', TRUE),
                'sisa' => $this->input->post('sisa', TRUE),
            );

            $this->Stok_menu_model->update($this->input->post('id_stok_menu', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('stok_menu'));
        }
    }

    public function delete($id)
    {
        $row = $this->Stok_menu_model->get_by_id($id);

        if ($row) {
            $this->Stok_menu_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('stok_menu'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('stok_menu'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Stok_menu_model->deletebulk();
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
        $this->form_validation->set_rules('jumlah_stok_menu', 'jumlah stok menu', 'trim|required');
        // $this->form_validation->set_rules('terjual', 'terjual', 'trim|required');
        // $this->form_validation->set_rules('sisa', 'sisa', 'trim|required');

        $this->form_validation->set_rules('id_stok_menu', 'id_stok_menu', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Stok_menu.php */
/* Location: ./application/controllers/Stok_menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-27 07:09:05 */
/* http://harviacode.com */