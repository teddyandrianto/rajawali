<div class="container">
	<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 box-daftar">
      <h2>Daftar akun baru sekarang</h2>
	  <p>Lengkapi form pendaftaran dibawah ini :</p>
	  <form id="myform" method="POST" action="<?php echo base_url('ecommerce/store_daftar') ?>">
	    <div class="form-group">
	      <label for="usr">Nama Lengkap</label>
	      <input type="text" class="form-control" name="nama" id="nama">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Email</label>
	      <input type="Email" class="form-control" name="email" id="email">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Password</label>
	      <input type="password" class="form-control" name="password" id="password">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Konfirmasi Password</label>
	      <input type="password" class="form-control" name="konfirmasi_password" >
	    </div>
	     <div class="form-group">
	      <label for="prov">Provinsi</label>
	      <select id="locality-dropdown" name="id_provinsi" class="form-control" >
	      	<option selected="selected">blank</option>
	      </select>
	    </div>
	    <div class="form-group">
	      <label for="kot">Kota/Kabupaten</label>
	      <select id="locality-kota" name="id_kota" class="form-control" >
	      </select>
	    </div>
	    <div class="form-group">
	      <label for="pwd">Alamat</label>
	      <textarea class="form-control" name="alamat"></textarea>
	    </div>
	    <div class="form-group">
	    	<button class="btn btn-success btn-block">Daftar</button>
	    </div>
	  </form>
	</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>

<script type="text/javascript">

$("#myform").validate({
  rules: {
    nama: "required",
    email: {
      required: true,
      email: true
    },
    password: "required",
    konfirmasi_password: {
      equalTo: "#password"
    },
    id_provinsi: "required",
    id_kota: "required",
    alamat: "required"
  },
  messages: {
    nama: "Mohon Masukan nama lengkap anda",
    email: {
      required: "Mohon masukan email anda",
      email: "Maaf masukan email anda tidak sesuai ikuti format name@domain.com"
    },
    password : "Mohon masukan password anda !",
    konfirmasi_password : {
    	equalTo: "Maaf konfirmasi password anda tidak sesuai"
    },
    id_provinsi: "Mohon pilih provinsi anda",
    id_kota: "Mohon pilih Kabupaten/Kota anda",
    alamat: "Mohon lengkapi alamat anda"
  }
});



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