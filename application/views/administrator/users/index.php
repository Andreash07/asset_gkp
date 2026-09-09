<?php
$this->load->view('layout/header');
?>
<div class="right_col" role="main">

  <div class="row">

    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h4 class="pull-left">Data Users</h4>
          <a class="btn btn-success" href="<?=base_url();?>administrator/users_add">Tambah Data User</a>
        </div>
        <div class="x_content table-responsive">
          <table class="table table-striped" id="item_sj">
            <thead>
              <tr>
                <th class="text-center" style="width: 30px;">#</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Ringkasan</th>
                <th class="text-center">User Role</th>
                <th class="text-center" style="width: 100px;">Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i=1;
              foreach ($data as $key => $value) {
                # code...
                $title='Bp. ';
                if($value->gender==2){
                  $title='Ibu ';
                }

                $status='Aktif';
                $status_color='green';
                if($value->status==0){
                  $status='Tidak Aktif';
                  $status_color='red';
                }


              ?>
                <tr>
                  <td class="text-center" style="width: 30px;"><?=$i++;?></td>
                  <td class="text-center">
                    <?=$value->firstname;?> <?=$value->lastname;?><br>
                  </td>
                  <td>
                    <span style="font-size: 12px; line-height: 0.7;">Username: <b><?=$value->username;?></b>
                      (<b class="<?=$status_color;?>"><?=$status;?></b>)
                    </span><br>
                    
                  </td>
                  <td>
                    <?php 
                      if($value->usertype ==2){
                    ?>    
                    <select id="role_<?=$value->id;?>" name="role" recid="<?=$value->id;?>" akun="<?=$value->firstname;?> <?=$value->lastname;?>" class="form-control">
                      <option value="1" <?php if($value->user_role =='1') echo 'selected'; ?> >Operator</option>
                      <option value="2" <?php if($value->user_role =='2') echo 'selected'; ?> >Validator</option>
                      <option value="3" <?php if($value->user_role =='3') echo 'selected'; ?> >Administrator</option>
                    </select>
                    <?php 
                      }
                      else{
                    ?>
                      <b>Administrator</b>  
                    <?php 
                      }
                    ?>
                  </td>
                  <td class="text-center" style="width: 100px;">
                    <!--<a class="btn btn-warning btn-xs" title="Perbarui Data" href="<?=base_url().'administrator/users/edit/'.$value->id;?>"><i class="fa fa-pencil"></i></a>
                    <div class="btn btn-danger btn-xs" title="Hapus Data" id="btn_hapus-Mutasi<?=$value->id;?>" href="<?=base_url().'administrator/users/detele?token='.md5($value->id.'jHGSj2898!aA');?>"><i class="fa fa-trash"></i></div>-->

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
          class: "iziToast-danger",

        });
      }

    })
  })

  $(document).on('click', '[id^=btn_cancel_rename_att]', function(e){
    $('#td_att_'+$(this).attr('uniq')).html('<i class="text-danger">Membatalkan!</i>');
    load_lampiran()


  })
  
  //$(document).on('blur change', '[id^=rename_att]', function(e){
  $(document).on('change', '[id^=role_]', function(e){
    if(!confirm('Apakah Anda yakin mau mengubah User Role dari Akun ini? ('+$(this).attr('akun')+')')){
      return false
    }
    dataMap={}
    dataMap['value']=$(this).val()
    dataMap['recid']=$(this).attr('recid')
    url="<?=base_url();?>/administrator/update_role"
    $.post(url, dataMap, function(data){
      json=$.parseJSON(data)
      if(json.status==1){
        iziToast.success({
          title: "Berhasil Mengubah User Role!",
          message: '',
          position: "topRight",
          class: "iziToast-succes",

        });
      }else{
        iziToast.error({
          title: "Gagal Mengubah User Role!",
          message: '',
          position: "topRight",
          class: "iziToast-succes",

        });
      }

    })

  })

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
          class: "iziToast-danger",

        });
      }
    })


  })
</script>