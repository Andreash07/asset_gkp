<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

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

	public function  __construct()
    {
        parent::__construct();

        if(!isset($this->session->userdata('userdata')->id) ){
        	#redirect(base_url());
        }


    }
	public function index()
	{
		$data=array();

		#$s=$this->m_model->selectas('id >0', null, 'assets');
		$s=$this->m_model->selectcustom("select A.*, B.CompName as jemaat , C.name as klasis, D.name as kategori_atas_nama, E.name as status_hak_milik, F.name as jenis_dokumen_kepemilikan
											from assets A 
											left join jemaat B on B.id = A.jemaat_id
											left join klasis C on C.id = B.klasis_id
											left join kategori_kepemilikan D on D.id = A.kategori_atas_nama
											left join jenis_hak_milik E on E.id = A.status_hak_milik
											left join jenis_dokumen_kepemilikan F on F.id = A.jenis_dokumen_kepemilikan
											where A.id >0");
		$data['data']=$s;
		$this->load->view('aset/index', $data);
	}
	public function edit($id=0){
		$data=array();
		$s="select A.*
			from assets A 
			where A.id='".$id."'";
		$q=$this->m_model->selectcustom($s);
		$data['data']=$q;

		$qjemaat=$this->m_model->selectas('id >=0 ', null, 'jemaat');
		$data['jemaat']=$qjemaat;

		$data['jenis_dokumen_kepemilikan']=$this->m_model->selectas('id>=0', null, 'jenis_dokumen_kepemilikan');
		$data['kategori_kepemilikan']=$this->m_model->selectas('id>=0', null, 'kategori_kepemilikan');
		$data['jenis_hak_milik']=$this->m_model->selectas('id>=0', null, 'jenis_hak_milik');

		$this->load->view('aset/edit', $data);

	}

	public function add(){
		$data=array();
		$qjemaat=$this->m_model->selectas('id >=0 ', null, 'jemaat');
		$data['jemaat']=$qjemaat;

		$data['jenis_dokumen_kepemilikan']=$this->m_model->selectas('id>=0', null, 'jenis_dokumen_kepemilikan');
		$data['kategori_kepemilikan']=$this->m_model->selectas('id>=0', null, 'kategori_kepemilikan');
		$data['jenis_hak_milik']=$this->m_model->selectas('id>=0', null, 'jenis_hak_milik');
		$this->load->view('aset/add', $data);

	}

	public function perbarui(){
		$data=array();
		$param=array();

		$recid=$this->input->post('recid');
		#print_r($this->input->post());die();

		$param['peruntukan_tanah']=$this->input->post('peruntukan_tanah');
		$param['atas_nama']=$this->input->post('atas_nama');
		$param['kategori_atas_nama']=$this->input->post('kategori_atas_nama');
		$param['jenis_dokumen_kepemilikan']=$this->input->post('jenis_dokumen_kepemilikan');
		$param['status_hak_milik']=$this->input->post('status_hak_milik');
		$param['luas']=$this->input->post('luas');
		$param['catatan']=$this->input->post('catatan');
		$param['sts_sertifikat_disinode']=$this->input->post('sts_sertifikat_disinode');
		$param['keterangan']=$this->input->post('keterangan');
		$param['alamat_lokasi']=$this->input->post('alamat_lokasi');
		$param['langtitude']=$this->input->post('lat');
		$param['longtitude']=$this->input->post('lng');
		$param['jemaat_id']=$this->input->post('jemaat_pengelola');
		$param['no_dokumen']=$this->input->post('no_dokumen');



		$u=$this->m_model->updateas('id', $recid, $param, 'assets');
		redirect(base_url().'aset/');
		//$this->load->view('aset/edit', $data);

	}

	public function simpan(){
		$data=array();
		$param=array();

		#$recid=$this->input->post('recid');
		#print_r($this->input->post());die();

		$param['peruntukan_tanah']=$this->input->post('peruntukan_tanah');
		$param['atas_nama']=$this->input->post('atas_nama');
		$param['kategori_atas_nama']=$this->input->post('kategori_atas_nama');
		$param['jenis_dokumen_kepemilikan']=$this->input->post('jenis_dokumen_kepemilikan');
		$param['status_hak_milik']=$this->input->post('status_hak_milik');
		$param['luas']=$this->input->post('luas');
		$param['catatan']=$this->input->post('catatan');
		$param['sts_sertifikat_disinode']=$this->input->post('sts_sertifikat_disinode');
		$param['keterangan']=$this->input->post('keterangan');
		$param['alamat_lokasi']=$this->input->post('alamat_lokasi');
		$param['langtitude']=$this->input->post('lat');
		$param['longtitude']=$this->input->post('lng');
		$param['jemaat_id']=$this->input->post('jemaat_pengelola');
		$param['no_dokumen']=$this->input->post('no_dokumen');


		#$u=$this->m_model->updateas('id', $recid, $param, 'assets');
		$i=$this->m_model->insertgetid($param, 'assets');
		redirect(base_url().'aset/');
		//$this->load->view('aset/edit', $data);

	}

	public function form_upload_lampiran(){
		$data=array();
		$token=$this->input->get('auth') ;
		$nama_asset=$this->input->post('nama_asset') ;
		//$token=str_replace('*92837ads0f87', '',  base64_decode($this->input->get('auth')) );

		$data['nama_asset']=$nama_asset;
		$data['token']=$token;
		$this->load->view('aset/form_upload_lampiran', $data);
	}

	public function upload_lampiran(){
		$data=array();
		$token=$this->input->post('token') ;
		$aset_id=str_replace('*92837ads0f87', "", base64_decode($token)) ;
		#die(base64_decode($token));
		$files=$_FILES['file'];
		$size=$files['size'];
		$name_file = $aset_id."-".uniqid().".".pathinfo($files['name'], PATHINFO_EXTENSION);
		$config['upload_path']          = FCPATH.'78as98fd298a9s/';
	        $config['allowed_types']        = 'pdf|jpeg|jpg|png';
	        $config['max_size']             = 10485760; #10MB
	        $config['file_name']            = $name_file;
	        #$config['max_width']            = 1024;
	        #$config['max_height']           = 768;

	        $this->load->library('upload', $config);
	        #echo $config['upload_path'] ;
	        $json=array();
	        if ( ! $this->upload->do_upload('file'))
	        {
	                $error = array('error' => $this->upload->display_errors());
	        		$json['sts']=0;
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());
	        		$json['sts']=1;

		        $param=array();
		        $param['asset_id']=$aset_id;
		        $param['mime_type']=$data['upload_data']['file_type'];
		        #$param['size']=$data['upload_data']['file_size'];
		        $param['size']=$size; #byte
		        $param['file_name']=$data['upload_data']['client_name'];
		        $param['path']="78as98fd298a9s/".$name_file;
		        $param['uploaded_at']=date('Y-m-d H:i:s');
		        $param['upload_by']='7';

		        $i=$this->m_model->insertgetid($param, 'lampiran_assets');
		        if($i>0){
				$json['sts']=2;
		        }
	        }

	        echo json_encode($json);
        #print_r($error);
        #print_r($data);
        #print_r($json);
        #die();

	}


	public function get_lampiran(){
		$data=array();
		$token=$this->input->post('token');
		$aset_id=str_replace('*92837ads0f87', "", base64_decode($token)) ;

		$data['lampiran']=$this->m_model->selectas('asset_id', $aset_id, 'lampiran_assets');

		$this->load->view('aset/daftar_lampiran', $data);


	}
}


?>