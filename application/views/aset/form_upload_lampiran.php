<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel"><b><?=$nama_asset;?></b> - Lampiran (Berkas/Foto Aset/dll)</h4>
</div>
<div class="modal-body" style="max-height:450px; overflow: auto;" id="div_modal_body_content">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<form class="dropzone" id="uploadzone1" asdsa#enctype="multipart/form-data" >
			<input type="hidden" name="nama_asset" disabled="" value="<?=$nama_asset;?>" class="form-control">
			<input type="hidden" id="token_aset_lampiran" name="token" disabled="" value="<?=$token;?>" class="form-control">
  		<input type="hidden" value="upload" name="action">
  	</form>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12" id="div_daftar_lampiran">
		<div class="text-center col-xs-12">
      <i class="fa fa-circle-o-notch fa-spin fa-2x" style="margin-top:10%; " aria-hidden="true" ></i><br>
      Memuat Data ...
    </div>
	</div>
</div>
<div class="modal-footer">
  <button class="btn btn-default" data-dismiss="modal">Keluar</button>
</div>

<script type="text/javascript">
  $("#uploadzone1").dropzone({ 
    url: "<?=base_url();?>aset/upload_lampiran",
    uploadMultiple: false,
    maxFilesize: 6,
    acceptedFiles: '.pdf, image/png, image/jpg, image/jpeg'

  });
</script>
