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
                  
                  <th>Nama Barang</th>
                  <th>Stok</th>
                  <th>Berat</th>
                  <th>Kategori</th>
                  <th>Harga Jual</th>
                  <th>Harga Beli</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($barang as $b) { ?>
                <tr>
                  <td><?php echo $no++?></td>
                  
                  <td><?php echo $b->nama_barang ?></td>
                  <td><?php echo $b->stok ?></td>
                  <td><?php echo $b->berat ?> Kg</td>
                  <td><?php echo $b->kategori ?></td>
                  <td><?php echo $b->harga_jual == 0 ? '' : number_format($b->harga_jual, 0, ',', '.') ?></td>
                  <td><?php echo $b->harga_beli == 0 ? '' : number_format($b->harga_beli, 0, ',', '.') ?></td>
                  <td>
                    <img src="<?php echo base_url('assets/ecommerce/barang/').$b->gambar ?>" width="50">
                  </td>
                  <td><center>
                     <button class="btn btn-info btn-xs"  data-toggle="modal" data-target="#editgmbr_popup<?php echo $b->id_barang?>"><i class="fa fa-image"></i></button>
                    <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#ubah<?php echo $b->id_barang?>"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus<?php echo $b->id_barang?>"><i class="fa fa-times"></i></button></center></td>
                </tr>
                  <div class="modal fade" id="ubah<?php echo $b->id_barang?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title"><b>Ubah Barang</b></h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form role="form" id="myForm" action="<?php echo base_url('ecommerce/admin_ubah_barang/').$b->id_barang ?>" method="post" >
                    <div class="row">
                      <div class="col-md-5">
                        <div class="modal-body">
                          <div class="box-body">
                            <div class="form-group">
                              <label>Nama Barang</label>
                              <input type="text" class="form-control" name="nama_barang" value="<?php echo $b->nama_barang ?>" placeholder="Masukan Nama Barang">
                            </div>
                            <div class="form-group">
                              <label>Kategori</label>
                              <select class="form-control" name="id_kategori" >
                                <option value="<?php echo $b->id_kategori?>"><?php echo $b->kategori?></option>
                                <?php foreach ($kategori as $kat) { 
                                  if ($kat->id_kategori!=$b->id_kategori){ ?>
                                  <option value="<?php echo $kat->id_kategori ?>"><?php echo $kat->kategori?></option>
                                <?php } }?>
                              </select>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6">
                                <label>Harga Jual</label>
                                <input type="number" class="form-control" name="harga_jual" value="<?php echo $b->harga_jual?>" placeholder="Masukan Harga Jual">
                              </div>
                                <div class="form-group col-md-6">
                                <label>Harga Beli</label>
                                <input type="number" class="form-control" name="harga_beli" value="<?php echo $b->harga_beli?>" placeholder="Masukan Harga beli">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6">
                              <label>Stok</label>
                                <input type="number" class="form-control" name="stok" value="<?php echo $b->stok ?>" placeholder="Masuakn Stok">
                            </div>
                             <div class="form-group col-md-6">
                              <label>Berat Kg</label>
                                <input type="number" class="form-control" name="berat" value="<?php echo $b->berat ?>" placeholder="Masuakn Stok">
                            </div>
                          </div>
                          </div>  
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="modal-body">
                          
                            <div class="form-group">
                              <label>Deskripsi</label>
                              <textarea  class="ckeditor" id="ckeditor"  name="deskripsi" ><?php echo $b->deskripsi; ?></textarea>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
                      <a href="<?php echo base_url('ecommerce/admin_hapus_barang/').$b->id_barang ?>" class="btn btn-primary">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>


            <div class="modal fade" id="editgmbr_popup<?php echo $b->id_barang?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-sm role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <span class="modal-title"><b>Ubah Gambar</b></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" id="myForm" action="<?php echo base_url('ecommerce/admin_ubah_barang_gambar/').$b->id_barang ?>" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" class="form-control" name="filefoto" multiple>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Gambar</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

              <?php } ?>
              </tbody>
              <div class="modal fade in" id="tambah">
                        <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title"><b>Tambah Barang</b></h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form role="form" id="myForm" action="<?php echo base_url('ecommerce/admin_input_barang/') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="modal-body">
                          <div class="box-body">
                            <div class="form-group">
                              <label>Nama Barang</label>
                              <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
                            </div>
                            <div class="form-group">
                              <label>Kategori</label>
                              <select class="form-control" name="id_kategori" >
                                <?php foreach ($kategori as $kat) { ?>
                                  <option value="<?php echo $kat->id_kategori ?>"><?php echo $kat->kategori?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6">
                                <label>Harga Jual</label>
                                <input type="number" class="form-control" name="harga_jual"  placeholder="Harga Jual">
                              </div>
                                <div class="form-group col-md-6">
                                <label>Harga Beli</label>
                                <input type="number" class="form-control" name="harga_beli"  placeholder="Harga beli">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6">
                              <label>Stok</label>
                                <input type="number" class="form-control" name="stok"  placeholder=" Stok">
                            </div>
                             <div class="form-group col-md-6">
                              <label>Berat Kg</label>
                                <input type="number" class="form-control" name="berat" placeholder=" Berat">
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" name="filefoto" multiple>
                          </div>
                          </div>  
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="modal-body">
                          
                            <div class="form-group">
                              <label>Deskripsi</label>
                              <textarea  class="ckeditor" id="ckeditor"  name="deskripsi" ></textarea>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
<script type="text/javascript">
   CKEDITOR.replace( 'editor1' );
</script>
