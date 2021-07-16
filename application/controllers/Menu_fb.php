<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_fb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Menu_fb_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'menu_fb?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menu_fb?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menu_fb';
            $config['first_url'] = base_url() . 'menu_fb';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Menu_fb_model->total_rows($q);
        $menu_fb = $this->Menu_fb_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menu_fb_data' => $menu_fb,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Menu Food and Beverage';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Menu Fb' => '',
        ];
        $data['submenu'] = 0;

        $data['page'] = 'menu_fb/menu_food_and_beverage_list';
        $this->load->view('template/backend', $data);
    }


    public function food()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'menu_fb/food?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menu_fb/food?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menu_fb/food';
            $config['first_url'] = base_url() . 'menu_fb/food';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Menu_fb_model->total_rows($q);
        $menu_fb = $this->Menu_fb_model->get_limit_data_food_kelola($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menu_fb_data' => $menu_fb,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Kelola Menu Food and Bvrg';
        $data['kat'] = 'Food';
        $data['subtitle'] = 'Food';
        $data['crumb'] = [
            'Menu Fb' => '',
        ];
        $data['submenu'] = 1;

        $data['page'] = 'menu_fb/menu_food_and_beverage_list';
        $this->load->view('template/backend', $data);
    }

    public function beverage()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'menu_fb/beverage?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menu_fb/beverage?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menu_fb/beverage';
            $config['first_url'] = base_url() . 'menu_fb/beverage';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Menu_fb_model->total_rows($q);
        $menu_fb = $this->Menu_fb_model->get_limit_data_beverage_kelola($config['per_page'], $start, $q, 'Beverage');

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menu_fb_data' => $menu_fb,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Kelola Menu Food and Bvrg';
        $data['kat'] = 'Beverage';

        $data['submenu'] = 1;
        $data['subtitle'] = 'Beverage';
        $data['crumb'] = [
            'Menu Fb' => '',
        ];

        $data['page'] = 'menu_fb/menu_food_and_beverage_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Menu_fb_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_menu' => $row->id_menu,
                'nama_menu' => $row->nama_menu,
                'harga_menu' => $row->harga_menu,
                'gambar' => $row->gambar,
                // 'deskripsi' => $row->deskripsi,
                'kategori_menu' => $row->kategori_menu,
            );
            $data['title'] = 'Menu Fb';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'menu_fb/menu_food_and_beverage_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('menu_fb'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu_fb/create_action'),
            'id_menu' => set_value('id_menu'),
            'nama_menu' => set_value('nama_menu'),
            'harga_menu' => set_value('harga_menu'),
            'gambar' => set_value('gambar'),
            // 'deskripsi' => set_value('deskripsi'),
            'kategori_menu' => set_value('kategori_menu'),
        );
        $data['title'] = 'Menu Food and Bvrg';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'menu_fb/menu_food_and_beverage_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();
        $data['menu_fb'] = $this->Menu_fb_model->get_by_id($this->input->post('id_menu', TRUE));
        $nama_menu =  $this->input->post('nama_menu', TRUE);
        $status_menu = $this->db->query("select count(nama_menu) as jml_menu from menu_food_and_beverage where nama_menu='$nama_menu' ")->row();
        $status_menu = $status_menu->jml_menu;

        if ($status_menu > 0) {
            $this->session->set_flashdata('error', 'Menu Sudah Ada');
            $this->create();
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $gambar = $_FILES['gambar'];
                if ($gambar == '') {
                } else {
                    $config['upload_path'] = './assets/uploads/image/menu/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '2048';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {

                        $gambar = $this->upload->data('file_name');
                    } else {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('menu_fb');
                    }
                }
                $data = array(
                    'nama_menu' => $this->input->post('nama_menu', TRUE),
                    'harga_menu' => $this->input->post('harga_menu', TRUE),
                    'gambar' => $gambar,
                    // 'deskripsi' => $this->input->post('deskripsi', TRUE),
                    'kategori_menu' => $this->input->post('kategori_menu', TRUE),
                );

                $this->Menu_fb_model->insert($data);
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(site_url('menu_fb/' .  $this->input->post('kategori_menu')));
            }
        }
    }

    public function update($id)
    {
        $row = $this->Menu_fb_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu_fb/update_action'),
                'id_menu' => set_value('id_menu', $row->id_menu),
                'nama_menu' => set_value('nama_menu', $row->nama_menu),
                'harga_menu' => set_value('harga_menu', $row->harga_menu),
                'gambar' => set_value('gambar', $row->gambar),
                // 'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'kategori_menu' => set_value('kategori_menu', $row->kategori_menu),
            );
            $data['title'] = 'Update Menu ';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'menu_fb/menu_food_and_beverage_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('menu_fb'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_menu', TRUE));
        } else {
            $gambar = $_FILES['gambar'];
            if ($gambar == '') {
            } else {
                $config['upload_path'] = './assets/uploads/image/menu/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['menu_fb']->gambar;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/uploads/image/menu/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                }
            }
            $data = array(
                'nama_menu' => $this->input->post('nama_menu', TRUE),
                'harga_menu' => $this->input->post('harga_menu', TRUE),
                // 'gambar' => $this->input->post('gambar',TRUE),
                // 'deskripsi' => $this->input->post('deskripsi', TRUE),
                'kategori_menu' => $this->input->post('kategori_menu', TRUE),
            );

            $this->Menu_fb_model->update($this->input->post('id_menu', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('menu_fb/' .  $this->input->post('kategori_menu')));
        }
    }

    public function delete($id, $segment)
    {
        $row = $this->Menu_fb_model->get_by_id($id);

        if ($row) {
            $this->Menu_fb_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('menu_fb/' . $segment));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('menu_fb/' . $segment));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Menu_fb_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_menu', 'nama menu', 'trim|required');
        $this->form_validation->set_rules('harga_menu', 'harga menu', 'trim|required');
        // $this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
        // $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        $this->form_validation->set_rules('kategori_menu', 'kategori menu', 'trim|required');

        $this->form_validation->set_rules('id_menu', 'id_menu', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Menu_fb.php */
/* Location: ./application/controllers/Menu_fb.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-27 06:04:11 */
/* http://harviacode.com */