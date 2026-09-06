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
                <th class="text-center" style="width: 30px;">#</th>
                <th class="text-center">Nama Aset</th>
                <th class="text-center">Jemaat/Klasis</th>
                <th class="text-center">Ringkasan Aset</th>
                <th class="text-center" style="width: 100px;">Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i=1;
              foreach ($data as $key => $value) {
                # code...
              ?>
                <tr>
                  <td class="text-center" style="width: 30px;"><?=$i++;?></td>
                  <td>
                    <?=$value->peruntukan_tanah;?><br>
                    <span style="font-size: 12px; line-height: 0.7;">Atas Nama: <b><?=$value->atas_nama;?></b> (<b><?=$value->kategori_atas_nama;?></b>) </span><br>
                    <span style="font-size: 12px;  line-height: 0.7;">Jenis Dokumen : <b><?=$value->jenis_dokumen_kepemilikan;?></b></span><br>
                    <span style="font-size: 12px;  line-height: 0.7;">No Dokumen : <b><?=$value->no_dokumen;?></b></span><br>
                    <span style="font-size: 12px;  line-height: 0.7;">Status Kepelimikan : <b><?=$value->status_hak_milik;?></b></span><br>
                    <span style="font-size: 12px;  line-height: 0.7;">Keterangan: <b><?= nl2br($value->keterangan);?></b></span><br>
                  </td>
                  <td class="text-center"><b><?=$value->jemaat;?></b><br><?=$value->klasis;?></td>
                  <td>
                    <span style="font-size: 12px;  line-height: 0.7;">Luas: <b><?=$value->luas;?> M²</b></span><br>
                    <span style="font-size: 12px;  line-height: 0.7;">Lokasi: <b><?= nl2br($value->alamat_lokasi);?></b></span>
                    <span style="font-size: 12px;  line-height: 0.7;">Catatan: <b><?= nl2br($value->catatan);?></b></span><br>
                    <span style="font-size: 12px;  line-height: 0.7;">Maps: <a href="https://www.google.com/maps?q=<?=$value->langtitude;?>,<?=$value->longtitude;?>" target="_BLANK"><i class="fa fa-map"></i></a> </span><br>
                  </td>
                  <td class="text-center" style="width: 100px;">
                    <div class="btn btn-success btn-xs" title="Unggah Lampiran" id="btn-formuploadlampiran<?=$value->id;?>" href="<?=base_url().'aset/form_upload_lampiran?auth='.base64_encode($value->id."*92837ads0f87");?>" nama_asset="<?=$value->peruntukan_tanah." (".$value->jemaat.")"; ?>"><i class="fa fa-files-o"></i></div>
                    <a class="btn btn-warning btn-xs" title="Perbarui Data" href="<?=base_url().'aset/edit/'.$value->id;?>"><i class="fa fa-pencil"></i></a>
                    <div class="divider"></div>
                    <div class="btn btn-danger btn-xs" title="Hapus Data" id="btn_hapus-Mutasi<?=$value->id;?>" href="<?=base_url().'aset/detele?token='.md5($value->id.'jHGSj2898!aA');?>"><i class="fa fa-trash"></i></div>
                    <div class="divider"></div>
                    <?php 
                      if(in_array($this->session->userdata('user')->user_role, array(2,3))){
                        $checked="";
                        if($value->approved==1){
                          $checked="checked";
                        }
                    ?>
                      <select name="approve_asset<?=$value->id;?>" id="approve_asset<?=$value->id;?>" class="form-control" token="<?=md5('asek21gjhd!^d'.$value->id);?>">
                        <option value="0" style="color: gray;" <?=$checked;?>>Belum Disetujui</option>
                        <option value="1" style="color: green;" <?=$checked;?>>Disetujui</option>
                        <option value="2" style="color: red;" <?=$checked;?>>Tidak Disetujui</option>
                      </select>
                    <?php 
                      }else{
                        $lbl_approved='<label class="label label-warning">Belum Disetujui</label>';
                        if($value->approved==1){
                          $lbl_approved='<label class="label label-success">Disetujui</label>';
                        }
                        else if($value->approved==2){
                          $lbl_approved='<label class="label label-danger">Tidak Disetujui</label>';
                        }

                    ?>
                      <?=$lbl_approved;?>
                    <?php 
                      }
                    ?>

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
    field_txt='<input class="form-control" id="txt_field_rename_att'+uniqid+'" name="rename_att'+uniqid+'" token="'+recid+'" value="'+value+'" style="margin-bottom:2px;">'
    field_txt+='<button class="btn btn-success btn-xs" title="Simpan Nama" uniq="'+uniqid+'"  token="'+recid+'" id="btn_save_rename_att'+recid+'" ><i class="fa fa-check"></i></button>'
    field_txt+='<button class="btn btn-danger btn-xs pull-right" title="Batal" uniq="'+uniqid+'"  token="'+recid+'" id="btn_cancel_rename_att'+recid+'" ><i class="fa fa-times"></i></button>'
    $('#td_att_'+uniqid).html(field_txt);
  })
  
  $(document).on('click', '[id^=btn-delete-att]', function(e){
    if(confirm("Apakah Anda yakin ingin menghapus Lampiran ini ("+$(this).attr('value')+")?") == false){
      iziToast.error({
        title: "Lampiran batal dihapus!",
        message: '',
        position: "topRight",
        class: "iziToast-danger",

      });
    }
    url='<?=base_url();?>aset/delete_att'
    dataMap={}
    dataMap['token']=$(this).attr('recid')
    $.post(url, dataMap, function(data){
      json=$.parseJSON(data)
      if(json.sts=1){
        load_lampiran()
        iziToast.success({
          title: "Berhasil Menghapus Lampiran!",
          message: '',
          position: "topRight",
          class: "iziToast-succes",

        });

      }
      else{
        iziToast.error({
          title: "Gagal Menghapus Lampiran!",
          message: 'Silahkan hubung Administrator!',
          position: "topRight",
          class: "iziToast-danger",

        });
      }
    })
  })

  $(document).on('change', '[id^=akses_lampiran]', function(e){
    dataMap={}
    dataMap['token']=$(this).attr('recid')
    dataMap['value']=$(this).val()
    url="<?=base_url();?>aset/change_permission"
    $.post(url, dataMap, function(data){
      json=$.parseJSON(data)
      if(json.sts=1){
        load_lampiran()
        iziToast.success({
          title: "Berhasil Mengubah Hak Akses Lampiran!",
          message: '',
          position: "topRight",
          class: "iziToast-succes",

        });

      }
      else{
        iziToast.error({
          title: "Gagal Mengubah Hak Akses Lampiran!",
          message: 'Silahkan hubung Administrator!',
          position: "topRight",
          class: "iziToast-error",

        });
      }

    })
  })

  $(document).on('click', '[id^=btn_cancel_rename_att]', function(e){
    $('#td_att_'+$(this).attr('uniq')).html('<i class="text-danger">Membatalkan!</i>');
    load_lampiran()


  })
  
  //$(document).on('blur change', '[id^=rename_att]', function(e){
  $(document).on('click', '[id^=btn_save_rename_att]', function(e){
    token=$(this).attr('token');
    value=$('#txt_field_rename_att'+$(this).attr('uniq')).val();

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
          class: "iziToast-error",

        });
      }
    })
  })

  $(document).on('change', '[id^=approve_asset]', function(e){
    token=$(this).attr('token');
    value=$(this).val();
    dataMap={}
    dataMap['token']=token
    dataMap['value']=value
    $.post('<?=base_url();?>aset/approving', dataMap, function(data){
      json=$.parseJSON(data)
      if(json.sts=1){
        iziToast.success({
          title: json.msg,
          message: '',
          position: "topRight",
          class: json.class_alert,

        });

      }
      else{
        iziToast.error({
          title: json.msg,
          message: 'Silahkan hubung Administrator!',
          position: "topRight",
          class: json.class_alert,

        });
      }
    })
  })
</script>