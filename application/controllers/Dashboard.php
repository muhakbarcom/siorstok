<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
		$this->load->model('Transaksi_model');
		$this->load->model('Menu_fb_model');
		$this->load->model('View_laporan_bulanan_model');
	}

	public function index()
	{
		$tgl = date('Y-m-d');

		$jml_trx_today = $this->db->query("select count(id_transaksi) as jml from transaksi where status_transaksi='SELESAI' and substr(tanggal_transaksi,1,10) ='$tgl'")->row();
		$jml_trx_today_koki = $this->db->query("select count(id_transaksi) as jml from transaksi where status_transaksi='SELESAI' and status_pelayanan='Selesai' and substr(tanggal_transaksi,1,10) ='$tgl'")->row();
		$jml_user = $this->db->query("select count(id) as jml from users")->row();

		$data['jml_trx_today'] = $jml_trx_today->jml;
		$data['jml_user'] = $jml_user->jml;
		$data['jml_pesanan_masuk'] = $this->Transaksi_model->total_pesanan_masuk();
		$data['jml_pesanan_selesai'] = $jml_trx_today_koki->jml;
		$data['jml_food'] = $this->Menu_fb_model->total_menu_food();
		$data['jml_bvrg'] = $this->Menu_fb_model->total_menu_beverage();
		$data['grafik'] = $this->View_laporan_bulanan_model->get_all_grafik();


		$data['title'] = 'Dashboard';
		$data['subtitle'] = '';
		$data['crumb'] = [
			'Dashboard' => '',
		];
		//$this->layout->set_privilege(1);
		$data['page'] = 'Dashboard/Index';
		$this->load->view('template/backend', $data);
	}
}
