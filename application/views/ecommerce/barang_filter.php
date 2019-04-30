  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3 mk-5">

        
       <div class="list-group">
          <p class="list-group-item" style="background-color: #f39b01; "><b>Kategori</b></p>
          <?php
            $kategori =$this->Model_ecommerce->getkategori();
            foreach ($kategori as $kat) {
           ?>
          <a  style="color: #555" href="<?php echo base_url("ecommerce/filter_barang?cari_barang= &id_kategori=".$kat->id_kategori."") ?>" class="list-group-item"><?php echo $kat->kategori ?><span class=" fa fa-chevron-circle-right pull-right"></span></a>
        <?php } ?>
      
          <div class="list-group-item " style="background-color: #f7f7f7;" >Rentan Harga</div>
          <div class="list-group-item">
            <form action="<?php echo base_url('ecommerce/filter_barang') ?>" method="GET">
            <div class="form-group">
              <input type="hidden" name="cari_barang" value="<?php echo $this->input->get('cari_barang') ?>">
              <input type="hidden" name="id_kategori" value="<?php echo $this->input->get('id_kategori') ?>">
              <input type="number" class="form-control input-sm" name="min" id="nama" value="<?php echo $this->input->get('min') ?>" placeholder="Min">
            </div>
            <div class="form-group">
              <input type="number" class="form-control input-sm" name="max" value="<?php echo $this->input->get('max') ?>" id="nama" placeholder="Max">
            </div>
            <div class="form-group">
              <button class="btn btn-warning btn-sm pull-right">Tampilkan</button>
            </div>
            </form>

          </div>
          
        </div>

      </div>

      <!-- /.col-lg-3 -->

      <div class="col-lg-9 my-4" style="background-color: #fff;border-radius: 3px;">

         <div class="col-md-12" style="border-bottom: solid 3px #f39b01"> 
        <h4 class="text-center">PRODUK</h4> 
      </div>
      <br> 
      
       
     

        <div class="row">
          <?php foreach ($barang as $b ) { ?>
          
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
        <?php } ?>
          
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
