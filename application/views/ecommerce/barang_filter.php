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

      <div class="col-lg-9 my-4">

       
     

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
