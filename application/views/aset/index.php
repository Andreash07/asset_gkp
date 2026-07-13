<?php
$this->load->view('layout/header');
?>
<div class="right_col" role="main">

  <div class="row">

    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h4 class="pull-left">Aset GKP</h4>
          <a class="btn btn-success" href="<?=base_url();?>aset/add">Tambah Data Aset</a>
        </div>
        <div class="x_content table-responsive">
          <table class="table table-striped" id="item_sj">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Aset</th>
                <th>Jemaat/Klasis</th>
                <th>Ringkasan Aset</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i=1;
              foreach ($data as $key => $value) {
                # code...
              ?>
                <tr>
                  <td><?=$i++;?></td>
                  <td>
                    <?=$value->peruntukan_tanah;?><br>
                    <span style="font-size: 12px; line-height: 0.7;">Atas Nama: <b><?=$value->atas_nama;?></b> (<b><?=$value->kategori_atas_nama;?></b>) </span><br>
                    <span style="font-size: 12px;  line-height: 0.7;">Jenis Dokumen : <b><?=$value->jenis_dokumen_kepemilikan;?></b></span><br>
                    <span style="font-size: 12px;  line-height: 0.7;">No Dokumen : <b><?=$value->no_dokumen;?></b></span><br>
                    <span style="font-size: 12px;  line-height: 0.7;">Status Kepelimikan : <b><?=$value->status_hak_milik;?></b></span><br>
                    <span style="font-size: 12px;  line-height: 0.7;">Keterangan: <b><?= nl2br($value->keterangan);?></b></span><br>
                  </td>
                  <td><b><?=$value->jemaat;?></b><br><?=$value->klasis;?></td>
                  <td>
                    <span style="font-size: 12px;  line-height: 0.7;">Luas: <b><?=$value->luas;?> M²</b></span><br>
                    <span style="font-size: 12px;  line-height: 0.7;">Lokasi: <b><?= nl2br($value->alamat_lokasi);?></b></span>
                    <span style="font-size: 12px;  line-height: 0.7;">Catatan: <b><?= nl2br($value->catatan);?></b></span><br>
                    <span style="font-size: 12px;  line-height: 0.7;">Maps: <a href="https://www.google.com/maps?q=<?=$value->langtitude;?>,<?=$value->longtitude;?>" target="_BLANK"><i class="fa fa-map"></i></a> </span><br>
                  </td>
                  <td>
                    <div class="btn btn-success btn-xs" title="Unggah Lampiran" id="btn-formuploadlampiran<?=$value->id;?>" href="<?=base_url().'aset/form_upload_lampiran?auth='.base64_encode($value->id."*92837ads0f87");?>" nama_asset="<?=$value->peruntukan_tanah." (".$value->jemaat.")"; ?>"><i class="fa fa-files-o"></i></div>
                    <a class="btn btn-warning btn-xs" title="Perbarui Data" href="<?=base_url().'aset/edit/'.$value->id;?>"><i class="fa fa-pencil"></i></a>
                    <div class="btn btn-danger btn-xs pull-right" title="Hapus Data" id="btn_hapus-Mutasi<?=$value->id;?>" href="<?=base_url().'aset/detele?token='.md5($value->id.'jHGSj2898!aA');?>"><i class="fa fa-trash"></i></div>

                  </td>
                </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
$this->load->view('layout/footer');
?>

<script>
  $(document).on('click', '[id^=btn-rename-att]', function(e){
    //e.preventDefault();
    uniqid=$(this).attr('uniqid');
    recid=$(this).attr('recid');
    value=$(this).attr('value');
    field_txt='<input class="form-control" name="rename_att'+uniqid+' token="'+recid+'" value="'+value+'" style="margin-bottom:2px;">'
    field_txt+='<button class="btn btn-success btn-xs" title="Simpan Nama" uniq="'+uniqid+'"  token="'+recid+'" ><i class="fa fa-check"></i></button>'
    field_txt+='<button class="btn btn-danger btn-xs pull-right" title="Batal" uniq="'+uniqid+'"  token="'+recid+'" ><i class="fa fa-times"></i></button>'
    $('#td_att_'+uniqid).html(field_txt);
  })
  
  $(document).on('blur change', '[id^=rename_att]', function(e){
    token=$(this).attr('token');
    value=$(this).val();

    dataMap={}
    dataMap['token']=token
    dataMap['value']=value
    url="<?=base_url();?>aset/rename_att"
    $.post(url, dataMap, function(data){
      json=$.parseJSON(data)
      if(json.sts=1){
        load_lampiran()
        iziToast.success({
          title: "Berhasil Mengubah Nama Lampiran!",
          message: '',
          position: "topRight",
          class: "iziToast-succes",

        });

      }
      else{
        iziToast.error({
          title: "Gagal Mengubah Nama Lampiran!",
          message: 'Silahkan hubung Administrator!',
          position: "topRight",
          class: "iziToast-danger",

        });
      }
    })


  })
</script>