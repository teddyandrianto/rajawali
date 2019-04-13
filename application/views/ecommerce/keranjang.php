<div class="container" >
	<div class="row" style="margin: 40px 0px 50px 0px ;">      
    <div class="col-md-8 box" >
      <h3>Keranjang belanja</h3><hr>
        
        <?php $data =  $this->Model_ecommerce->getkeranjang('data'); 
        	foreach ($data as $key => $d) { ?>
        <div class="media">
        <div class="media-left">
          <img src="http://localhost/aumddy/assets/barang/jaket_new3.jpg" class="media-object" style="width:100px ;height: 100px; margin: 0px 10px 0px 0px;">
        </div>
        <div class="media-body">
          <span>
            <b><a href="#"><?=$d->nama_barang?></a></b>
          </span> 
          <a href="#" class="fa fa-times pull-right"></a><br><br>
          <span class="btn-group">Jumlah : <?=$d->jumlah_beli?> barang</span>
          <span class="pull-right" style="color: #0c7069; font-weight: bold; font-size: 16px"><?=$d->harga_jual?> </span>
        </div>
      </div><hr>
  <?php } ?>
            
          </div>

  
	<div class="col-sm-4">
		<div class="list-group">
			<form name="form" action="<?php echo base_url('ecommerce/proses_transaksi') ?>" method="POST">  
  	<div class="list-group-item" style="background-color: #f1f1f1">Pilih jasa Pengiriman</div>

       	 <div class="list-group-item">
     		<div class="row">
     			<div class="col-md-6">
     				 <label for="kot">Jasa</label>
	      <select id="locality-jasa" name="jasa" class="form-control" >
	      	  <option>pilih Kurir</option>
                    <option value="jne">JNE</option>  
                    <option value="pos">Pos</option>
                    <option value="tiki">Tiki</option>
	      </select>
     			</div>
     			<div class="col-md-6">
     				<label for="kot">Services</label>
	      <select id="locality-service" name="paket" class="form-control" >
	      	  <option>pilih Kurir</option>
	      </select>
     			</div>
     		</div>
        	
	     
	  <br>
	      
	


      	</div>
      		<div class="list-group-item" style="background-color: #f1f1f1">Alamat pengiriman<a href="" title="Edit Alamat" class="pull-right" ><i class="fa fa-edit"></i></a></div>
      		<div  class="list-group-item"  >
      			<p><b>Propinsi</b>
      			<span class="pull-right" id="provinsi"></span>
      		</p>

      			<p><b>Kota</b>
      			<span class="pull-right" id="kota"></span>
      			</p>

      			<p><textarea class="form-control" readonly=""><?php echo $_SESSION['login']['alamat'] ?></textarea>
      			</p>
      		</div>
  		  		<div class="list-group-item" style="font-weight: bold;">Total berat
        <span class="pull-right" style="; width: 190px;padding: -10px">
            <input  type="text" name="berat" value="<?php echo $this->Model_ecommerce->getkeranjang('berat')->berat_tot ?>" readonly>
          </span>
      </div>
      <div class="list-group-item" style="font-weight: bold;">Total Belanja
        <span class="pull-right" style="; width: 190px;padding: -10px">
            <input id="total_belanja"  type="text" name="total_belanja" value="<?php echo $this->Model_ecommerce->getkeranjang('sum_harga')->harga_tot ?>" readonly>
          </span>
      </div>
       <div class="list-group-item" style="font-weight: bold;">Total Ongkir
        <span class="pull-right" style="; width: 190px;padding: -10px">
            <input id="ongkir" type="text" name="ongkir" readonly>
          </span>
      </div>
      <div class="list-group-item" style="font-weight: bold;">Total Bayar
     <span class="pull-right" style="; width: 190px;padding: -10px">
            <input id="total_bayar" type="text" name="total_bayar" readonly>
          </span>
      </div>
  		<div class="list-group-item" style="background-color: #f1f1f1">Pilih Bank Transfer</div>
		    				
				<div class="list-group-item">
          <img src="<?php echo base_url('assets/ecommerce/')?>img/bank/bca.png" height="20px">
          <span class="pull-right">
            <input type="radio" name="bank" value="1">
          </span>
        </div>
								
				<div class="list-group-item">
          <img src="<?php echo base_url('assets/ecommerce/')?>img/bank/bri.png" height="20px">
          <span class="pull-right">
            <input type="radio" name="bank" value="2">
          </span>
        </div>
								
				<div class="list-group-item">
          <img src="<?php echo base_url('assets/ecommerce/')?>img/bank/bni.png" height="20px">
          <span class="pull-right">
            <input type="radio" name="bank" value="3">
          </span>
        </div>
								
				<div class="list-group-item">
          <img src="<?php echo base_url('assets/ecommerce/')?>img/bank/mandiri.png" height="20px">
          <span class="pull-right">
            <input type="radio" name="bank" value="4">
          </span>
        </div>
								<input type="hidden" name="total_bayar" value="550000">
				<div class="list-group-item">
          <button type="submit" class="btn btn-success btn-block">Bayar</button>
        </div>
			</form>
		</div>
	</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>

<script type="text/javascript">
let dropdown = $('#provinsi');
dropdown.empty();
dropdown.prop('selectedIndex', 0);
const url = '<?php echo base_url() ?>ecommerce/provinsi/<?php echo $_SESSION['login']['provinsi_id'] ?>';
$.getJSON(url, function (data) {
  $.each(data, function (key, entry){
  	dropdown.append($("<p>"+entry.results.province+"</p>"));
  })

})    

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
$('#locality-jasa').on('change', function() {
  
	let jasa = $('#locality-service');
	jasa.empty();
	jasa.append('<option selected="true" disabled>Pilih Kabupaten/Kota </option>');
	jasa.prop('selectedIndex', 0);
	let kurir = $("#locality-jasa option:selected").attr("value");
	const url_jasa = '<?php echo base_url() ?>/ecommerce/cek_ongkir/<?php echo $_SESSION['login']['kota_id'] ?>/<?php echo $this->Model_ecommerce->getkeranjang('berat')->berat_tot*1000 ?>/'+kurir;
	 $.getJSON(url_jasa, function (data) {
	  $.each(data, function (key, entry){
	  	for (var i = 0; i < entry.results[0].costs.length; i++) {
	  		 jasa.append($('<option></option>').attr('value', entry.results[0].costs[i].service).text(entry.results[0].costs[i].service));
	  	}
	  })
	})
})    

$('#locality-service').on('change', function() {
	let ongkir = $('#ongkir');
	ongkir.empty();
	ongkir.prop('selectedIndex', 0);
	let kurir = $("#locality-jasa option:selected").attr("value");
	let serv = $("#locality-service option:selected").attr("value");
	const url_ongkir = '<?php echo base_url() ?>/ecommerce/cek_ongkir/<?php echo $_SESSION['login']['kota_id'] ?>/<?php echo $this->Model_ecommerce->getkeranjang('berat')->berat_tot  *1000 ?>/'+kurir;
	 $.getJSON(url_ongkir, function (data) {
	  $.each(data, function (key, entry){
	  	for (var i = 0; i < entry.results[0].costs.length; i++) {
	  		if(entry.results[0].costs[i].service==serv){
         document.form.ongkir.value = entry.results[0].costs[i].cost[0].value;
         document.form.total_bayar.value = entry.results[0].costs[i].cost[0].value+document.form.total_belanja.value; 	
  			}else{
  			
  		}
	  	}
	  })
	})
})  

  


</script>
