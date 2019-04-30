  <!-- Page Content -->
 <style type="text/css">

 </style>

 <header style="margin-top: -80px">
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
              <img src="<?php echo base_url('assets/ecommerce/img/carosel/').$c->gambar ?>" alt="First slide" width="100%">
                <div class="carousel-caption d-none d-md-block">
                  <h5 style="font-weight: bold;"><?php echo $c->judul ?></h5>
                  <p><?php echo $c->deskripsi ?></p>
                  <a class="btn btn-success btn-lg" href="<?php echo $c->link ?>">Lihat Detail Informasi</a>
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
      </div>
  </header>
  <div class="container"  >

    <div class="row">
      <div class="col-lg-3">
        <div class="list-group">
          <p class="list-group-item" style="background-color: #f39b01; "><b>Kategori</b></p>
          <?php
            $kategori =$this->Model_ecommerce->getkategori();
            foreach ($kategori as $kat) {
           ?>
          <a  style="color: #555" href="<?php echo base_url("ecommerce/filter_barang?cari_barang= &id_kategori=".$kat->id_kategori."") ?>" class="list-group-item"><?php echo $kat->kategori ?><span class=" fa fa-chevron-circle-right pull-right"></span></a>
        <?php } ?>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9" style="background-color: #fff; padding:10px;margin-bottom: 30px;border-radius: 3px;">

      
         <div class="col-md-12" style="border-bottom: solid 3px #f39b01"> 
        <h4 class="text-center">PRODUK TERBARU</h4> 
      </div>
      <br> 
        <div class="row" >



          <?php $i=1; foreach ($barang as $b ) { ?>
          <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="thumbnail">
            <a href="<?php echo base_url('ecommerce/barang/').$b->id_barang ?>" style="text-decoration: none;" title="Click Untuk detail Barang">
              <img class="img-responsive" src="<?php echo base_url('assets/ecommerce/barang/').$b->gambar ?>" alt="Lights">
              <div class="caption">
                <p><?=substr($b->nama_barang, 0,17) ?></p>
                <p style="color: #f39b01; font-weight: bold; font-size: 20px">Rp <?php echo number_format($b->harga_jual, 0, ',', '.');?></p>
              </div>
            </a>
          </div>
        </div>
        <?php    } ?>
          
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
