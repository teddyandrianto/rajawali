  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h3 class="mk-5">Kategori</h3>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

        <br>
        <div class="list-group">
          <div class="list-group-item " style="background-color: #f7f7f7;" >Rentan Harga</div>
          <div class="list-group-item">
            <form action="<?php echo base_url('ecommerce/filter_barang') ?>" method="GET">
            <div class="form-group">
              <input type="hidden" name="cari_barang" value="<?php echo $this->input->get('cari_barang') ?>">
              <input type="text" class="form-control input-sm" name="min" id="nama" value="<?php echo $this->input->get('min') ?>" placeholder="Min">
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-sm" name="max" value="<?php echo $this->input->get('max') ?>" id="nama" placeholder="Max">
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-sm pull-right">Tampilkan</button>
            </div>
            </form>

          </div>
          
        </div>

      </div>

      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
          <?php foreach ($barang as $b ) { ?>
          
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="<?php echo base_url('ecommerce/barang/').$b->id_barang ?>"><img class="card-img-top" src="<?php echo base_url('assets/ecommerce/barang/').$b->gambar?>" alt=""></a>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="<?php echo base_url('ecommerce/barang/').$b->id_barang ?>"><?=substr($b->nama_barang, 0,19) ?></a>
                </h5>
                <h5>Rp <?= $b->harga_jual?></h5>
                <p class="card-text"><?= substr($b->deskripsi,0, 90)?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
        <?php } ?>
          
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
