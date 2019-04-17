  <div class="content-wrapper">
    <section class="content">
      <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Barang Pesan</h3>

              <div class="box-tools pull-right">
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php 
                $data_barang = $this->Model_ecommerce->getbarang_transaksi_admin($transaksi->id_transaksi);
                foreach ($data_barang as $b) { ?>
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo base_url('assets/ecommerce/barang/').$b->gambar ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo $b->nama_barang ?>
                      <span class="label label-warning pull-right">Rp <?php echo  $b->harga_jual ?></span></a>
                    <span class="product-description">
                          jumlah <?php echo $b->jumlah_beli ?>
                        </span>
                        <p>berat <?php echo $b->berat ?> kg</p>
                  </div>
                </li>
              <?php } ?>
                <!-- /.item -->
            
            </div>
         
            <!-- /.box-footer -->
          </div>
      </div>
    </div>
    <div class="col-md-4">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Transaksi</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
          
             <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Total bayar
                  <span class="pull-right text-red"> Rp <?php echo $transaksi->total_bayar?></span></a></li>
                <li><a href="#">Berat<span class="pull-right text-green"><?php echo  $this->db->query('SELECT sum(berat*jumlah_beli) as berat FROM tbl_detail_transaksi JOIN tbl_barang ON tbl_barang.id_barang=tbl_detail_transaksi.id_barang  WHERE id_transaksi='.$transaksi->id_transaksi.'')->row()->berat ?> Kg</span></a>
                </li>
                <li><a href="#">Pengiriman
                  <span class="pull-right text-green"><?php echo $transaksi->pengiriman?></span></a>
                </li>
                <li><a href="#">Biaya pengiriman
                  <span class="pull-right text-green">Rp <?php echo $transaksi->ongkir?></span></a>
                </li>
                <li><a href="#">Provinsi
                  <span class="pull-right text-green"id="provinsi"></span></a>
                </li>
                <li><a href="#">Kota
                  <span class="pull-right text-green" id="kota"></span></a>
                </li>
                <li><a href="#">Alamat
                  <span class="pull-right text-green"></greeni> <?php echo $transaksi->alamat?></span></a>
                </li>
              </ul>
          
            <!-- /.box-body -->
          </div>
        <?php if($transaksi->status=='2'){?>
        <div class="list-group-item">
          <b>Status</b>
          <p class="media-heading">
            <div class="btn-group">
              <span class="btn btn-success btn-sm">Dipesan</span>
              <a href="<?php echo base_url('ecommerce/update_status_transaksi/3/').$transaksi->id_transaksi ?>" class="btn btn-default btn-sm">Dibayar</a>
              <span class="btn btn-default btn-sm">Dikirim</span>
              <span class="btn btn-default btn-sm">Diterima</span>
            </div>
          </p>
        </div>
        <div class="list-group-item">
          <?php  $row= $this->db->query('SELECT * FROM tbl_bank WHERE id_bank='.$transaksi->bank.'')->row()?>
          <b>Bank </b>
          <p class="media-heading"><?php echo $row->nama_bank?></p>
          <b>Nomor Rekening </b>
          <p class="media-heading"><?php echo $row->rekening?></p>
          <b>Nama Rekening </b>
          <p class="media-heading"><?php echo $row->nama_rekening?></p>
        </div>
        <?php }elseif ($transaksi->status=='3') { ?>
        <div class="list-group-item">
          <b>Status</b>
          <p class="media-heading">
            <div class="btn-group">
              <span class="btn btn-success btn-sm">Dipesan</span>
              <span class="btn btn-success btn-sm">Dibayar</span>
              <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#input_resi">Dikirim</button>
              <span class="btn btn-default btn-sm">Diterima</span>
            </div>
          </p>
        </div>
        <?php }elseif ($transaksi->status=='4') { ?>
        <div class="list-group-item">
          <b>Status</b>
          <p class="media-heading">
            <div class="btn-group">
              <span class="btn btn-success btn-sm">Dipesan</span>
              <span class="btn btn-success btn-sm">Dibayar</span>
              <span class="btn btn-success btn-sm">Dikirim</span>
              <span class="btn btn-default btn-sm">Diterima</span>
            </div>
          </p>
        </div>
        <div class="list-group-item"><b>No Resi</b><p class="media-heading"><?php echo $transaksi->no_resi; ?></p></div>
          <?php }elseif ($transaksi->status=='5') { ?>
            <div class="list-group-item"><b>Status</b>
              <p class="media-heading">
                <div class="btn-group">
                  <span class="btn btn-success btn-sm">Dipesan</span>
                  <span class="btn btn-success btn-sm">Dibayar</span>
                  <span class="btn btn-success btn-sm">Dikirim</span>
                  <span class="btn btn-success btn-sm">Diterima</span>
                </div>
              </p>
            </div>
            <div class="list-group-item">
              <b>No Resi</b>
              <p class="media-heading"><?php echo $transaksi->resi; ?></p>
            </div>
          <?php } ?>    

          <!-- /.box -->
        </div>
  </div>
  </section>
</div>

 <div class="modal fade" id="input_resi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-sm role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <span class="modal-title"><b>Insert No Resi</b></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" id="myForm" action="<?php echo base_url('ecommerce/update_status_transaksi/4/').$transaksi->id_transaksi ?>" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>No Resi</label>
                      <input type="text" class="form-control" name="resi" >
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable( {
        "scrollCollapse": true
    } );
} );
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>

<script type="text/javascript">

let dropdown = $('#provinsi');
dropdown.empty();
dropdown.prop('selectedIndex', 0);
const url = '<?php echo base_url() ?>ecommerce/provinsi/<?php echo $transaksi->provinsi_id ?>';
$.getJSON(url, function (data) {
  $.each(data, function (key, entry){
    dropdown.append($("<p>"+entry.results.province+"</p>"));
  })

})    

let kota = $('#kota');
kota.empty();
kota.prop('selectedIndex', 0);
let url_kota = '<?php echo base_url() ?>ecommerce/kota/<?php echo $transaksi->provinsi_id ?>';
$.getJSON(url_kota, function (data) {
  $.each(data, function (key, entry){
    for (var i = 0; i < entry.results.length; i++) {
      if(entry.results[i].city_id==<?php echo $transaksi->kota_id ?>){
        kota.append($("<p>"+entry.results[i].city_name+"</p>"));  
      }else{
        
      }

    }
  })


})    
   
</script>
