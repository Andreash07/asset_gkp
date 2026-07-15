<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data=array();
		$s="select B.name as nama_kategori_kepemilikan, B.id as kategori_kepemilikan, COUNT(A.id) as total_aset, SUM(A.luas) as total_luas_tanah, A.jenis_dokumen_kepemilikan, C.name as nama_jenis_dokumen 
				from kategori_kepemilikan B
				left join assets A  on B.id = A.kategori_atas_nama
				left join jenis_dokumen_kepemilikan C on C.id = A.jenis_dokumen_kepemilikan
				group by B.id, C.id
				order by B.priority;";
		$q=$this->m_model->selectcustom($s);

		$data['kategori_kepemilikan']=array();
		foreach ($q as $key => $value) {
			// code...
			if(!isset($data['total_aset'])){
				$data['total_aset']=0;
				$data['total_luas_tanah']=0;
				$data['sertipikat']=0;
				$data['non_sertipikat']=0;
			}

			if(!isset($data['data_kepemilikan'][$value->nama_kategori_kepemilikan])){
				$data['data_kepemilikan'][$value->nama_kategori_kepemilikan]=0;
			}

			$data['total_aset']=$data['total_aset']+$value->total_aset;
			$data['total_luas_tanah']=$data['total_luas_tanah']+$value->total_luas_tanah;

			if($value->total_aset != null){
				$data['data_kepemilikan'][$value->nama_kategori_kepemilikan]=$data['data_kepemilikan'][$value->nama_kategori_kepemilikan]+$value->total_aset;
			}

			if( strpos(strtolower($value->nama_jenis_dokumen), 'sertipikat')  !== false){
				//ini bearti dokumen ada kata seripikatnya
				$data['sertipikat']=$data['sertipikat']+$value->total_aset;
			}
			else{
				$data['non_sertipikat']=$data['non_sertipikat']+$value->total_aset;
			}

			$data['kategori_kepemilikan'][$value->nama_kategori_kepemilikan]=$value->nama_kategori_kepemilikan;
		}
		#print_r($data); die();

		$this->load->view('home/dashboard', $data);
	}
}
