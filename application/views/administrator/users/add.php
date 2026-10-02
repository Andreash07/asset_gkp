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
$(document).ready(function() {
    $('select').select2();
});

</script>