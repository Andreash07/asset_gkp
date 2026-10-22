  	<div class="row">
    	<div class="col-xs-12">
  			<div class="x_panel">
  				<a href="#!" class="btn btn-warning pull-right" onclick="event.preventDefault();" data-dismiss="modal" >Kembali</a>
        		<div class="x_title">
          			<h4 class="">Perbarui - Aset GKP</h4>
        		</div>
        		<div class="x_content">
        			<form class="form-horizontal form-label-left"method="POST">
        				<?php 
    					$recid=0;
        				foreach ($data as $key => $value) {
        					# code...
        					$lat=$value->langtitude;
        					$long=$value->longtitude;
        					$recid=$value->id;
        				?>
        				<input type="hidden" name="lat" id="lat" value="<?=$lat;?>">
        				<input type="hidden" name="lng" id="lng"  value="<?=$long;?>">
        				<div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				            	ID
				          	</label>
				          	<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" disabled="disabled" value="<?=$value->id;?>" placeholder="Auto">
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Jemaat Pengelola Aset
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<select name="jemaat_pengelola" class="form-control" disabled>
				            	<?php
				            	foreach ($jemaat as $key1 => $value1) {
				            		# code...
				            		$selected="";
				            		if($value->jemaat_id == $value1->id){
		          						$selected="selected";
		          					}
				            	?>
				            		<option <?=$selected;?> value="<?=$value1->id;?>"><?=$value1->CompName;?></option>
				            	<?php
				            	}
				            	?>
			          			</select>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Nama Aset
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" placeholder="ex: Rumah Pastori  I" name="peruntukan_tanah" value="<?=$value->peruntukan_tanah;?>" disabled>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Kategori Atas Nama
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<select class="form-control" name="kategori_atas_nama" disabled>
			          				<?php 
			          					$hide_text="disabled";
			          					foreach ($kategori_kepemilikan as $key2 => $value2) {
			          						# code...
				          					$selected="";
				          					if($value->kategori_atas_nama == $value2->id){
				          						$selected="selected";
				          						if(in_array(strtolower($value2->name), array('pribadi','negara', 'mitra','badan pelayanan gkp'))){
				          							$hide_text="";
				          						}
				          					}
			          				?>
			          						<option <?=$selected;?> value="<?=$value2->id;?>"><?=$value2->name;?></option>
			          				<?php 
			          					}
			          				?>
			          			</select>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Atas Nama
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" id="autocomplete-custom-append" name="atas_nama" value="<?=$value->atas_nama;?>" placeholder="YPTK/YBRS/GPIB/GKI/TNI/Pemprov/dll" disabled>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Jenis Dokumen Kepemilikan">
				          		Jenis Dokumen
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<select class="form-control" name="jenis_dokumen_kepemilikan" title="Jenis Dokumen Kepemilikan" disabled>
			          				<?php 
			          				foreach ($jenis_dokumen_kepemilikan as $key1 => $value1) {
			          					# code...
			          					$selected="";
			          					if($value->jenis_dokumen_kepemilikan== $value1->id){
			          						$selected="selected";
			          					}
		          					?>
		          						<option <?=$selected;?> value="<?=$value1->id;?>"><?=$value1->name;?></option>
	          						<?php
			          				}
			          				?>
			          			</select>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Jenis Status Kepelimikan
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<select class="form-control" name="status_hak_milik" title="Jenis Dokumen Kepemilikan" disabled>
			          				<?php 
			          				foreach ($jenis_hak_milik as $key1 => $value1) {
			          					# code...
			          					$selected="";
			          					if($value->status_hak_milik== $value1->id){
			          						$selected="selected";
			          					}
		          					?>
		          						<option <?=$selected;?> value="<?=$value1->id;?>"><?=$value1->name;?></option>
	          						<?php
			          				}
			          				?>
			          			</select>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		No. Dokumen
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" placeholder="Nomor Dokumen Kepemilikan" name="no_dokumen" value="<?=$value->no_dokumen;?>" disabled>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Luas (M2)
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" placeholder="ex: 756" name="luas" value="<?=$value->luas;?>" disabled>
				          	</div>
				        </div>
				        <div class="form-group">
				        	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Lokasi Penempatan Sertifikat">
				          		Lokasi Berkas?
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<select name="sts_sertifikat_disinode" class="form-control" disabled>
			          				<!--<option value="1" <?php if($value->sts_sertifikat_disinode=='1'){ echo "selected"; } ?> >Ya</option>
			          				<option value="2" <?php if($value->sts_sertifikat_disinode=='2'){ echo "selected"; } ?> >Tidak</option>
			          				<option value="0" <?php if($value->sts_sertifikat_disinode=='0'){ echo "selected"; } ?> >Belum Diketahui</option>-->

			          				<option value="1" <?php if($value->sts_sertifikat_disinode=='1'){ echo "selected"; } ?>>Sinode</option>
			          				<option value="2" <?php if($value->sts_sertifikat_disinode=='2'){ echo "selected"; } ?>>Badan Pelayanan GKP</option>
			          				<option value="3" <?php if($value->sts_sertifikat_disinode=='3'){ echo "selected"; } ?>>Jemaat</option>
			          				<option value="0" <?php if($value->sts_sertifikat_disinode=='0'){ echo "selected"; } ?>>Tidak diketahui</option>
			          			</select>
			          		</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Lokasi Penempatan Sertifikat">
				          		Keterangan
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<textarea class="form-control" placeholder="Lokasi Penempatan Sertifikat" title="Lokasi Penempatan Sertifikat" name="keterangan" rows="5" disabled><?=$value->keterangan;?></textarea>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Catatan
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<textarea class="form-control" placeholder="Catatan" name="catatan" rows="5" disabled><?=$value->catatan;?></textarea>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Alamat Lokasi sesuai Dokumen Kepemilikan">
				          		Alamat Lokasi
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<textarea title="Alamat Lokasi sesuai Dokumen Kepemilikan" class="form-control" placeholder="Alamat Lokasi sesuai Dokumen Kepemilikan" name="alamat_lokasi" rows="5" disabled><?=$value->alamat_lokasi;?></textarea>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Google Maps
				          		<span class="required">*</span>
				          	</label>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          	</label>
				        	<div class="col-md-9 col-sm-9 col-xs-12">
								<div id="map" style="height:250px"></div><br>
				          	</div>
				        </div>

				        <div class="form-group col-md-3 col-xs-12 pull-right bg-danger" style="padding-top:5px; padding-bottom:5px; ">
			          		<!--<div class="col-xs-12 text-right">
			          			<a class="btn btn-warning" id="btn_disagree" onclick="event.preventDefault();" auth="<?=md5('j12khe79BK1&*('.$recid);?>">Tidak Disetujui</a>
			          			<a class="btn btn-success" id="btn_agree" onclick="event.preventDefault();" auth="<?=md5('GAHdg2890!^%'.$recid);?>">Setujui <i class="fa fa-check-square"></i></a>
				          	</div>-->
				          	<select name="approve_asset<?=$value->id;?>" id="approve_asset<?=$value->id;?>" class="form-control " token="<?=md5('asek21gjhd!^d'.$value->id);?>" old="<?=$value->approved;?>">
		                        <option value="0" style="color: gray;" <?php if($value->approved=='0'){ echo "selected" ;}?>>Belum Disetujui</option>
		                        <option value="1" style="color: green;" <?php if($value->approved=='1'){ echo "selected" ;}?>>Disetujui</option>
		                        <option value="2" style="color: red;" <?php if($value->approved=='2'){ echo "selected" ;}?>>Tidak Disetujui</option>
		                        <option value="3" style="color: orange;" <?php if($value->approved=='3'){ echo "selected" ;}?> disabled>Perubahan Data</option>
		                      </select>
				        </div>
				        <script>
				        	let previousValueSts = "<?=$value->approved;?>";
				        	console.log(previousValueSts)
				        </script>
        				<?php 
        				}
        				?>
        			</form>
        		</div>
    		</div>
		</div>
	</div>
<script>
var marker;
var map;
var autocompleteMap;

function initMap() {

    const lokasi = {
        lat: Number('<?=$lat;?>'),
        lng: Number('<?=$long;?>')
    };
    //alert('<?=$lat;?>, <?=$long;?>')
    map = new google.maps.Map(
        document.getElementById("map"), {
            zoom: 17,
            center: lokasi
        }
    );

    marker = new google.maps.Marker({
        position: lokasi,
        map: map,
        draggable: false
    });
}

</script>


<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqPHsLQcjob80TLNC2egJKVxPLbPxU9wg&libraries=places&callback=initMap&version=<?=microtime();?>">
</script> <!-- api mikgoogle -->