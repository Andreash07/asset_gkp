<!DOCTYPE html>

<html lang="en">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Sistem Manajemen Aset - GKP</title>



    <!-- Bootstrap -->

    <link href="<?=base_url();?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->

    <link href="<?=base_url();?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->

    <link href="<?=base_url();?>/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- iCheck -->

    <link href="<?=base_url();?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

	

    <!-- bootstrap-progressbar -->

    <link href="<?=base_url();?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- JQVMap -->

    <link href="<?=base_url();?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- bootstrap-daterangepicker -->

    <!--<link href="<?=base_url();?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->



    <!-- bootstrap-datepicker -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet">





    <!-- Custom Theme Style -->

    <link href="<?=base_url();?>/build/css/custom.css" rel="stylesheet">



    <!-- jQuery -->

    <script src="<?=base_url();?>/vendors/jquery/dist/jquery.min.js"></script>

    <!-- izy Toastt-->

    <script src="<?= base_url('assets/iziToast-master/dist/js/iziToast.js'); ?>"></script>

    <link href="<?= base_url('assets/iziToast-master/dist/css/iziToast.min.css'); ?>" rel="stylesheet">



    <!-- NProgress -->

    <link href="<?=base_url();?>vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Dropzone.js -->

    <link href="<?=base_url();?>vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">



    <!-- Switchery -->

    <link href="<?=base_url();?>vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <link href="<?=base_url();?>vendors/select2/dist/css/select2.min.css" rel="stylesheet">





    <!-- fancybox.js-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <link rel="icon" type="image/png" href="<?=base_url();?>assets/images/logo-gkp_compressed.png" sizes="96x96" />
    <style>
      @media print {
        * {
          -webkit-print-color-adjust: exact !important;
          print-color-adjust: exact !important;
        }
        body {
          /*background: #f7f7f7 !important;*/
        }
      }


      /* =================================
   HEADER / KOP LAPORAN
   ================================= */

.report-header {
    width: 100%;
    min-height: 75px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-sizing: border-box;
    margin-bottom: 8pt;
}

.report-brand {
    display: flex;
    align-items: center;
}

.report-logo {
    width: 65px;
    height: 65px;
    margin-right: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.report-logo img {
    width: 65px;
    height: 65px;
    object-fit: contain;
}

.report-church {
    line-height: 1.2;
}

.church-name {
    font-family: Georgia, "Times New Roman", serif;
    font-size: 21px;
    font-weight: bold;
    color: #173f67;
    letter-spacing: 0.3px;
}

.church-subtitle {
    margin-top: 2px;
    font-size: 14px;
    font-weight: bold;
    color: #587089;
    letter-spacing: 1.2px;
}

.church-motto {
    margin-top: 5px;
    font-size: 12px;
    font-style: italic;
    color: #718096;
}

.report-info {
    text-align: right;
    padding-right: 5px;
}

.report-title {
    font-size: 18px;
    font-weight: bold;
    color: #173f67;
    margin-bottom: 5px;
}

.report-period {
    font-size: 12px;
    color: #587089;
    margin-bottom: 3px;
}

.report-date {
    font-size: 12px;
    color: #718096;
}

.report-header-line {
    width: 100%;
    border-bottom: 2px solid #173f67;
    margin-bottom: 14pt;
}

@page {
    size: A4 landscape;
    margin: 10mm 10mm 14mm 10mm;
}

.page-break {
    page-break-before: always;
    break-before: page;
}


.green {
    color: #1ABB9C !important;
}

.red {
    color: #E74C3C !important;
}

.count.green {
    color: #1ABB9C !important;
}

.count.red {
    color: #E74C3C !important;
}

</style>

  </head>
 <body class="nav-md">

  <div class="container body">
<div class="right_col" role="main" style="margin-left:0 !important;">
  <!-- ==============================
     HEADER / KOP LAPORAN
     ============================== -->

<div class="report-header">

    <div class="report-brand">

        <div class="report-logo">
            <img src="<?= base_url('assets/images/logo-gkp.png'); ?>" alt="Logo GKP">
        </div>

        <div class="report-church">
            <div class="church-name">
                GEREJA KRISTEN PASUNDAN
            </div>

            <div class="church-subtitle">
                BPP SINODE
            </div>

            <div class="church-motto">
                Menjadi Gereja Bagi Sesama
            </div>
        </div>

    </div>


    <div class="report-info">

        <div class="report-title">
            LAPORAN DATA ASET (Property) GKP
        </div>

        <div class="report-period">
            <strong>per-<?=date('F Y');?></strong>
        </div>

        <div class="report-date">
            Tanggal Cetak : <?= date('d F Y | H:i:A'); ?>
        </div>

    </div>

</div>

<div class="report-header-line"></div>
 	<!-- top tiles -->
  	<div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Aset</span>
          <div class="count"><?=$total_aset;?></div>
          <!--<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
        </div>
        <!--<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-clock-o"></i> Total Luas (m²)</span>
          <div class="count green"><?=$total_luas_tanah;?> </div>-->
          <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>-->
        <!--</div>-->
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-sitemap"></i> Atas Nama Sinode</span>
          <div class="count <?php if($data_kepemilikan['Sinode GKP']<=0) echo "red"; else echo "green"; ?>"><?=$data_kepemilikan['Sinode GKP']; ?></div>
          <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-building"></i> Atas Nama Bapel</span>
          <div class="count <?php if($data_kepemilikan['Badan Pelayanan GKP']<=0) echo "red"; else echo "green"; ?>"><?=$data_kepemilikan['Badan Pelayanan GKP']; ?></div>
          <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-users"></i> Atas Nama Jemaat</span>
          <div class="count <?php if($data_kepemilikan['Jemaat GKP']<=0) echo "red"; else echo "green"; ?> "><?=$data_kepemilikan['Jemaat GKP']; ?></div>
          <!--<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>-->
        </div>
        <!--<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Aset Bersertifikat</span>
          <div class="count"><?=$sertipikat;?></div>-->
          <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
        <!--</div>-->
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Atas Nama Pribadi</span>
          <div class="count <?php if($data_kepemilikan['Pribadi']>0) echo "red"; else echo "green"; ?>"><?=$data_kepemilikan['Pribadi'];?></div>
          <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Proses Sertifikat</span>
          <div class="count <?php if($non_sertipikat>0) echo "red"; else echo "green"; ?>"><?=$non_sertipikat;?></div>
          <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
        </div>
  	</div>
  	<!-- /top tiles -->

  	<div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12">
    		<div class="x_panel tile fixed_height_390">
            <div class="x_title">
	          	<h2>Status Legalitas</h2>
	          	<div class="clearfix"></div>
            </div>
            <div class="x_content">
              <?php 
                foreach ($jenis_dokumen_kepemilikan as $key => $value) {
                  // code...

                $percentage=0;
                if(isset($ls_jenis_dokumen_kepemilikan[$value->id]) && $total_aset>0){
                  $percentage=$ls_jenis_dokumen_kepemilikan[$value->id]/$total_aset*100;
                }
                else{
                  $ls_jenis_dokumen_kepemilikan[$value->id]=0; 
                }

                $bg_bar='bg-green';
                if($percentage ==0){
                  $bg_bar='bg-red';
                }
              ?>
                  <div class="widget_summary">
                    <div class="w_left w_55">
                      <span><?=$value->name;?></span>
                    </div>
                    <div class="w_center w_25">
                      <div class="progress">
                        <div class="progress-bar <?=$bg_bar;?>" role="progressbar" aria-valuenow="<?=$ls_jenis_dokumen_kepemilikan[$value->id];?>" aria-valuemin="0" aria-valuemax="<?=$total_aset;?>" style="width: <?= round($percentage,2);?>%;">
                          <span class="sr-only"><?= round($percentage,2);?>% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span><?=$ls_jenis_dokumen_kepemilikan[$value->id];?></span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
              <?php
                }
              ?>
            </div>
      	</div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
    		<div class="x_panel tile fixed_height_390">
          <div class="x_title">
          	<h2>Jenis Hak Kepemilikan</h2>
          	<div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php 
              foreach ($jenis_hak_milik as $key => $value) {
                // code...
                $percentage=0;
                if($total_aset>0){
                  $percentage=$value->total_aset/$total_aset*100;
                }

                $bg_bar='bg-green';
                if($percentage ==0){
                  $bg_bar='bg-red';
                }
            ?>
              <div class="widget_summary">
                <div class="w_left w_55">
                  <span><?=$value->jenis_hak_milik;?></span>
                </div>
                <div class="w_center w_25">
                  <div class="progress">
                    <div class="progress-bar <?=$bg_bar;?>" role="progressbar" aria-valuenow="<?=$value->total_aset;?>" aria-valuemin="0" aria-valuemax="<?=$total_aset;?>" style="width: <?= round($percentage,2);?>%;">
                      <span class="sr-only"> <?= round($percentage,2);?>% Complete</span>
                    </div>
                  </div>
                </div>
                <div class="w_right w_20">
                  <span><?=$value->total_aset;?></span>
                </div>
                <div class="clearfix"></div>
              </div>
            <?php 
              }
            ?>
          </div>
      	</div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
    		<div class="x_panel tile fixed_height_390">
          <div class="x_title">
          	<h2>Kepemilikan Atas Nama</h2>
          	<div class="clearfix"></div>
          </div>
          <div class="x_content">
          	<?php 
          		foreach ($kategori_kepemilikan as $key => $value) {
          			// code...
          			$percentage=0;
          			if($data_kepemilikan[$key] >0 ){
          				$percentage=$data_kepemilikan[$key]/$total_aset*100;
          			}

                $bg_bar='bg-green';
                if($percentage ==0){
                  $bg_bar='bg-red';
                }
      			?>
    					<div class="widget_summary">
	              <div class="w_left w_55">
	                <span><?=$value;?></span>
	              </div>
	              <div class="w_center w_25">
	                <div class="progress">
	                  <div class="progress-bar <?=$bg_bar;?>" role="progressbar" aria-valuenow="<?=$data_kepemilikan[$key];?>" aria-valuemin="0" aria-valuemax="<?=$total_aset;?>" style="width: <?=round($percentage, 2);?>%;">
	                    <span class="sr-only"><?=round($percentage, 2);?> % Complete</span>
	                  </div>
	                </div>
	              </div>
	              <div class="w_right w_20">
	                <span><?=$data_kepemilikan[$key];?></span>
	              </div>
	              <div class="clearfix"></div>
	          	</div>
      			<?php
          		}
          	?>
          </div>
      	</div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12">
    		<div class="x_panel tile fixed_height_390">
            <div class="x_title">
	          	<h2>Aset Berdasarkan Klasis</h2>
	          	<div class="clearfix"></div>
            </div>
            <div class="x_content" id="x_content_aset_klasis">
            </div>
      	</div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12" style="display:none;">
    		<div class="x_panel tile">
            <div class="x_title">
	          	<h2>Jemaat - Aset Terbanyak</h2>
	          	<div class="clearfix"></div>
            </div>
            <div class="x_content" id="x_content_aset_klasis">
            </div>
      	</div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12"  style="display:none;">
    		<div class="x_panel tile">
            <div class="x_title">
	          	<h2>Jemaat - Aset Terbanyak</h2>
	          	<div class="clearfix"></div>
            </div>
            <div class="x_content" id="x_content_aset_klasis">
            </div>
      	</div>
      </div>
      <!--<div class="col-md-8 col-sm-8 col-xs-12">
      	<div class="x_panel tile fixed_height_390">
          <div class="x_title">
            	<h2>Aset per Jemaat GKP</h2>
            	<div class="clearfix"></div>
          </div>
      		<div class="x_content">
      			<div id="mainb" style="height:350px;"><i class="fa fa-circle-o-notch fa-spin fa-4x" style="margin-left:40%;"></i></div>
          </div>
    		</div>
      </div>-->
    </div>

  <div class="page-break"></div>
  <div class="row" id="row_aset_jemaatperklasis">
    <div class="report-brand">
      <div class="report-church">
        <div class="report-title">
          Data Ringkasan Aset per-Klasis/Jemaat
        </div>
      </div>
    </div>
    <div class="report-header-line"></div>
  </div>

</div>
</div>
</body>


<?php
$this->load->view('layout/footer');
?>
<!-- ECharts -->

<script src="<?=base_url();?>vendors/echarts/dist/echarts.min.js"></script>

<script src="<?=base_url();?>vendors/echarts/map/js/world.js"></script>

<script>
  window.dashboardReady = false;
    get_data()

		function get_data(){
			dataMap={}
			$.get('<?=base_url();?>api/dashboard', dataMap, function(data){
        json=$.parseJSON(data)
        aset_klasis(json.klasis, json.total_aset)

        //let totalKlasis = json.ls_klasis.length;

        let totalKlasis = 0;
        let selesaiKlasis = 0;

        $.each(json.ls_klasis, function(i, item){
          totalKlasis++;
          console.log('klasis muter');
          html='<div class="col-md-4 col-sm-4 col-xs-12" >'+
                '<div class="x_panel tile" >'+
                  '<div class="x_title">'+
                    '<h2>Aset di <b>'+item.name+'</b></h2>'+
                    '<div class="clearfix"></div>'+
                  '</div>'+
                  '<div class="x_content" id="x_content_aset_jemaatperklasis'+item.id+'" style="height: 600px;">'+
                  '</div>'+
                '</div>'+
              '</div>';
          if(item.name != null && item.name != ''){
            $('#row_aset_jemaatperklasis').append(html)
          }
        setTimeout(function(){
          console.log('PROSES:', item.name);
          aset_jemaatperklasis(
              json.ls_jemaat[item.id],
              item.id
          );

          selesaiKlasis++;

          console.log('Selesai:', selesaiKlasis, '/', totalKlasis);

          if (selesaiKlasis === totalKlasis) {
              console.log('=== DASHBOARD READY ===');
              window.dashboardReady = true;
              console.log('FLAG SET:', window.dashboardReady);
          }


        }, 500)
           
        })
  		})
  	}

    function aset_klasis(klasis, total_aset){
        content="";
        //console.log('asdasd');
      $.each(klasis, function(index, value){
        bg_bar="bg-green"
        if(parseFloat(value.percentage) == 0){
          bg_bar="bg-red"
        }

        content+='<div class="widget_summary">'
                +'<div class="w_left w_55">'
                  +'<span>'+value.klasis+'</span>'
                +'</div>'
                +'<div class="w_center w_25">'
                  +'<div class="progress">'
                    +'<div class="progress-bar '+bg_bar+'" role="progressbar" aria-valuenow="'+value.num_aset+'" aria-valuemin="0" aria-valuemax="'+total_aset+'" style="width: '+value.percentage+'%;">'
                      +'<span class="sr-only">'+value.percentage+'% Complete</span>'
                    +'</div>'
                  +'</div>'
                +'</div>'
                +'<div class="w_right w_20">'
                  +'<span>'+value.num_aset+'</span>'
                +'</div>'
                +'<div class="clearfix"></div>'
              +'</div>';
      })

      $('#x_content_aset_klasis').html(content)
    }


    function aset_jemaatperklasis(ls_jemaat, klasis_id){
        content="";
      $.each(ls_jemaat, function(index, value){
        console.log(value);
        bg_bar="bg-green"
        if(parseFloat(value.percentage_aset) == 0){
          bg_bar="bg-red"
        }

        content+='<div class="widget_summary">'
                +'<div class="w_left w_55">'
                  +'<span>'+value.name+'</span>'
                +'</div>'
                +'<div class="w_center w_25">'
                  +'<div class="progress">'
                    +'<div class="progress-bar '+bg_bar+'" role="progressbar" aria-valuenow="'+value.num_aset+'" aria-valuemin="0" aria-valuemax="'+value.num_aset_klasis+'" style="width: '+value.percentage_aset+'%;">'
                      +'<span class="sr-only">'+value.percentage_aset+'% Complete</span>'
                    +'</div>'
                  +'</div>'
                +'</div>'
                +'<div class="w_right w_20">'
                  +'<span>'+value.num_aset+'</span>'
                +'</div>'
                +'<div class="clearfix"></div>'
              +'</div>';
      })

      $('#x_content_aset_jemaatperklasis'+klasis_id).html(content)
    }
</script>