  <div class="content-wrapper">
    <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <h4>Data Barang</h4>
              <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#tambah"><span class="fa fa-plus"></span> Tambah Barang </button>
            </div>
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-hover" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Barcode</th>
                  <th>Nama Barang</th>
                  <th>Stok</th>
                  <th>Harga Jual</th>
                  <th>Harga Beli</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($barang as $b) { ?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $b->barcode ?></td>
                  <td><?php echo $b->nama_barang ?></td>
                  <td><?php echo $b->stok ?></td>
                  <td><?php echo $b->harga_jual == 0 ? '' : number_format($b->harga_jual, 0, ',', '.') ?></td>
                  <td><?php echo $b->harga_beli == 0 ? '' : number_format($b->harga_beli, 0, ',', '.') ?></td>
                  <td><center>
                    <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#ubah<?php echo $b->id_barang?>"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus<?php echo $b->id_barang?>"><i class="fa fa-times"></i></button></center></td>
                </tr>
                <div class="modal fade in" id="ubah<?php echo $b->id_barang?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="<?php echo base_url('admin/ubah_barang/').$b->id_barang.'/'.$b->barcode?>" method="POST">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Ubah Barang</h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Barcode</label>
                          <input type="text" class="form-control"  name="barcode" value="<?php echo $b->barcode?>" placeholder="Masukan Barcode" required>
                        </div>
                        <div class="form-group">
                          <label>Nama Barang</label>
                          <input type="text" class="form-control"  name="nama_barang" value="<?php echo $b->nama_barang?>"  placeholder="Masukan Nama Barang" required>
                        </div>
                        <div class="form-group">
                          <label>Harga Beli</label>
                          <input type="number" class="form-control"  name="harga_beli" value="<?php echo $b->harga_beli?>"  placeholder="Masukan Harga Barang" required min="500">
                        </div>
                        <div class="form-group" required>
                          <label >Harga Jual</label>
                          <input type="number" class="form-control"  name="harga_jual" value="<?php echo $b->harga_jual?>"  placeholder="Masuakn Harga Jual" min="500">
                        </div>
                        <div class="form-group" required>
                          <label>Stok</label>
                          <input type="number" class="form-control"  name="stok" value="<?php echo $b->stok?>"  placeholder="Masukan Stok" min="0">
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
              <div class="modal fade in" id="hapus<?php echo $b->id_barang?>">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title">Hapus Barang</h4>
                    </div>
                    <div class="modal-body">
                      <p>Apakah Anda Yakin Untuk Hapus Barang  </p>
                      <p><b><?php echo $b->nama_barang ?></b></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                      <a href="<?php echo base_url('admin/hapus_barang/').$b->id_barang ?>" class="btn btn-primary">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
              </tbody>
              <div class="modal fade in" id="tambah">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="<?php echo base_url('admin/input_barang')?>" method="POST">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Tambah Barang</h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Barcode</label>
                          <input type="text" class="form-control"  name="barcode" value="" placeholder="Masukan Barcode" required>
                        </div>
                        <div class="form-group">
                          <label>Nama Barang</label>
                          <input type="text" class="form-control"  name="nama_barang"  placeholder="Masukan Nama Barang" required>
                        </div>
                        <div class="form-group">
                          <label>Harga Beli</label>
                          <input type="number" class="form-control"  name="harga_beli"  placeholder="Masukan Harga Barang" required min="500">
                        </div>
                        <div class="form-group">
                          <label >Harga Jual</label>
                          <input type="number" class="form-control"  name="harga_jual"  placeholder="Masuakn Harga Jual" required min="500">
                        </div>
                        <div class="form-group">
                          <label>Stok</label>
                          <input type="number" class="form-control"  name="stok"  placeholder="Masukan Stok" required min="1">
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
