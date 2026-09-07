<form class="form-horizontal form-label-left" action="" method="GET">

    <div class="form-group col-md-4 col-xs-12">

      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Asset</label>

	  	<div class="col-md-9 col-sm-9 col-xs-12">

	        <input type="text" class="form-control" name="keyword" value="<?=rawurldecode($this->input->get('keyword'));?>">

	  	</div>

    </div>

    <div class="form-group col-md-4 col-xs-12">

        <label class="control-label col-md-6 col-sm-6 col-xs-12">Pengelola Aset

        </label>

	  	<div class="col-md-6 col-sm-6 col-xs-12">

	      	<select class="form-control" id="pengelola" name="pengelola">

	          	<option value='' >Semua</option>
              <?php 
                foreach ($pengelola_aset as $key => $value) {
                  // code...
              ?>
                <option value='<?=$value->id;?>' <?php if($this->input->get('pengelola') == $value->id){ echo "selected";}?> ><?=$value->CompName;?></option>
              <?php 
                }
              ?>
	        </select>

	    </div>

    </div>

    <div class="form-group col-md-4 col-xs-12">

    	<label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Dokumen</label>

    	<div class="col-md-9 col-sm-9 col-xs-12">

          <select class="form-control" id="jenis_dokumen" name="jenis_dokumen" >

            <option value='' >Semua</option>

            <?php 
                foreach ($jenis_dokumen_kepemilikan as $key => $value) {
                  // code...
            ?>
              <option value='<?=$value->id;?>' <?php if($this->input->get('jenis_dokumen') == $value->id){ echo "selected";}?>  ><?=$value->name;?></option>
            <?php 
              }
            ?>

          </select>

    	</div>

    </div>

    <div class="form-group col-xs-12">

      <a style="display: none;" class="btn btn-warning pull-left" href="<?=base_url().$this->uri->segment(1).'?'.$_SERVER['QUERY_STRING'];?>&action=print" target="_BLANK"><i class="fa fa-print"></i>&nbsp;&nbsp;Print</a>

    	<input type="submit" class="btn btn-primary pull-right" value="Cari" name="search">
      <a class="btn btn-success pull-right" href="<?=base_url();?>aset/add">Tambah Data Aset</a>

    </div>

</form>