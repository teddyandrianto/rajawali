<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php 
                  $this->db->select('count(id_transaksi) as dat');
    $this->db->from('tbl_transaksi');
   
    $this->db->where('DATE_FORMAT(waktu,"%Y-%m")=',date('Y-m'));
    $this->db->where('status>=',3);
    $this->db->where('status<=',5);
    
    echo $this->db->get()->row()->dat;

              ?> Transaksi</h3>

              <p>Jumlah Transaksi Bulan ini</p>
            </div>
           
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">

              <h3>Rp <?php echo number_format($sum_data->harga_jual-$sum_data->harga_beli, 0, ',', '.') ?></h3>

              <p>Keuntungan Bulan ini</p>
            </div>
  
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $sum_data->jumlah_beli ?> Barang</h3>

              <p>Jumlah barang terjual Bulan ini</p>
            </div>
           
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
      </div>

      <div class="row">
        <div class="col-lg-5">
          <div class="box box-primary">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-server"></i>

              <h3 class="box-title">List Kategori</h3>

           
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list ui-sortable">
              <?php
                $kategori = $this->Model_ecommerce->getkategori();
                foreach ($kategori as $kat ) { ?>
              
                <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <span class="text"><?php echo $kat->kategori ?></span>
                  <div class="tools">
                    <i data-toggle="modal" data-target="#ubah<?=$kat->id_kategori?>" class="fa fa-edit"></i>
                    <a style="color: red" href="<?php echo base_url('ecommerce/admin_delete_kategori/').$kat->id_kategori ?>"><i class="fa fa-trash-o"></i></a>
                  </div>
                </li>
             
              <div class="modal fade " id="ubah<?=$kat->id_kategori?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <form action="<?php echo base_url('ecommerce/admin_update_kategori/').$kat->id_kategori ?>" method="POST">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Kategori <?=$kat->kategori?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     <input class="form-control" type="text" value="<?=$kat->kategori?>" name="kategori">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php } ?>
             </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Ketgori</button>
            </div>
          </div>
        </div>



        <div class="col-sm-12 col-md-7">
                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            Carousel
                        </h4>
                          <?php $carousel = $this->Model_ecommerce->getcarousel();
                            foreach ($carousel as $c ) { ?>
                        <div class="media" style="background-color: #f1f1f1;padding: 10px;">
                            <div class="media-left">
                                <a href="https://www.creative-tim.com/product/material-dashboard-pro-angular2?affiliate_id=97705" class="ad-click-event">
                                    <img src="<?php echo base_url('assets/ecommerce/img/carosel/').$c->gambar ?>" class="media-object" style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="clearfix">
                                    <p class="pull-right">
                                      
                                        <a href="<?php echo base_url('ecommerce/admin_hapus_carousel/').$c->id_carousel ?>" class="btn-danger btn-xs">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </a>
                                        <br>
                                        <a href="<?php echo $c->link ?>" class="btn-success btn-xs">
                                            <i class="fa fa-link"></i> view Link
                                        </a>
                                    </p>

                                    <h4 style="margin-top: 0"><?php echo $c->judul ?></h4>

                                    <p><?php echo $c->deskripsi ?></p>
                                 
                                </div>
                            </div>
                        </div>
                      <?php } ?> 
                             <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#tambah_carousel"><i class="fa fa-plus"></i> Tambah Carousel</button>
            </div>   
                    </div>
                </div>
            </div>
      </div>
</section>
</div>

    <div class="modal fade " id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <form action="<?php echo base_url('ecommerce/admin_input_kategori/') ?>" method="POST">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     <input class="form-control" type="text" name="kategori">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="modal fade " id="tambah_carousel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <form action="<?php echo base_url('ecommerce/admin_input_carousel/') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Carousel</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-panel">
                        <label>Judul</label>
                          <input class="form-control" type="text" name="judul" placeholder="Judul" maxlength="20" required>
                        </div>
                  
                      <div class="form-panel">
                        <label>Deskripsis</label>
                          <input class="form-control" type="text" name="deskripsi" placeholder="Deskripsi" maxlength="80" required>
                      </div>
                     
                      <div class="form-panel">
                        <label>link</label>
                          <input class="form-control" type="text" name="link" placeholder="Link" required>
                      </div>
                   
                      <div class="form-panel">
                        <label>Gambar 900x350</label>
                          <input class="form-control" type="file" name="filefoto" required>
                      </div>
                      </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
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
