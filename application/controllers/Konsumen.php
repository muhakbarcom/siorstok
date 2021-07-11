<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $c_url = $this->router->fetch_class();
        // $this->layout->auth(); 
        // $this->layout->auth_privilege($c_url);
        $this->load->model('Menu_fb_model');
        $this->load->library('form_validation');
        $this->load->library('cart');
        $this->load->model('Transaksi_model');
        $this->load->model('Detail_transaksi_model');
        $this->load->model('Stok_menu_model');
        $this->load->model('Rekapan_stok_model');
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {

        $data['title'] = 'Pemesanan Konsumen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        //$this->layout->set_privilege(1);
        $data['view_menu_terbaru'] = $this->db->query("select * from view_menu_terbaru")->result_array();
        $data['view_menu_favorit'] = $this->db->query("select * from view_menu_favorit")->result_array();
        $data['page'] = 'Konsumen';
        $this->load->view('template/konsumen', $data);
    }

    public function order($x = 'food')
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'konsumen/order?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'konsumen/order?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'konsumen/order';
            $config['first_url'] = base_url() . 'konsumen/order';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Menu_fb_model->total_rows($q);
        $data['title'] = 'Pemesanan Konsumen';

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data = array(
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['menu'] = $this->Menu_fb_model->get_limit_data_menu($config['per_page'], $start, $q, $x);
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        //$this->layout->set_privilege(1);
        $data['page'] = 'order';
        $this->load->view('template/konsumen', $data);
    }

    public function keranjang($id_menu)
    {
        $menu = $this->Menu_fb_model->get_by_id($id_menu);
        $data = array(
            'id'      => $menu->id_menu,
            'qty'     => 1,
            'price'   => $menu->harga_menu,
            'name'    => $menu->nama_menu,
        );
        $this->cart->insert($data);
        redirect('konsumen/order/' . $menu->kategori_menu);
    }
    public function detail_keranjang()
    {
        $data['title'] = 'Pemesanan Konsumen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        //$this->layout->set_privilege(1);
        $data['view_menu_terbaru'] = $this->db->query("select * from view_menu_terbaru")->result_array();
        $data['page'] = 'keranjang';
        $this->load->view('template/konsumen', $data);
    }

    function hapus($rowid)
    {
        if ($rowid == "all") {
            $this->cart->destroy();
        } else {
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        redirect('konsumen/detail_keranjang');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]'),
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('konsumen/detail_keranjang');
    }

    public function checkout()
    {

        $data['title'] = 'Pemesanan Konsumen';
        //$this->layout->set_privilege(1);
        $data['page'] = 'checkout';
        $this->load->view('template/konsumen', $data);
    }
    public function selesai()
    {

        $apa = $this->ion_auth->user()->row();


        $atas_nama = $this->input->post('atas_nama');
        $i = 1;
        $total_item = $this->cart->total_items();
        $total_bayar = $this->cart->total();

        $data = array(
            'jumlah_item' => $total_item,
            'nama_konsumen' => $atas_nama,
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'total_bayar' => $total_bayar,
            // 'status_transaksi' => 'Selesai',
            // 'status_pelayanan' => NULL,
            'id_user' => $apa->id,
        );

        $id_trx = $this->Transaksi_model->insert($data);
        $i = 1;
        foreach ($this->cart->contents() as $items) {

            $data = array(
                'id_transaksi' => $id_trx,
                'id_menu' => $items['id'],
                'jumlah_item' => $items['qty'],
                'total_bayar' => $items['subtotal'],
                'tanggal_transaksi' => date('Y-m-d H:i:s'),
                'catatan' => $this->input->post($i . 'catatan')
            );
            $i++;

            $this->Detail_transaksi_model->insert($data);
            $id_menu = $items['id'];
            $rekapan = $this->db->query("select * from rekapan_stok where id_menu=$id_menu")->row();
            $stok_menu = $this->db->query("select * from stok_menu where id_menu=$id_menu")->row();
            if ($rekapan) {
                $data = array(
                    'id_menu' => $stok_menu->id_menu,
                    'tanggal_penjualan' => date('Y-m-d'),
                    'stok_terjual' => $stok_menu->terjual,
                    'stok_sisa' => $stok_menu->sisa,
                );

                $this->db->where('id_menu', $id_menu);
                $this->db->where('tanggal_penjualan', date('Y-m-d'));
                $this->db->update('rekapan_stok', $data);
            } else {
                $data = array(
                    'id_menu' => $stok_menu->id_menu,
                    'tanggal_penjualan' => date('Y-m-d'),
                    'stok_terjual' => $stok_menu->terjual,
                    'stok_sisa' => $stok_menu->sisa,
                );
                $this->Rekapan_stok_model->insert($data);
            }
        }



        $this->cart->destroy();
        redirect('transaksi/masuk');
    }
}
