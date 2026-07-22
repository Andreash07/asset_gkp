<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

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

        if(!isset($this->session->userdata('user')->id) ){
        	redirect(base_url().'login');
        }


    }
	public function index(){
		die('Access Denied!');
	}
	public function users($action=null, $recid=null)
	{
		$data=array();

		#$s=$this->m_model->selectas('id >0', null, 'assets');
		$s=$this->m_model->selectcustom("select B.*, A.l12jhlaslaksljd as username, A.status
					from users A
					join profiles B on A.id = B.user_id");
		$data['data']=$s;
		$this->load->view('administrator/users/index', $data);
	}
	public function users_edit($id=0){
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

		$data['kategori_atas_nama_text'][]=array('value'=>'YBRS');
		$data['kategori_atas_nama_text'][]=array('value'=>'YBPK');
		$data['kategori_atas_nama_text'][]=array('value'=>'YPT');
		$data['kategori_atas_nama_text'][]=array('value'=>'YKB');

		$s2=$this->m_model->selectcustom('select * from assets where kategori_atas_nama_text is not NULL && kategori_atas_nama_text !="" group by kategori_atas_nama_text');
		foreach ($s2 as $key => $value) {
			# code...
			$data['kategori_atas_nama_text'][]=array('value'=> $value->kategori_atas_nama_text);
		}

		$this->load->view('aset/edit', $data);

	}

	public function users_add(){
		$data=array();

		$this->load->view('administrator/users/add', $data);
	}

	public function perbarui(){
		$data=array();
		$param=array();

		$recid=$this->input->post('recid');
		#print_r($this->input->post());die();

		$param['peruntukan_tanah']=$this->input->post('peruntukan_tanah');
		$param['atas_nama']=$this->input->post('atas_nama');
		$param['kategori_atas_nama']=$this->input->post('kategori_atas_nama');
		$param['kategori_atas_nama_text']=$this->input->post('kategori_atas_nama_text');
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

	public function users_simpan(){
		$data=array();

		#$recid=$this->input->post('recid');
		#print_r($this->input->post());die();
//users dulu
		$param=array();
		$param['l12jhlaslaksljd']=$this->input->post('username');
		$param['iausoq12eu809asod']=$this->input->post('amjsdhalksdnlk');
		$param['status']=$this->input->post('status');
		$i=$this->m_model->insertgetid($param, 'users');


		$param2=array();
		$param2['firstname']=$this->input->post('firstname');
		$param2['lastname']=$this->input->post('lastname');
		$param2['gender']=$this->input->post('gender');
		$param2['user_id']=$i;

		$i2=$this->m_model->insertgetid($param2, 'profiles');


		redirect(base_url().'administrator/users');
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

		$data['lampiran']=$this->m_model->selectas2('asset_id', $aset_id, 'deleted', '0', 'lampiran_assets');

		$this->load->view('aset/daftar_lampiran', $data);


	}

	public function rename_att(){
		$data=array();
		$token=$this->input->post('token');
		$param=array();
		$param['name']=$this->input->post('value');
		$param['update_at']=date('Y-m-h H:i:s');
		$param['update_by']=7;

		$u=$this->m_model->updateas('md5(id)', $token, $param, 'lampiran_assets');
		if($u){
			$json['sts']=1;
		}
		else{
			$json['sts']=0;
		}

		echo json_encode($json);

	}

	public function delete_att(){
		$data=array();
		$token=$this->input->post('token');
		$param=array();
		$param['deleted']=1;
		$param['update_at']=date('Y-m-h H:i:s');
		$param['update_by']=7;

		$u=$this->m_model->updateas('md5(id)', $token, $param, 'lampiran_assets');
		if($u){
			$json['sts']=1;
		}
		else{
			$json['sts']=0;
		}

		echo json_encode($json);

	}


	public function change_permission(){
		$data=array();
		$token=$this->input->post('token');
		$param=array();
		$param['private']=$this->input->post('value');
		$param['update_at']=date('Y-m-h H:i:s');
		$param['update_by']=7;

		$u=$this->m_model->updateas('md5(id)', $token, $param, 'lampiran_assets');
		if($u){
			$json['sts']=1;
		}
		else{
			$json['sts']=0;
		}

		echo json_encode($json);

	}



	public function view_attachment($token){
		$data=array();

		//get path dulu dari db
		$token=clearText($token);
		$sfile=$this->m_model->selectas('MD5(CONCAT("KJHkah1298AS*&",id))', $token, 'lampiran_assets');

		if(count($sfile)==0){
			redirect(base_url().'Page/NotFound');
		}

		$mime_img=array("image/png", "image/jpg", "image/jpeg", "image/jp2g");
		$mime_pdf=array("application/pdf");

		foreach ($sfile as $key => $value) {
			// code...
			$private=$value->private;	
			$size=$value->size; //in byte
			$mime_type=$value->mime_type;	
			$file_name=$value->file_name;	
			$path=FCPATH.$value->path;
			
			$name=$value->name;	
			if($name==''){
				$name=pathinfo($value->file_name, PATHINFO_FILENAME);	
			}
		}


		$fp = fopen($path, 'rb');

		header('Content-Type: '.mime_content_type($path));
		header('Content-Length: '.filesize($path));
		header("Content-Disposition: inline; filename=\"{$name}\"; filename*=UTF-8''".rawurlencode($name));

		fpassthru($fp);
		exit;
	}
}


?>