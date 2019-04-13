  <!-- Page Content -->
  <style type="text/css">
    
    .mda{
      padding: 25px;
      border-radius: 5px;
      background-color: #f7f7f7;
    }
    .mda-body{
      margin :0px 20px;
    }
    .judul{
      font-weight: bold;
      font-size:20  px;
    }
    /*.media-body hr{
      border-top: 1px solid black;
      margin:-10px 0px 20px 0px;
    }*/
    .harga{
      color: #218838;
      font-weight: bold;
      font-size: 30px;
    }
    .btn-group, .btn-group-vertical {
    position: relative;
    display: inline-block;
    vertical-align: middle;
  }

  input[type="number"] {
    -webkit-appearance: textfield;
    -moz-appearance: textfield;
    appearance: textfield;
}
      
  </style>
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h3 class="mk-5">Kategori</h3>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9 my-4">
        <div class="row">

        
      <div class="mda media">
        <div class="media-left">
          <img src="http://localhost/aumddy/assets/barang/jaket_new3.jpg" class="media-object img-barang" width="250">
        </div>
        <div class="media-body mda-body">
          <p class="judul"><?php echo $barang->nama_barang ?></p>
          <hr>
          <p class="harga">Rp <span id="harga"><?php echo $barang->harga_jual ?></span></p>
          <p class="stok">Stok Barang : <b>11</b> <br> Berat : <b id="berat"><?=$barang->berat ?></b> Kg</p>
          <form name="form" method="POST" action="<?php echo base_url('ecommerce/tambah_keranjang/').$this->uri->segment(3) ?>">
           <div class="btn-group">
              <button type="button" onclick="kurang()" class="btn btn-success">
                <span class="fa fa-minus"></span>
              </button>
              <input type="number" class="btn col-md-3" id="hasil" name="jumlah" value="1" readonly="">
              <button type="button" onclick="tambah()" class="btn btn-success">
                <span class="fa fa-plus"></span>
              </button>
            </div>

            <div class="media mda col-md-12">    
              <button type="submit" class="btn btn-success btn-block btn-lg">
                <i class="fa fa-cart-arrow-down"></i> Beli Sekarang
              </button><br>
            </div>   
          </form>
          <b>Deskripsi :</b>
          <?php echo $barang->deskripsi ?>

          <p>Cek Ongkos kirim :</p>
            <div class="row">
              <div class="col-md-4"> 
               <div class="form-group">
                  <label for="prov">Kurir</label>
                  <select id="kurir" name="jasa" class="form-control" >
                    <option>pilih Kurir</option>
                    <option value="jne">JNE</option>  
                    <option value="pos">Pos</option>
                    <option value="tiki">Tiki</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4"> 
               <div class="form-group">
                  <label for="prov">Provinsi</label>
                  <select id="locality-dropdown" name="id_provinsi" class="form-control" >

                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="kot">Kota/Kabupaten</label>
                  <select id="locality-kota" name="id_kota" class="form-control" >
                  </select>
                </div>
              </div>
              <div class="col-md-12">
               <table class="table table-bordered" id="etimilasi">
                
               </table>
              </div>
            </div>

        </div>
      </div>


        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
<script type="text/javascript">

 $('#kurir').on('change', function() {

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
  })
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

 $('#locality-kota').on('change', function() {
    let kota = $('#etimilasi');
    let jum = document.form.hasil.value;
    let brt = $("#berat").text();
    let totbrt = jum*brt*1000;
    let harga = $("#harga").text();
    let harga_tot = harga*jum;

  kota.empty();

  kota.append('<thead><tr><th>Service</th><th>Waktu Pengantar</th><th>Ongkos kirim</th><th>Harga</th><th>Harga Total</th></tr></thead>');
  kota.prop('selectedIndex', 0);
  let kurir = $("#kurir option:selected").attr("value");
  let id_kota = $("#locality-kota option:selected").attr("value");

  let kode_prov = $("#locality-dropdown option:selected").attr("value");
  const url_kota = '<?php echo base_url() ?>/ecommerce/cek_ongkir/'+id_kota+'/'+totbrt+'/'+kurir+'';

  // Populate dropdown with list of provinces
  $.getJSON(url_kota, function (data) {
    $.each(data, function (key, entry) {
      for (var i = 0; i < entry.results[0].costs.length; i++) {
      kota.append($('<tbody><tr><td>'+entry.results[0].costs[i].service +'</td><td>'+entry.results[0].costs[i].cost[0].etd +'</td><td>'+entry.results[0].costs[i].cost[0].value +'</td><td>'+harga_tot +'</td><td>'+(entry.results[0].costs[i].cost[0].value+harga_tot) +'</td></tr></tbody></table>')
        );
    }
    })
  });
 });

</script>
<script type="text/javascript">
  var angka=1; 
  function tambah(){ 
    angka = angka+1; 
    if(angka > 11){
      angka=11;
    }else{
    document.form.hasil.value = angka; 
    }
     let kota = $('#etimilasi');
    let jum = document.form.hasil.value;
    let brt = $("#berat").text();
    let totbrt = jum*brt*1000;
    let harga = $("#harga").text();
    let harga_tot = harga*jum;

  kota.empty();

  kota.append('<thead><tr><th>Service</th><th>Waktu Pengantar</th><th>Ongkos kirim</th><th>Harga</th><th>Harga Total</th></tr></thead>');
  kota.prop('selectedIndex', 0);
  let kurir = $("#kurir option:selected").attr("value");
  let id_kota = $("#locality-kota option:selected").attr("value");

  let kode_prov = $("#locality-dropdown option:selected").attr("value");
  const url_kota = '<?php echo base_url() ?>/ecommerce/cek_ongkir/'+id_kota+'/'+totbrt+'/'+kurir+'';

  // Populate dropdown with list of provinces
  $.getJSON(url_kota, function (data) {
    $.each(data, function (key, entry) {
      for (var i = 0; i < entry.results[0].costs.length; i++) {
      kota.append($('<tbody><tr><td>'+entry.results[0].costs[i].service +'</td><td>'+entry.results[0].costs[i].cost[0].etd +'</td><td>'+entry.results[0].costs[i].cost[0].value +'</td><td>'+harga_tot +'</td><td>'+(entry.results[0].costs[i].cost[0].value+harga_tot) +'</td></tr></tbody></table>')
        );
    }
    })
  });
} 
 function kurang(){ 
    angka = angka-1; 
    if(angka < 1){
      angka=1;
    }else{
    document.form.hasil.value = angka; 
    }

     let kota = $('#etimilasi');
    let jum = document.form.hasil.value;
    let brt = $("#berat").text();
    let totbrt = jum*brt*1000;
    let harga = $("#harga").text();
    let harga_tot = harga*jum;

  kota.empty();

  kota.append('<thead><tr><th>Service</th><th>Waktu Pengantar</th><th>Ongkos kirim</th><th>Harga</th><th>Harga Total</th></tr></thead>');
  kota.prop('selectedIndex', 0);
  let kurir = $("#kurir option:selected").attr("value");
  let id_kota = $("#locality-kota option:selected").attr("value");

  let kode_prov = $("#locality-dropdown option:selected").attr("value");
  const url_kota = '<?php echo base_url() ?>/ecommerce/cek_ongkir/'+id_kota+'/'+totbrt+'/'+kurir+'';

  // Populate dropdown with list of provinces
  $.getJSON(url_kota, function (data) {
    $.each(data, function (key, entry) {
      for (var i = 0; i < entry.results[0].costs.length; i++) {
      kota.append($('<tbody><tr><td>'+entry.results[0].costs[i].service +'</td><td>'+entry.results[0].costs[i].cost[0].etd +'</td><td>'+entry.results[0].costs[i].cost[0].value +'</td><td>'+harga_tot +'</td><td>'+(entry.results[0].costs[i].cost[0].value+harga_tot) +'</td></tr></tbody></table>')
        );
    }
    })
  });
}
</script>

  
