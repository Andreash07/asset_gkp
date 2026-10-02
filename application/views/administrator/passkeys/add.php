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
        			<form class="form-horizontal form-label-left" action="<?=base_url();?>administrator/passkeys/simpan" method="POST">
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
				          		Passkey
				          		<span class="required">*</span>
				          	</label>
			          		<div class="col-md-6 col-sm-6 col-xs-9">
				            	<input type="text" class="form-control" placeholder="Ash^Md#7" name="aljsdhaklsdamn11238" id="passkey" value="" required>
				          	</div>
			          		<div class="col-md-3 col-sm-3 col-xs-3">
				            	<a href="#!" class="btn btn-warning" id="btnGeneratePasskey">Generate</a>
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
	$('#btnGeneratePasskey').on('click', function() {

    var btn = $(this);

    btn.prop('disabled', true);

    $.ajax({
        url: '<?= base_url("passkey/generator"); ?>',
        type: 'POST',
        dataType: 'json',

        success: function(res) {

            if (res.status) {
                $('#passkey').val(res.passkey);
            }

        },

        complete: function() {
            btn.prop('disabled', false);
        }
    });

});
</script>