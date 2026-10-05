<?php
$this->load->view('layout/header');
?>
<div class="right_col" role="main">
  <div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h4>Passkey</h4>
        </div>
        <div class="x_content">
          <a class="btn btn-success pull-right" href="<?=base_url();?>administrator/passkeys/add">Tambah Passkey</a>
        <?php
        //$this->load->view('aset/search_box');
        ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
        </div>
        <div class="x_content table-responsive">
          <table class="table table-striped" id="item_sj">
            <thead>
              <tr>
                <th class="text-center" style="width: 100px;">#</th>
                <th class="text-center">Passkey</th>
                <th class="text-center">Used</th>
                <th class="text-center" style="width: 150px;">Status</th>
                <th class="text-center" style="width: 150px;">Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i=1;
              foreach ($data as $key => $value) {
                # code...
                #print_r($value);

              ?>
                <tr>
                  <td class="text-center" style="width: 100px;"><?=$i++;?></td>
                  <td class="text-center text-danger">
                    <b><?=$value->passkey;?></b><br>
                  </td>
                  <td class="text-center">
                    <b><?=$value->used;?></b><br>
                  </td>
                  <td style="width: 150px;">
                    <?php 
                      if($value->status ==1){
                    ?>    
                    <select id="status_<?=$value->id;?>" name="status" recid="<?=md5('&*(61dgag1'.$value->id);?>" akun="Apakah Anda yakin ingin akan mengnonaktifkan Passkey ini? " class="form-control">
                      <option value="1" <?php if($value->status =='1') echo 'selected'; ?> style="color: green;">Aktif</option>
                      <option value="0" <?php if($value->status =='0') echo 'selected'; ?> style="color: red;">Non-Aktif</option>
                    </select>
                    <?php 
                      }
                      else{
                    ?>
                      <b class="text-danger">Non-Aktif</b>  
                    <?php 
                      }
                    ?>
                  </td>
                  <td class="text-center">
                    <button title="Kirim Passkey ke Email Tujuan" class="btn btn-xs btn-success"><i class="fa fa-paper-plane"></i></button>
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
  //$(document).on('blur change', '[id^=rename_att]', function(e){
  $(document).on('change', '[id^=status_]', function(e){
    if(!confirm($(this).attr('akun'))){
      return false
    }
    dataMap={}
    dataMap['value']=$(this).val()
    dataMap['auth']=$(this).attr('recid')
    url="<?=base_url();?>administrator/passkeys/status"
    $.post(url, dataMap, function(data){
      json=$.parseJSON(data)
      if(json.status==1){
        iziToast.success({
          title: json.msg,
          message: '',
          position: "topRight",
          class: "iziToast-succes",

        });
      }else{
        iziToast.error({
          title: json.msg,
          message: '',
          position: "topRight",
          class: "iziToast-succes",

        });
      }

      setTimeout(() => {
        window.location.replace("<?=base_url();?>administrator/passkeys");
      }, 2000); // Redirects after 3 seconds

    })

  })
</script>