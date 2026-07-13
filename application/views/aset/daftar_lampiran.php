<h4 style="margin: unset;"> Daftar Lampiran</h4>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th class="text-center" style="width: 50%;">File</th>
			<th class="text-center">Akses</th>
			<th class="text-center"></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($lampiran as $key => $value) {
				// code...
				$name=$value->name;
				if($value->name == ''){
					$name=$value->file_name;
				}

				$uniq=bin2hex(gzdeflate($value->id, 9));

		?>
				<tr>
					<th style="width: 55%;" id="td_att_<?=$uniq;?>"><?=$name;?></th>
					<th style="width: 25%;">
						<select class="form-control" id="akses_lampiran<?=$uniq;?>" recid="<?=md5($value->id);?>">
							<option style="color: green;" value="1" <?php if($value->private=='1'){ echo "selected"; }?>>Privat</option>
							<option style="color: red;" value="0" <?php if($value->private=='0'){ echo "selected"; }?>>Publik</option>
						</select>
					</th>
					<th>
						<button class="btn btn-warning btn-xs" title="Ubah Nama" id="btn-rename-att<?=$uniq;?>" uniqid="<?=$uniq;?>" recid="<?=md5($value->id);?>" value="<?=$name;?>" ><i class="fa fa-pencil"></i></button>
						<button class="btn btn-danger btn-xs pull-right" title="Hapus Lampiran" id="btn-delete-att<?=$uniq;?>" ><i class="fa fa-trash"></i></button>
					</th>
				</tr>
		<?php
			}

			if(count($lampiran)==0){
		?>
				<tr>
					<th colspan="2" class="text-center">Tidak ada lampiran!</th>
				</tr>
		<?php
			}
		?>
	</tbody>
</table>