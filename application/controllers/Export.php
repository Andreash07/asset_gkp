<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH. '/vendor/autoload.php';

use Spatie\Browsershot\Browsershot; //dimatiin dulu unutk di linux
use Symfony\Component\Process\Process;

class Export extends CI_Controller {

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

    }

	public function index()
	{
		
	}


	public function dashboard_pdf_simple(){
		echo '<h1>TEST DASHBOARD PDF5</h1>';
    echo '<p>Chromium berhasil mengakses CI3.</p>';
	}
	public function dashboard_pdf()
	{
		$data=array();
		$s="select B.name as nama_kategori_kepemilikan, B.initials as initials_kategori_kepemilikan, B.id as kategori_kepemilikan, COUNT(A.id) as total_aset, SUM(A.luas) as total_luas_tanah, A.jenis_dokumen_kepemilikan, C.name as nama_jenis_dokumen 
				from kategori_kepemilikan B
				left join assets A  on B.id = A.kategori_atas_nama && A.approved=1
				left join jenis_dokumen_kepemilikan C on C.id = A.jenis_dokumen_kepemilikan
				group by B.id, C.id
				order by B.priority;";
		$q=$this->m_model->selectcustom($s); //die($s);

		$sjenis_dokumen_kepemilikan=$this->m_model->selectas('status', '1', 'jenis_dokumen_kepemilikan', 'priority', 'ASC');
		$data['jenis_dokumen_kepemilikan']=$sjenis_dokumen_kepemilikan;

		$sjenis_hak_milik="select B.name as jenis_hak_milik, B.priority, B.id as kategori_kepemilikan, COUNT(A.id) as total_aset, SUM(A.luas) as total_luas_tanah
							from jenis_hak_milik B 
							left join assets A  on B.id = A.status_hak_milik && A.approved=1
							group by B.id
							order by B.priority;";
		$data['jenis_hak_milik']=$this->m_model->selectcustom($sjenis_hak_milik);

		$data['kategori_kepemilikan']=array();
		$data['data_kepemilikan']=array();
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

			$data['kategori_kepemilikan'][$value->nama_kategori_kepemilikan]=$value->initials_kategori_kepemilikan;


			if(!isset($data['ls_jenis_dokumen_kepemilikan'][$value->jenis_dokumen_kepemilikan])){
				if(($value->jenis_dokumen_kepemilikan==NULL || $value->jenis_dokumen_kepemilikan ==0 || $value->jenis_dokumen_kepemilikan =='') && !isset($data['ls_jenis_dokumen_kepemilikan']['0'])){
					$data['ls_jenis_dokumen_kepemilikan']['0']=0;	
				}
				elseif($value->jenis_dokumen_kepemilikan !='' && !isset($data['ls_jenis_dokumen_kepemilikan'][$value->jenis_dokumen_kepemilikan]) ) {
					$data['ls_jenis_dokumen_kepemilikan'][$value->jenis_dokumen_kepemilikan]=0;
				}
			}

			if($value->jenis_dokumen_kepemilikan==NULL || $value->jenis_dokumen_kepemilikan ==0 || $value->jenis_dokumen_kepemilikan ==''){
				$data['ls_jenis_dokumen_kepemilikan']['0']=$data['ls_jenis_dokumen_kepemilikan']['0']+$value->total_aset;
			}
			else{
				$data['ls_jenis_dokumen_kepemilikan'][$value->jenis_dokumen_kepemilikan]=$data['ls_jenis_dokumen_kepemilikan'][$value->jenis_dokumen_kepemilikan]+$value->total_aset;
			}


		}

		
		$this->load->view('home/dashboard_pdf', $data);

	}


	public function dashboardtopdf_windows()
	{
		//die('asdas');
	    $url = 'http://localhost:800/asset_gkp/export/dashboard_pdf';

	    $pdfPath = FCPATH . 'dashboard-test.pdf';

		$footerHtml = '
		<style>
		    html {
		        font-size: 8px;
		    }

		    body {
		        margin: 0;
		        padding: 0;
		        font-family: Arial, Helvetica, sans-serif;
		        color: #7a8794;
		    }

		    .footer {
		        width: 100%;
		        font-size: 8px;
		        color: #7a8794;
		        border-top: 1px solid #d9dee3;
		        padding-top: 4px;
		        box-sizing: border-box;
		    }

		    .left {
		        float: left;
		        width: 33%;
		        text-align: left;
		    }

		    .center {
		        float: left;
		        width: 34%;
		        text-align: center;
		    }

		    .right {
		        float: right;
		        width: 33%;
		        text-align: right;
		    }
		</style>

		<div class="footer">

		    <div class="left">
		        Gereja Kristen Pasundan
		    </div>

		    <div class="center">
		        Laporan Data Aset GKP &bull; 2026
		    </div>

		    <div class="right">
		        Halaman <span class="pageNumber"></span>
		        dari <span class="totalPages"></span>
		    </div>

		</div>
		';

		Browsershot::url($url)
		    ->windowSize(1920, 1080)
		    ->waitForFunction('window.dashboardReady === true')
			#->waitForFunction('document.readyState === "complete"')
			->setOption('args', ['--disable-web-security'])
		    ->format('A4')
		    ->landscape()
		    ->showBrowserHeaderAndFooter()
		    ->hideHeader()
		    ->footerHtml($footerHtml)
		    ->save($pdfPath);



	    if (file_exists($pdfPath)) {
		    $filename = 'Laporan_Data_Aset_GKP_' . date('Y-m-d_H-i-s') . '.pdf';

		    header('Content-Type: application/pdf');
		    header('Content-Disposition: attachment; filename="' . $filename . '"');
		    header('Content-Length: ' . filesize($pdfPath));
		    header('Cache-Control: private, max-age=0, must-revalidate');
		    header('Pragma: public');

		    readfile($pdfPath);
		    exit;

		} else {
		    show_error('File PDF gagal dibuat.');
		}

	}

	public function dashboardtopdf(){
		ini_set('pcre.jit', '0');
		#die('pcre.jit = ' . ini_get('pcre.jit'));
		$env = $_SERVER;
		$env['HOME'] = '/tmp/chrome-home';

		$process = new Process(
		    [
		        '/usr/bin/php8.2',
		        '/apps/asset_gkp/test-pdf.php',
		    ],
		    null,
		    $env
		);

		$process->run();

		$pdfPath = FCPATH . 'dashboard-test.pdf';

		if (!$process->isSuccessful()) {
		    show_error($process->getErrorOutput());
		}else{
			if (file_exists($pdfPath)) {
			    $filename = 'Laporan_Data_Aset_GKP_' . date('Y-m-d_H-i-s') . '.pdf';

			    header('Content-Type: application/pdf');
			    header('Content-Disposition: attachment; filename="' . $filename . '"');
			    header('Content-Length: ' . filesize($pdfPath));
			    header('Cache-Control: private, max-age=0, must-revalidate');
			    header('Pragma: public');

			    readfile($pdfPath);
			    exit;

			} else {
			    show_error('File PDF gagal dibuat.');
			}
		}

	}


	public function export_dashboard_png()
	{
		//die('asdas');
	    $url = 'http://localhost:800/asset_gkp/export/dashboard_pdf';

		$path = FCPATH . 'dashboard-test.png';

		Browsershot::url($url)
		    ->windowSize(1920, 5000)
		    ->delay(20000)
		    ->setOption('args', ['--disable-web-security'])
		    ->save($path);

	    echo 'PDF berhasil dibuat di7 ' . $path;
	}
}
