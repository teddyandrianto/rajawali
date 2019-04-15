  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h3 class="mk-5">Kategori</h3>
        <div class="list-group">
         
          <?php
            $kategori =$this->Model_ecommerce->getkategori();
            foreach ($kategori as $kat) {
           ?>
          <a href="<?php echo base_url("ecommerce/filter_barang?cari_barang= &id_kategori=".$kat->id_kategori."") ?>" class="list-group-item"><?php echo $kat->kategori ?></a>
        <?php } ?>
        </div>

        <br>
        <div class="list-group">
          <div class="list-group-item " style="background-color: #f7f7f7;" >Rentan Harga</div>
          <div class="list-group-item">
            <form action="<?php echo base_url('ecommerce/filter_barang') ?>" method="GET">
            <div class="form-group">
              <input type="hidden" name="cari_barang" value="<?php echo $this->input->get('cari_barang') ?>">
              <input type="hidden" name="id_kategori" value="<?php echo $this->input->get('id_kategori') ?>">
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
              <?php $carousel = $this->Model_ecommerce->getcarousel();
            $no=0;
            foreach ($carousel as $c ) { 
              if($no==0){ ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $no ?>" class="active"></li>
          <?php }else{ ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $no ?>" ></li>
            <?php  } $no++; } ?>
          }
          </ol>
          <div class="carousel-inner" role="listbox">
            <?php $no=0;
            foreach ($carousel as $c ) { 
              $no++;
              if($no==1){ ?>
            <div class="carousel-item active" >
            <?php }else{ ?>
              <div class="carousel-item" >
            <?php } ?>
              <img class="d-block img-fluid" src="<?php echo base_url('assets/ecommerce/img/carosel/').$c->gambar ?>" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5 style="font-weight: bold;"><?php echo $c->judul ?></h5>
                  <p><?php echo $c->deskripsi ?></p>
                  <a class="btn btn-success btn-sm" href="<?php echo $c->link ?>">Lihat Detail Informasi</a>
                </div>
            </div>
          <?php } ?>
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
