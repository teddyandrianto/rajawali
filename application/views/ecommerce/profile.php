<div class="container utama">
	<div class="row" style="margin: 40px 0px 50px 0px ;">
	  <div class="col-md-8 " style="background-color: #f1f1f1;">
      <div style="margin-top: 30px">
        <span style="font-weight: bold; color: #f39b01; font-size:20px">Informasi Umum</span>
        <button type="submit" class="pull-right btn btn-warning btn-sm" data-toggle='modal' data-target='#exampleModalCenter2'><b>Ubah informasi umum</b></button>
      </div><hr>
      <div class="panel-body">
      
          <div class="row">    
            <label class="col-sm-3 control-label">E-mail </label>
            <div class="col-md-9">
              <p class="form-control" style="border-style: none;box-shadow: none"><?= $_SESSION['login']['username']?>
              </p>
            </div>
            <label class="col-sm-3 control-label">Nama Lengkap </label>
            <div class="col-md-9">
              <p class="form-control" style="border-style: none;box-shadow: none"><?= $_SESSION['login']['nama']?>
              </p>
            </div>
            <label class="col-sm-3 control-label">Telepon </label>
            <div class="col-md-9">
              <p class="form-control" style="border-style: none;box-shadow: none"><?= $_SESSION['login']['telpon']?>
              </p>
            </div>
          </div>
        </div><hr>
        <div style="margin-top: 30px">
        <span style="font-weight: bold; color: #f39b01; font-size:20px">Informasi Alamat</span>
        <button type="submit" class="pull-right btn btn-warning btn-sm" data-toggle='modal' data-target='#alamat'><b>Ubah alamat</b></button>
      </div><hr>
      <div class="panel-body">
        <div class="row">
            <label class="col-sm-3 control-label">Provinsi </label>
            <div class="col-md-9" >
              <p id="provinsi" class="form-control" style="border-style: none;box-shadow: none">
              </p>
            </div>
             <label class="col-sm-3 control-label">Kota </label>
            <div class="col-md-9" >
              <p id="kota" class="form-control" style="border-style: none;box-shadow: none">
              </p>
            </div>
            <label class="col-sm-3 control-label">Alamat </label>
            <div class="col-md-9" >
              <p class="form-control" style="border-style: none;box-shadow: none"><?= $_SESSION['login']['alamat']?>
              </p>
            </div>
          </div>      
      </div>
      <hr>
        <div style="margin-top: 30px">
        <span style="font-weight: bold; color: #f39b01; font-size:20px">Password</span>
        <button type="submit" class="pull-right btn btn-warning btn-sm" data-toggle='modal' data-target='#password_edit'><b>Ubah Password</b></button>
      </div><hr>
	   </div>
  </div>
</div>


<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
      <form id="myForm" action="<?php echo base_url('ecommerce/ubah_umum')?>" method="post">
      <div class="modal-header">
        <h4><b>Ubah Informasi Umum</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $_SESSION['login']['nama']?>" placeholder="Masukan Nama Lengkap">
              </div>
              <div class="form-group">
                <label>Telpon</label>
                <input type="number" class="form-control" name="telpon" value="<?php echo $_SESSION['login']['telpon']?>" placeholder="Masukan Nomor Telpon">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Ubah Profile</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="alamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
      <form id="myForm" action="<?php echo base_url('ecommerce/ubah_alamat')?>" method="post">
      <div class="modal-header">
        <h4><b>Ubah Informasi Alamat</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <select id="locality-dropdown" name="provinsi" class="form-control" >
                  <option selected="selected">blank</option>
                </select>
              <div class="form-group">
               <label for="kot">Kota/Kabupaten</label>
                <select id="locality-kota" name="kota" class="form-control" >
              </select>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                  <textarea class="form-control" name="alamat"><?= $_SESSION['login']['alamat']?></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Ubah Profile</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="password_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
      <form id="myForm" action="<?php echo base_url('ecommerce/ubah_password')?>" method="post">
      <div class="modal-header">
        <h4><b>Ubah Password</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <label>Password Lama</label>
                  <input class="form-control" type="password" name="password_lama">
                </div>
              <div class="form-group">
                <label>Password Baru</label>
                  <input class="form-control" type="password" name="password_baru">
            </div>
            <div class="form-group">
                <label>Konfirmasi Password</label>
                  <input class="form-control" type="password" name="konfirmasi_password">
            </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Ubah Profile</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>

<script type="text/javascript">

let provinsi = $('#provinsi');
provinsi.empty();
provinsi.prop('selectedIndex', 0);
const url_provinsi = '<?php echo base_url() ?>ecommerce/provinsi/<?php echo $_SESSION['login']['provinsi_id'] ?>';
$.getJSON(url_provinsi, function (data) {
  $.each(data, function (key, entry){
    provinsi.append($("<p>"+entry.results.province+"</p>"));
  })

});    

let kota = $('#kota');
kota.empty();
kota.prop('selectedIndex', 0);
let url_kota = '<?php echo base_url() ?>ecommerce/kota/<?php echo $_SESSION['login']['provinsi_id'] ?>';
$.getJSON(url_kota, function (data) {
  $.each(data, function (key, entry){
    for (var i = 0; i < entry.results.length; i++) {
      if(entry.results[i].city_id==<?php echo $_SESSION['login']['kota_id'] ?>){
        kota.append($("<p>"+entry.results[i].city_name+"</p>"));  
      }else{
        
      }

    }
  })


})    

let dropdown = $('#locality-dropdown');
dropdown.empty();
dropdown.append('<option selected="true" disabled>Pilih Provinsi</option>');
dropdown.prop('selectedIndex', 0);

const url = '<?php echo base_url() ?>ecommerce/provinsi';

// Populate dropdown with list of provinces
$.getJSON(url, function (data) {
  $.each(data, function (key, entry) {
    for (var i = 0; i < entry.results.length; i++) {
    dropdown.append($('<option></option>').attr('value', entry.results[i].province_id).text(entry.results[i].province));
  }
    //console.log(entry.results[0].province_id)
  })
});


 $('#locality-dropdown').on('change', function() {
  let kota = $('#locality-kota');

  kota.empty();

  kota.append('<option selected="true" disabled>Pilih Kabupaten/Kota </option>');
  kota.prop('selectedIndex', 0);

  let kode_prov = $("#locality-dropdown option:selected").attr("value");
  const url_kota = '<?php echo base_url() ?>/ecommerce/kota/'+kode_prov;

  // Populate dropdown with list of provinces
  $.getJSON(url_kota, function (data) {
    $.each(data, function (key, entry) {
      for (var i = 0; i < entry.results.length; i++) {
      kota.append($('<option></option>').attr('value', entry.results[i].city_id).text(entry.results[i].type+" "+entry.results[i].city_name));
    }
    })
  });

});
  </script>


  