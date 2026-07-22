<?php
$this->load->view('layout/header');
?>
<div class="right_col" role="main">
  	<div class="row">
    	<div class="col-xs-12">
  			<div class="x_panel">
        		<div class="x_title">
          			<h4 class="">Tambah - User</h4>
        		</div>
        		<div class="x_content">
        			<form class="form-horizontal form-label-left" action="<?=base_url();?>administrator/users/simpan" method="POST">
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
				          		Nama Depan
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" placeholder="Sutono" name="firstname" value="" required>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Nama Belakang
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" placeholder="Budiman" name="lastname" value="">
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Jenis Kelamin
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<select name="gender" class="form-control" required>
			          				<option value="1">Pria</option>
			          				<option value="2">Wanita</option>
			          			</select>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Nama Pengguna
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="text" class="form-control" placeholder="Masukan Nama Pengguna. Contoh: tono.bandung" name="username" value="">
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Password">
				          		Kata Sandi
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<input type="password" name="amjsdhalksdnlk" id="amjsdhalksdnlk" class="form-control" placeholder="Masukan Kata Sandi!" value="">
				          	</div>
				        </div>
				        <div class="form-group">
				          	<label class="control-label col-md-3 col-sm-3 col-xs-12">
				          		Konfirmasi Kata Sandi
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
				            	<input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" name="jashdkabm2q1ui33hi" value="">
				          	</div>
				        </div>
				        <div class="form-group">
				        	<label class="control-label col-md-3 col-sm-3 col-xs-12" title="Lokasi Penempatan Sertifikat">
				          		Status Akun
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-9 col-sm-9 col-xs-12">
			          			<select name="status" class="form-control">
			          				<option value="1">Aktif</option>
			          				<option value="0">Tidak Aktif</option>
			          			</select>
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