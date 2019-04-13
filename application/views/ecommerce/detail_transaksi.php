<div class="container utama">
  <div class="row" style="margin: 40px 0px 50px 0px ;"    >
    <div class="col-md-8 box">
      <h3>Transaksi Detail</h3><hr>
       <?php  
          foreach ($barang as $key => $d) { ?>
        <div class="media">
        <div class="media-left">
          <img src="http://localhost/aumddy/assets/barang/jaket_new3.jpg" class="media-object" style="width:100px ;height: 100px; margin: 0px 10px 0px 0px;">
        </div>
        <div class="media-body">
          <span>
            <b><a href="#"><?=$d->nama_barang?></a></b>
          </span> 
          
          <span class="btn-group">Jumlah : <?=$d->jumlah_beli?> barang</span>
          <span class="pull-right" style="color: #0c7069; font-weight: bold; font-size: 16px"><?=$d->harga_jual?> </span>
        </div>
      </div><hr>
  <?php } ?>
           </div>
       <div class="col-sm-4">
      <div class="list-group">
        <div class="list-group-item">
          <b>Total Tagihan</b>
          <p class="media-heading">Rp <?php echo number_format($transaksi->total_bayar, 0, ',', '.');?></p>
        </div>
        <?php if($transaksi->status=='2'){?>
        <div class="list-group-item">
          <b>Status</b>
          <p class="media-heading">
            <div class="btn-group">
              <span class="btn btn-success btn-sm">Belum</span>
              <span class="btn btn-default btn-sm">Dibayar</span>
              <span class="btn btn-default btn-sm">Dikirim</span>
              <span class="btn btn-default btn-sm">Diterima</span>
            </div>
          </p>
        </div>
        <div class="list-group-item">
          <?php  $row= $this->db->query('SELECT * FROM tbl_bank')->row()?>
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
              <span class="btn btn-success btn-sm">Belum</span>
              <span class="btn btn-success btn-sm">Dibayar</span>
              <span class="btn btn-default btn-sm">Dikirim</span>
              <span class="btn btn-default btn-sm">Diterima</span>
            </div>
          </p>
        </div>
        <?php }elseif ($transaksi->status=='4') { ?>
        <div class="list-group-item">
          <b>Status</b>
          <p class="media-heading">
            <div class="btn-group">
              <span class="btn btn-success btn-sm">Belum</span>
              <span class="btn btn-success btn-sm">Dibayar</span>
              <span class="btn btn-success btn-sm">Dikirim</span>
              <span class="btn btn-default btn-sm">Diterima</span>
            </div>
          </p>
        </div>
        <div class="list-group-item"><b>No Resi</b><p class="media-heading"><?php echo $row->resi; ?></p></div>
          <div class="list-group-item"><a href="<?php echo base_url('index.php/web/admin_transaksi_terima/').$row->id_transaksi ?>" class="btn btn-primary btn-sm btn-block">Diterima</a></div>
          <?php }elseif ($transaksi->status=='5') { ?>
            <div class="list-group-item"><b>Status</b>
              <p class="media-heading">
                <div class="btn-group">
                  <span class="btn btn-success btn-sm">Belum</span>
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
           <div class="list-group-item">
          <b>Expedisi</b>
          <p class="media-heading"><?php echo $transaksi->pengiriman;?></p>
        </div>
        <div class="list-group-item">
          <b>Alamat Anda</b>
          <p class="media-heading"><?php echo $_SESSION['login']['alamat'];?></p>
        </div>
      </div>
    </div>
    </div>
  </div>
<div></div></div>