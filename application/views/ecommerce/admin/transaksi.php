  <div class="content-wrapper">
    <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <h4>Data Transaksi</h4>
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
