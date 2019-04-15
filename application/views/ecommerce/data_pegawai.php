  <div class="content-wrapper">
    <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <h4>Data Pegawai</h4>
              <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#tambah"><span class="fa fa-plus"></span> Tambah Pegawai </button>
            </div>
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-hover" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>username</th>
                  <th>Nama Pegawai</th>
                  <th>Telpon</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($pegawai as $p) { ?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $p->username ?></td>
                  <td><?php echo $p->nama_user ?></td>
                  <td><?php echo $p->telpon ?></td>
                  <td><?php 
                  if ($p->status==1){
                    echo "<span>Admin</span>";
                  }elseif ($p->status==2) {
                    echo "<span>Manager</span>";
                  }elseif($p->status==3){
                    echo "<span>Kasir</span>";
                  } ?></td>
                  <td><center>
                    <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#ubah<?php echo $p->id_user?>"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus<?php echo $p->id_user?>"><i class="fa fa-times"></i></button></center></td>
                </tr>
                <div class="modal fade in" id="ubah<?php echo $p->id_user?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="<?php echo base_url('admin/ubah_pegawai/').$p->id_user.'/'.$p->username?>" method="POST">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Ubah Pegawai</h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control"  name="username" value="<?php echo $p->username?>" placeholder="Masukan username" required>
                        </div>
                        <div class="form-group">
                          <label>Nama User</label>
                          <input type="text" class="form-control"  name="nama_user" value="<?php echo $p->nama_user ?>"  placeholder="Masukan Nama User" required>
                        </div>
                        <div class="form-group">
                          <label>Telpon</label>
                          <input type="text" class="form-control"  name="telpon" value="<?php echo $p->telpon?>"  placeholder="Masukan Telpon" required>
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" class="form-control"  name="password"  placeholder="Masukan password" required>
                        </div>
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" name="status">
                            <?php if($p->status==1){ ?>
                            <option value="1">Admin</option>
                            <option value="3">Kasir</option>
                          <?php }elseif ($p->status==3) { ?>
                            <option value="3">Kasir</option>
                            <option value="1">Admin</option>
                          <?php } ?>
                          </select> 
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal fade in" id="hapus<?php echo $p->id_user?>">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title">Hapus Pegawai</h4>
                    </div>
                    <div class="modal-body">
                      <p>Apakah Anda Yakin Untuk Hapus Pegawai  </p>
                      <p><b><?php echo $p->nama_user ?></b></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                      <a href="<?php echo base_url('admin/hapus_pegawai/').$p->id_user ?>" class="btn btn-primary">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
              </tbody>
              <div class="modal fade in" id="tambah">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="<?php echo base_url('admin/input_pegawai')?>" method="POST">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Tambah Pegawai</h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control"  name="username" value="" placeholder="Masukan Username" required>
                        </div>
                        <div class="form-group">
                          <label>Nama Pegawai</label>
                          <input type="text" class="form-control"  name="nama_user"  placeholder="Masukan Nama Pegawai" required>
                        </div>
                        <div class="form-group">
                          <label>Telpon</label>
                          <input type="text" class="form-control"  name="telpon"  placeholder="Masukan telpon" required>
                        </div>
                        <div class="form-group">
                          <label >Password</label>
                          <input type="text" class="form-control"  name="password"  placeholder="Masuakn Password" required>
                        </div>
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" name="status">
                            <option value="3">Kasir</option>
                            <option value="1">Admin</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
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
