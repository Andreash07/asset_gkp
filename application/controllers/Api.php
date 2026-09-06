<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

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
        	//redirect(base_url().'login');
        	die('Access Denied!');
        }


    }
	public function index()
	{
		die('Access Denied!');
	}

	public function dashboard()
	{
		$data=array();

		//get_data perjamaat
		$s="select C.name as klasis, A.klasis_id, A.CompName as jemaat, A.id as jemaat_id, COUNT(B.id) as num_aset, SUM(B.luas) as total_luas_tanah
				from jemaat A 
				left join assets B on B.jemaat_id = A.id && B.approved=1 
				left Join klasis C on C.id = A.klasis_id
				group by A.id
				order by num_aset DESC, A.id;";
		$q=$this->m_model->selectcustom($s);

		$data['jemaat']=array();
		$data['klasis']=array();
		$data['aset_jemaat']=$q;
		$data['num_aset_jemaat']=array();
		$data['luas_aset_jemaat']=array();
		$data['ls_klasis']=array();
		$data['ls_jemaat']=array();

		$total_aset=0;
		$total_luas=0;
		foreach ($q as $key => $value) {
			// code...
			if(!isset($data['num_aset_jemaat'][$value->jemaat_id])){
				//$data['num_aset_jemaat'][]=0;
				//$data['luas_aset_jemaat'][$value->jemaat_id]=0;
			}
			
			if(!isset($data['klasis'][$value->klasis_id])){
				$data['klasis'][$value->klasis_id]=array();
				$data['klasis'][$value->klasis_id]['klasis']=$value->klasis;
				if($value->klasis== ''){
					$data['klasis'][$value->klasis_id]['klasis']=$value->jemaat;
				}
				$data['klasis'][$value->klasis_id]['klasis_id']=$value->klasis_id;
				$data['klasis'][$value->klasis_id]['num_aset']=0;
				$data['klasis'][$value->klasis_id]['percentage']=0;
			}
			$data['klasis'][$value->klasis_id]['num_aset']=$data['klasis'][$value->klasis_id]['num_aset']+$value->num_aset;
			$data['jemaat'][]=$value->jemaat;

			$data['ls_klasis'][$value->klasis_id]=array('id'=>$value->klasis_id, 'name'=>$value->klasis);
			$data['ls_jemaat'][$value->klasis_id][$key]=array('id'=> $value->jemaat_id, 'name'=> $value->jemaat, 'num_aset'=> $value->num_aset,  'percentage_aset'=> 0, 'num_aset_klasis'=>0,  'total_luas_tanah'=> $value->total_luas_tanah);

			$data['num_aset_jemaat'][]=$value->num_aset;
			$data['luas_aset_jemaat'][]=$value->total_luas_tanah;

			$total_aset=$total_aset+$value->num_aset;
			$total_luas=$total_luas+$value->total_luas_tanah;


		}

		//hitung aset klasis dulu
		foreach ($data['klasis'] as $key => $value) {
			// code...
			$percentage=0;
			if($value['num_aset'] >0){
				$percentage=round($value['num_aset']/$total_aset*100, 2);
			}

			$data['klasis'][$key]['percentage']=$percentage;


			if(isset($data['ls_jemaat'][$key])){
				foreach ($data['ls_jemaat'][$key] as $key1 => $value1) {
					# code...
					$percentage_perJemaat=0;
					if($value1['num_aset'] >0 && $value['num_aset'] > 0){
						$percentage_perJemaat=round($value1['num_aset']/$value['num_aset']*100, 2);
					}
					$data['ls_jemaat'][$key][$key1]['percentage_aset']=$percentage_perJemaat;
					$data['ls_jemaat'][$key][$key1]['num_aset_klasis']=$value['num_aset'];
				}
			}

		}

		$data['total_aset']=$total_aset;
		$data['total_luas']=$total_luas;
		
		echo json_encode($data);
	}
	
}


?>