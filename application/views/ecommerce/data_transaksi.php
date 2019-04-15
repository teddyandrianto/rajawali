<div  class="container utama">
  <div class="row" style="margin: 40px 0px 50px 0px ;">
    <div class="col-md-10 box">
      <h3>Transaksi</h3><hr>
      <?php foreach ($transaksi as $d) { ?>
      <div class="media">
        <div class="media-body ">
          <div class="row"> 
          <div class="col-md-2">
            <p>No transaksi</p>
            <p class="media-heading"><?php echo $d->id_transaksi;?></p>
          </div>
          <div class="col-md-3">
            <p>Total Tagihan</p>
            <p style="font-weight: bold;" class="media-heading">Rp <?php echo $d->total_bayar == 0 ? '' : number_format($d->total_bayar, 0, ',', '.');?></p>
          </div>
          <div class="col-md-2">
            <p>Status</p>
            <p style="background-color: #6666;padding: 4px; border-radius: 3px; text-align: center;" class="media-heading"><span class="label label-default">
              <?php 
                  if($d->status==2){
                      echo "Belum dibayar";
                  }elseif ($d->status==3) {
                    echo "sudah dibayar";
                  }elseif ($d->status==4) {
                    echo "Dalam Pengiriman";
                  }elseif ($d->status==5) {
                    echo "Telah diterima";
                  }
                  ;?>
              </span></p>
          </div>
          <div class="col-md-3">
            <p>Pesan</p>
            <p style="font-weight: bold;" class="media-heading"><?php echo $d->waktu; ?></p>
          </div>
          <div class="col-md-2"><br>
            <a href="<?php echo base_url('ecommerce/detail_transaksi/').$d->id_transaksi ?>" class="btn btn-success btn-sm">Detail Transaksi</a>
          </div>
          </div>
        </div>
      </div><hr>
      <?php } ?>
    </div>
  </div>
</div>