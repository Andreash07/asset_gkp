<?php
$this->load->view('layout/header');
?>
<div class="right_col" role="main">
 	<!-- top tiles -->
  	<div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Aset</span>
          <div class="count green"><?=$total_aset;?></div>
          <!--<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-clock-o"></i> Total Luas (m²)</span>
          <div class="count green"><?=$total_luas_tanah;?> </div>
          <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Atas Nama Sinode</span>
          <div class="count"><?=$data_kepemilikan['Sinode GKP']; ?></div>
          <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Atas Nama Jemaat</span>
          <div class="count"><?=$data_kepemilikan['Jemaat GKP']; ?></div>
          <!--<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Aset Bersertifikat</span>
          <div class="count"><?=$sertipikat;?></div>
          <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Belum Bersertifikat</span>
          <div class="count"><?=$non_sertipikat;?></div>
          <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
        </div>
  	</div>
  	<!-- /top tiles -->

  	<div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12">
    		<div class="x_panel tile fixed_height_390">
            <div class="x_title">
	          	<h2>Status Legalitas</h2>
	          	<ul class="nav navbar-right panel_toolbox">
	                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	                </li>
	                <li class="dropdown">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
	                  <ul class="dropdown-menu" role="menu">
	                    <li><a href="#">Settings 1</a>
	                    </li>
	                    <li><a href="#">Settings 2</a>
	                    </li>
	                  </ul>
	                </li>
	                <li><a class="close-link"><i class="fa fa-close"></i></a>
	                </li>
	          	</ul>
	          	<div class="clearfix"></div>
            </div>
            <div class="x_content">
              <?php 
                foreach ($jenis_dokumen_kepemilikan as $key => $value) {
                  // code...

                $percentage=0;
                if(isset($ls_jenis_dokumen_kepemilikan[$value->id])){
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
                    <div class="w_left w_25">
                      <span><?=$value->name;?></span>
                    </div>
                    <div class="w_center w_55">
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
          	<ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
          	</ul>
          	<div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php 
              foreach ($jenis_hak_milik as $key => $value) {
                // code...
                $percentage=0;
                $percentage=$value->total_aset/$total_aset*100;

                $bg_bar='bg-green';
                if($percentage ==0){
                  $bg_bar='bg-red';
                }
            ?>
              <div class="widget_summary">
                <div class="w_left w_25">
                  <span><?=$value->jenis_hak_milik;?></span>
                </div>
                <div class="w_center w_55">
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
          	<ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
          	</ul>
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
	              <div class="w_left w_25">
	                <span><?=$value;?></span>
	              </div>
	              <div class="w_center w_55">
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
	          	<ul class="nav navbar-right panel_toolbox">
	                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	                </li>
	                <li class="dropdown">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
	                  <ul class="dropdown-menu" role="menu">
	                    <li><a href="#">Settings 1</a>
	                    </li>
	                    <li><a href="#">Settings 2</a>
	                    </li>
	                  </ul>
	                </li>
	                <li><a class="close-link"><i class="fa fa-close"></i></a>
	                </li>
	          	</ul>
	          	<div class="clearfix"></div>
            </div>
            <div class="x_content" id="x_content_aset_klasis">
	          	
              	<div class="widget_summary">
	                <div class="w_left w_25">
	                  <span>Klasis Bogor</span>
	                </div>
	                <div class="w_center w_55">
	                  <div class="progress">
	                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
	                      <span class="sr-only">60% Complete</span>
	                    </div>
	                  </div>
	                </div>
	                <div class="w_right w_20">
	                  <span>23k</span>
	                </div>
	                <div class="clearfix"></div>
              	</div>
              	<div class="widget_summary">
	                <div class="w_left w_25">
	                  <span>Klasis Cirebon</span>
	                </div>
	                <div class="w_center w_55">
	                  <div class="progress">
	                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
	                      <span class="sr-only">60% Complete</span>
	                    </div>
	                  </div>
	                </div>
	                <div class="w_right w_20">
	                  <span>3k</span>
	                </div>
	                <div class="clearfix"></div>
              	</div>
              	<div class="widget_summary">
	                <div class="w_left w_25">
	                  <span>Klasis Jakarta</span>
	                </div>
	                <div class="w_center w_55">
	                  <div class="progress">
	                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
	                      <span class="sr-only">60% Complete</span>
	                    </div>
	                  </div>
	                </div>
	                <div class="w_right w_20">
	                  <span>1k</span>
	                </div>
	                <div class="clearfix"></div>
              	</div>
              	<div class="widget_summary">
	                <div class="w_left w_25">
	                  <span>Klasis Priangan</span>
	                </div>
	                <div class="w_center w_55">
	                  <div class="progress">
	                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
	                      <span class="sr-only">60% Complete</span>
	                    </div>
	                  </div>
	                </div>
	                <div class="w_right w_20">
	                  <span>1k</span>
	                </div>
	                <div class="clearfix"></div>
              	</div>
              	<div class="widget_summary">
	                <div class="w_left w_25">
	                  <span>Klasis Purwakarta</span>
	                </div>
	                <div class="w_center w_55">
	                  <div class="progress">
	                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
	                      <span class="sr-only">60% Complete</span>
	                    </div>
	                  </div>
	                </div>
	                <div class="w_right w_20">
	                  <span>1k</span>
	                </div>
	                <div class="clearfix"></div>
              	</div>
            </div>
      	</div>
      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">
      	<div class="x_panel tile fixed_height_390">
          <div class="x_title">
            	<h2>Aset per Jemaat GKP</h2>
            	<div class="clearfix"></div>
          </div>
      		<div class="x_content">
      			<div id="mainb" style="height:350px;"><i class="fa fa-circle-o-notch fa-spin fa-4x" style="margin-left:40%;"></i></div>
          </div>
    		</div>
      </div>
    </div>
</div>


<?php
$this->load->view('layout/footer');
?>
<!-- ECharts -->

<script src="<?=base_url();?>vendors/echarts/dist/echarts.min.js"></script>

<script src="<?=base_url();?>vendors/echarts/map/js/world.js"></script>

<script>
		var theme = {

		  	color: [

				  '#26B99A', '#34495E', '#BDC3C7', '#3498DB',

				  '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'

		  	],



		  	title: {

				  itemGap: 8,

				  textStyle: {

					  fontWeight: 'normal',

					  color: '#408829'

				  }

		  	},



			  dataRange: {

				  color: ['#1f610a', '#97b58d']

			  },



			  toolbox: {

				  color: ['#408829', '#408829', '#408829', '#408829']

			  },



			  tooltip: {

				  backgroundColor: 'rgba(0,0,0,0.5)',

				  axisPointer: {

					  type: 'line',

					  lineStyle: {

						  color: '#408829',

						  type: 'dashed'

					  },

					  crossStyle: {

						  color: '#408829'

					  },

					  shadowStyle: {

						  color: 'rgba(200,200,200,0.3)'

					  }

				  }

			  },



			  dataZoom: {

				  dataBackgroundColor: '#eee',

				  fillerColor: 'rgba(64,136,41,0.2)',

				  handleColor: '#408829'

			  },

			  grid: {

				  borderWidth: 0,
          left: 60,
    right: 20,
    top: 30,
    height: 200,
    //containLabel: true

			  },



			  categoryAxis: {

				  axisLine: {

					  lineStyle: {

						  color: '#408829'

					  }

				  },

				  splitLine: {

					  lineStyle: {

						  color: ['#eee']

					  }

				  }

			  },



			  valueAxis: {

				  axisLine: {

					  lineStyle: {

						  color: '#408829'

					  }

				  },

				  splitArea: {

					  show: true,

					  areaStyle: {

						  color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']

					  }

				  },

				  splitLine: {

					  lineStyle: {

						  color: ['#eee']

					  }

				  }

			  },

			  timeline: {

				  lineStyle: {

					  color: '#408829'

				  },

				  controlStyle: {

					  normal: {color: '#408829'},

					  emphasis: {color: '#408829'}

				  }

			  },



			  k: {

				  itemStyle: {

					  normal: {

						  color: '#68a54a',

						  color0: '#a9cba2',

						  lineStyle: {

							  width: 1,

							  color: '#408829',

							  color0: '#86b379'

						  }

					  }

				  }

			  },

			  map: {

				  itemStyle: {

					  normal: {

						  areaStyle: {

							  color: '#ddd'

						  },

						  label: {

							  textStyle: {

								  color: '#c12e34'

							  }

						  }

					  },

					  emphasis: {

						  areaStyle: {

							  color: '#99d2dd'

						  },

						  label: {

							  textStyle: {

								  color: '#c12e34'

							  }

						  }

					  }

				  }

			  },

			  force: {

				  itemStyle: {

					  normal: {

						  linkStyle: {

							  strokeColor: '#408829'

						  }

					  }

				  }

			  },

			  chord: {

				  padding: 4,

				  itemStyle: {

					  normal: {

						  lineStyle: {

							  width: 1,

							  color: 'rgba(128, 128, 128, 0.5)'

						  },

						  chordStyle: {

							  lineStyle: {

								  width: 1,

								  color: 'rgba(128, 128, 128, 0.5)'

							  }

						  }

					  },

					  emphasis: {

						  lineStyle: {

							  width: 1,

							  color: 'rgba(128, 128, 128, 0.5)'

						  },

						  chordStyle: {

							  lineStyle: {

								  width: 1,

								  color: 'rgba(128, 128, 128, 0.5)'

							  }

						  }

					  }

				  }

			  },

			  gauge: {

				  startAngle: 225,

				  endAngle: -45,

				  axisLine: {

					  show: true,

					  lineStyle: {

						  color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],

						  width: 8

					  }

				  },

				  axisTick: {

					  splitNumber: 10,

					  length: 12,

					  lineStyle: {

						  color: 'auto'

					  }

				  },

				  axisLabel: {

					  textStyle: {

						  color: 'auto'

					  }

				  },

				  splitLine: {

					  length: 18,

					  lineStyle: {

						  color: 'auto'

					  }

				  },

				  pointer: {

					  length: '90%',

					  color: 'auto'

				  },

				  title: {

					  textStyle: {

						  color: '#333'

					  }

				  },

				  detail: {

					  textStyle: {

						  color: 'auto'

					  }

				  }

			  },

			  textStyle: {

				  fontFamily: 'Arial, Verdana, sans-serif'

			  }

		  }

	//echart1()
	function echart1(jemaat, aset_jemaat, num_aset_jemaat, luas_aset_jemaat ){

			if ($('#mainb').length ){

			  	var echartBar = echarts.init(document.getElementById('mainb'), theme);

			  	console.log(jemaat)
          console.log(aset_jemaat)
          console.log(num_aset_jemaat)
          console.log(luas_aset_jemaat)

			  	echartBar.setOption({

					title: {

					 // text: 'Graph title',

					  //subtext: 'Graph Sub-text'

					},

					tooltip: {

					  trigger: 'axis'

					},

					legend: {

					  data: ['Total Aset', 'Total Luas']

					},

					toolbox: {

					  show: false

					},

					calculable: false,

					xAxis: [{

					  type: 'category',

					  data: jemaat,
            axisLabel: {
              interval: 0,
              rotate: 60,
              textStyle: {
                fontSize: 8,
                color: '#666',
                fontFamily: 'Arial',
                fontWeight: 'normal' 
              }
            }
					}],

					yAxis: [{

					  type: 'value'

					}],

					series: [{

					  name: 'Total Aset',

					  type: 'bar',

					  data: num_aset_jemaat,

					  markPoint: {

						data: [{

						  type: 'max',

						  name: 'Terbanyak'

						},

						{

						  type: 'min',

						  name: 'Terendah'

						}]

					  },

					}, {

					  name: 'Total Luas',

					  type: 'bar',

					  data: luas_aset_jemaat,

					  markPoint: {

						data: [{

						  type: 'max',

						  name: 'Terbanyak'

						},

						{

						  type: 'min',

						  name: 'Terendah'

						}]

					  },

					}]

			  	});

			}
			$('#mainb').append('<div class="col-xs-12 text-center"><i class="text-sm text-danger">&nbsp;</div>')

		}

    get_data()

		function get_data(){
			dataMap={}
			$.get('<?=base_url();?>api/dashboard', dataMap, function(data){
        json=$.parseJSON(data)
        echart1(json.jemaat, json.aset_jemaat, json.num_aset_jemaat, json.luas_aset_jemaat)
        aset_klasis(json.klasis, json.total_aset)
			})
		}

    function aset_klasis(klasis, total_aset){
        content="";
        console.log('asdasd');
      $.each(klasis, function(index, value){
        bg_bar="bg-green"
        if(parseFloat(value.percentage) == 0){
          bg_bar="bg-red"
        }

        content+='<div class="widget_summary">'
                +'<div class="w_left w_25">'
                  +'<span>'+value.klasis+'</span>'
                +'</div>'
                +'<div class="w_center w_55">'
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
</script>