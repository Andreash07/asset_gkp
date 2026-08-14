<?php
$this->load->view('layout/header');
?>
<div class="right_col" role="main">
  	<div class="row">
    	<div class="col-xs-12">
  			<div class="x_panel">
        		<div class="x_title">
          			<h4 class="">Perbarui - Aset GKP</h4>
        		</div>
        		<div class="x_content">
        			<form class="form-horizontal form-label-left" action="<?=base_url();?>aset/perbarui" method="POST">
        				<?php 
        				foreach ($data as $key => $value) {
        					# code...
        					$lat=$value->langtitude;
        					$long=$value->longtitude;
        				?>
        				<input type="hidden" name="lat" id="lat" value="<?=$lat;?>">
        				<input type="hidden" name="lng" id="lng"  value="<?=$long;?>">
        				<input type="hidden" name="recid" id="recid"  value="<?=$value->id;?>">
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
				          		Nama Aset
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" placeholder="ex: Rumah Pastori  I" name="peruntukan_tanah" value="<?=$value->peruntukan_tanah;?>">
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Jemaat Pengelola Aset
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<select name="jemaat_pengelola" class="form-control">
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
				          		Kategori Atas Nama
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<select class="form-control" name="kategori_atas_nama">
			          				<?php 
			          					$hide_text="display: none;";
			          					foreach ($kategori_kepemilikan as $key2 => $value2) {
			          						# code...
				          					$selected="";
				          					if($value->kategori_atas_nama == $value2->id){
				          						$selected="selected";
				          						if(in_array(strtolower($value2->name), array('pribadi','negara', 'mitra','badan pelayanan gkp'))){
				          							$hide_text="display: show;";
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
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" id="autocomplete-custom-append" name="atas_nama" value="<?=$value->atas_nama;?>" placeholder="YPTK/YBRS/GPIB/GKI/TNI/Pemprov/dll">
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Jenis Dokumen Kepemilikan">
				          		Jenis Dokumen
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<select class="form-control" name="jenis_dokumen_kepemilikan" title="Jenis Dokumen Kepemilikan">
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
			          			<select class="form-control" name="status_hak_milik" title="Jenis Dokumen Kepemilikan">
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
				            	<input type="text" class="form-control" placeholder="Nomor Dokumen Kepemilikan" name="no_dokumen" value="<?=$value->no_dokumen;?>">
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Luas (M2)
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" placeholder="ex: 756" name="luas" value="<?=$value->luas;?>">
				          	</div>
				        </div>
				        <div class="form-group">
				        	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Lokasi Penempatan Sertifikat">
				          		Lokasi Berkas di Sinode?
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<select name="sts_sertifikat_disinode" class="form-control">
			          				<option value="1" <?php if($value->sts_sertifikat_disinode=='1'){ echo "selected"; } ?> >Ya</option>
			          				<option value="2" <?php if($value->sts_sertifikat_disinode=='2'){ echo "selected"; } ?> >Tidak</option>
			          				<option value="0" <?php if($value->sts_sertifikat_disinode=='0'){ echo "selected"; } ?> >Belum Diketahui</option>
			          			</select>
			          		</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Lokasi Penempatan Sertifikat">
				          		Keterangan
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<textarea class="form-control" placeholder="Lokasi Penempatan Sertifikat" title="Lokasi Penempatan Sertifikat" name="keterangan" rows="5"><?=$value->keterangan;?></textarea>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Catatan
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<textarea class="form-control" placeholder="Catatan" name="catatan" rows="5"><?=$value->catatan;?></textarea>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Alamat Lokasi sesuai Dokumen Kepemilikan">
				          		Alamat Lokasi
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<textarea title="Alamat Lokasi sesuai Dokumen Kepemilikan" class="form-control" placeholder="Alamat Lokasi sesuai Dokumen Kepemilikan" name="alamat_lokasi" rows="5"><?=$value->alamat_lokasi;?></textarea>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Google Maps
				          		<span class="required">*</span>
				          	</label>
				          	<div class="col-md-6 col-sm-6 col-xs-8">
				        		<input type="text" id="searchAlamat" placeholder="Cari alamat..." instyle="width:400px;height:35px;padding:5px;" class="form-control col-md-8 col-xs-6">
				        		<label class="label label-danger" id="id_label_change" style="display: none;">Klik tombol "<b>Ambil Titik</b>" jika akan memperbaruhi titik peta!</label>
				          	</div>
				          	<div class="col-md-3 col-sm-3 col-xs-4">
				        		<div class="btn btn-warning btn-xs" title="Ubah Titik Lokasi" id="ambil_titik_lokasi" onclick="ambilLokasi();">Ambil Titik</div>
				        	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          	</label>
				        	<div class="col-md-9 col-sm-9 col-xs-12">
								<div id="map" style="height:250px"></div><br>
				          	</div>
				        </div>

				        <div class="form-group">
			          		<div class="col-xs-12 text-right">
			          			<a href="<?=base_url();?>aset/" class="btn btn-warning">Batalkan</a>
			          			<button type="submit" class="btn btn-success">Simpan</button>
				          	</div>
				        </div>
        				<?php 
        				}
        				?>
        			</form>
        		</div>
    		</div>
		</div>
	</div>
</div>
<?php
$this->load->view('layout/footer');
?>
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
        draggable: true
    });

    // autocomplete search
    autocompleteMap = new google.maps.places.Autocomplete(
        document.getElementById('searchAlamat')
    );

    // batasi ke indonesia (optional)
    autocompleteMap.setComponentRestrictions({
        country: ["id"]
    });

    autocompleteMap.addListener('place_changed', function() {

        var place = autocompleteMap.getPlace();

        if (!place.geometry)
            return;

        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();

        map.setCenter({
            lat: lat,
            lng: lng
        });

        map.setZoom(17);

        marker.setPosition({
            lat: lat,
            lng: lng
        });

        $('#id_label_change').show();

        //document.getElementById('lat').value = lat;
        //document.getElementById('lng').value = lng;
    });

    // drag marker
    marker.addListener('dragend', function(e) {
        //document.getElementById('lat').value =            e.latLng.lat();

        //document.getElementById('lng').value =            e.latLng.lng();
        $('#id_label_change').show();
    });

    // klik map
    map.addListener('click', function(e) {

        marker.setPosition(e.latLng);

        //document.getElementById('lat').value =            e.latLng.lat();

        //document.getElementById('lng').value =            e.latLng.lng();
    });
}

// tombol ambil lokasi
function ambilLokasi() {

    var posisi = marker.getPosition();

    var lat = posisi.lat();
    var lng = posisi.lng();

    console.log("Latitude :", lat);
    console.log("Longitude:", lng);

    // isi ke form
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;

    //alert('Lat: ' + lat + '\nLng: ' + lng);
    $('#id_label_change').hide();
}

	
	$(document).on('change blur','[name=kategori_atas_nama]', function(){
		val=$(this).val().toLowerCase()
		//const text_show = ["mitra", "negara", "badan pelayanan gkp", "pribadi"];
		const text_show = ["3", "4", "5", "7"];
		if(text_show.includes(val) == true){
			//$('#autocomplete-custom-append').show()
		}
		else{
			//$('#autocomplete-custom-append').val('')			
			//$('#autocomplete-custom-append').hide()			
		}
	})
	kategori_atas_nama_text=$.parseJSON('<?= json_encode($kategori_atas_nama_text, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT );?>')
	$('#autocomplete-custom-append').autocomplete({
		minChars: 1,
		lookup: kategori_atas_nama_text
	});

$(document).ready(function() {
    $('select').select2();
});

</script>


<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqPHsLQcjob80TLNC2egJKVxPLbPxU9wg&libraries=places&callback=initMap&version=<?=microtime();?>">
</script> <!-- api mikgoogle -->