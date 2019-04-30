  <div class="content-wrapper">
    <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <h4>Data Transaksi</h4>
             <button class="btn btn-info pull-right" type="button" data-toggle="modal" data-target="#filter"><span class="fa fa-print"> </span> Laporan barang keluar</button>
            </div>

            <div class="box-body">
              <table id="myTable" class="table table-bordered table-hover" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  
                  <th>No transkai</th>
                  <th>Nama Pembeli</th>
                  <th>pengiriman</th>
                  <th>Total Bayar</th>
                  <th>Bank</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($transaksi as $tr) { ?>
                <tr>
                  <td><?php echo $no++?></td>
                  
                  <td><?php echo $tr->id_transaksi+100000 ?></td>
                  <td><?php echo $tr->nama ?></td>
                  <td><?php echo $tr->pengiriman ?></td>
                  <td><?php echo $this->Model_ecommerce->gettotal_bayar_admin($tr->id_transaksi)->harga_tot; ?></td>
                  <td><?php echo $tr->nama_bank ?></td>
                  <td>   <p class="media-heading"><span class="label label-default">
              <?php 
                  if($tr->status==1){
                      echo "Belum dipesan";
                  }elseif($tr->status=='2'){
                      echo "Belum dibayar";
                  }elseif ($tr->status=='3') {
                    echo "sudah dibayar";
                  }elseif ($tr->status=='4') {
                    echo "Dalam Pengiriman";
                  }elseif ($tr->status=='5') {
                    echo "Telah diterima";
                  }
                  ;?>
              </span></p></td>
                  <td><center>
                    <a class="btn btn-warning btn-xs" href="<?php echo base_url('ecommerce/detail_transaksi_admin/').$tr->id_transaksi?>">Detail <i class="fa fa-edit"></i></a></center></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

  <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="box-header with-border">   
                    <h3 class="box-title">Filter Data Transaksi</h3>
                  </div>
                  <div class="modal-body"> 
                    <form action="<?php echo base_url('ecommerce/admin_transaksi') ?>" method="GET">
                      <div class="form-group">
                        <label>Bulan</label>
                        <input type="month" name="date" class="form-control">
                      </div>
                      <div class="form-group">
                        <button style="margin-top: 25px" class="btn btn-block" name="cetak" value="1">Cetak <i class="fa fa-print "></i></button>
                        <button style="margin-top: 25px" class="btn btn-success btn-block" name="export" value="1">Export Excel <i class="glyphicon glyphicon-equalizer"></i></button>
                      </div>
                    </form>
                  </div>
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
<script type="text/javascript">
   CKEDITOR.replace( 'editor1' );
</script>
