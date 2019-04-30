  <div class="content-wrapper">
    <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <h4>Data Pembeli</h4>
              
            </div>
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-hover" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>username</th>
                  <th>Nama Pembeli</th>
                  <th>telpon</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($pembeli as $p) { ?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $p->username ?></td>
                  <td><?php echo $p->nama ?></td>
                  <td><?php echo $p->telpon ?></td>
                  <td><?php 
                  if ($p->status==0){
                    echo "<span>Pending</span>";
                  }elseif ($p->status==2) {
                    echo "<span>Accepted</span>";
                  } ?></td>
                  <td><center>
                   
                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus<?php echo $p->id_user?>"><i class="fa fa-times"></i></button></center></td>
                </tr>

              <div class="modal fade in" id="hapus<?php echo $p->id_user?>">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title">Hapus Pembeli</h4>
                    </div>
                    <div class="modal-body">
                      <p>Apakah Anda Yakin Untuk Hapus Pembeli</p>
                      <p><b><?php echo $p->nama ?></b></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                      <a href="<?php echo base_url('ecommerce/admin_hapus_pegawai/').$p->id_user ?>" class="btn btn-primary">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
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
