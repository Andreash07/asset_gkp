<?php
$this->load->view('layout/header');
?>
<div class="right_col" role="main">
  	<div class="row">
    	<div class="col-xs-12">
  			<div class="x_panel">
        		<div class="x_title">
          			<h4 class="">Tambah - Aset GKP</h4>
        		</div>
        		<div class="x_content">
        			<form class="form-horizontal form-label-left" action="<?=base_url();?>aset/simpan" method="POST">
        				<input type="hidden" value="" name="lat" id="lat" value="">
        				<input type="hidden" value="" name="lng" id="lng"  value="">
        				<input type="hidden" name="recid" id="recid"  value="">
        				<div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				            	ID
				          	</label>
				          	<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" disabled="disabled" value="" placeholder="Auto">
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Nama Aset
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" placeholder="ex: Rumah Pastori  I" name="peruntukan_tanah" value="">
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
				            	?>
				            		<option value="<?=$value1->id;?>"><?=$value1->CompName;?></option>
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
				            	<input type="text" class="form-control" placeholder="Atas Nama Aset secara Administrasi" name="atas_nama" value="">
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Kategori Atas Nama Kepemilikan">
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
				          					if($value2->id== '1'){
				          						$selected="selected";
				          					}
			          				?>
			          						<option <?=$selected;?> value="<?=$value2->id;?>"><?=$value2->name;?></option>
			          				<?php 
			          					}
			          				?>
			          			</select>
			          			<input type="text" name="kategori_atas_nama_text" id="autocomplete-custom-append" class="form-control" style="<?=$hide_text;?>" placeholder="YPTK/YBRS/GPIB/GKI/TNI/Pemprov/dll" value="">
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
			          					if($value1->id== '1'){
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
			          					if($value1->id== '1'){
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
				            	<input type="text" class="form-control" placeholder="Nomor Dokumen Kepemilikan" name="no_dokumen" value="">
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Luas (M2)
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" placeholder="ex: 756" name="luas" value="">
				          	</div>
				        </div>
				        <div class="form-group">
				        	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Lokasi Penempatan Sertifikat">
				          		Lokasi Berkas di Sinode?
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<select name="sts_sertifikat_disinode" class="form-control">
			          				<option value="1">Ya</option>
			          				<option value="2">Tidak</option>
			          				<option value="0">Belum Diketahui</option>
			          			</select>
			          		</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Lokasi Penempatan Sertifikat">
				          		Keterangan
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<textarea class="form-control" placeholder="Lokasi Penempatan Sertifikat" title="Lokasi Penempatan Sertifikat" name="keterangan" rows="5"></textarea>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Catatan
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<textarea class="form-control" placeholder="Catatan" name="catatan" rows="5"></textarea>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Alamat Lokasi sesuai Dokumen Kepemilikan">
				          		Alamat Lokasi
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<textarea class="form-control" placeholder="Alamat Lokasi sesuai Dokumen Kepemilikan" title="Alamat Lokasi sesuai Dokumen Kepemilikan" name="alamat_lokasi" rows="5"></textarea>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Google Maps
				          		<span class="required">*</span>
				          	</label>
				          	<div class="col-md-6 col-sm-6 col-xs-8">
				        		<input type="text" id="searchAlamat" placeholder="Cari alamat..." instyle="width:400px;height:35px;padding:5px;" class="form-control col-md-8 col-xs-6">
				        		<label class="label label-danger" id="id_label_change">Klik tombol "<b>Ambil Titik</b>" jika ingein memperbaruhi!</label>
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
			          			<button type="submit" class="btn btn-warning" id="btn_submit">Simpan</button>
				          	</div>
				        </div>
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
        lat: Number('-6.929466831048272'),
        lng: Number('107.6057945835176')
    };
    //alert('-6.929466831048272, 107.6057945835176')
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

    // autocompleteMap search
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

        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
    });

    // drag marker
    marker.addListener('dragend', function(e) {
        document.getElementById('lat').value =
            e.latLng.lat();

        document.getElementById('lng').value =
            e.latLng.lng();
    });

    // klik map
    map.addListener('click', function(e) {

        marker.setPosition(e.latLng);

        document.getElementById('lat').value =
            e.latLng.lat();

        document.getElementById('lng').value =
            e.latLng.lng();
    });

     marker.addListener('dragend', function(e) {
	    var lat = e.latLng.lat();
	    var lng = e.latLng.lng();

	    $('#lat').val(lat);
	    $('#lng').val(lng);
	    //$('#btn_submit').attr('disabled', 'disabled');
	    //$('#btn_submit').attr('onclick', "alert('Konfirmasi Ambil Titik Peta terbaru!')");
	    $('#id_label_change').show();
	    console.log('Marker berubah');
	    console.log(lat, lng);
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

    //$('#btn_submit').removeAttr('disabled');
    //$('#btn_submit').removeAttr('onclick');
    $('#id_label_change').hide();
    //alert('Lat: ' + lat + '\nLng: ' + lng);
}



$(document).on('change blur','[name=kategori_atas_nama]', function(){
		val=$(this).val().toLowerCase()
		//const text_show = ["mitra", "negara", "badan pelayanan gkp", "pribadi"];
		const text_show = ["3", "4", "5", "7"];
		if(text_show.includes(val) == true){
			$('#autocomplete-custom-append').show()
		}
		else{
			$('#autocomplete-custom-append').val('')			
			$('#autocomplete-custom-append').hide()			
		}
	})
	kategori_atas_nama_text=$.parseJSON('<?= json_encode($kategori_atas_nama_text, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);?>')
	$('#autocomplete-custom-append').autocomplete({
		minChars: 1,
		lookup: kategori_atas_nama_text
	});


$(document).ready(function() {
    $('select').select2();
});

</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhgXYI0RimdQgc9ZBbyQqzSdYSTo4YnwY&libraries=places&callback=initMap&version=<?=microtime();?>">
</script>