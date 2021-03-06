<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" type="text/css" href="">
  <title>Rajawali | Online Shop</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/ecommerce/img/logo1.png') ?>" />
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/ecommerce/') ?>vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/ecommerce/') ?>css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
  .serch{
    width: 180%;
    height: 40px; 
    margin-left: 88%;
    }
  .mk-5 {
    margin-top: 1rem !important;
  }
  .box-login {
    margin : 10px;
    
  }
  .shop-box{
    margin: 5px;
    text-decoration: none;
    color: #fff;

    

  }
  .shop-box  a  {
      text-decoration: none;
      color: #000;
    }
  .shop-box  a:hover  {
      text-decoration: none;
      color: #218838;
  }
  .detail-btn{
    font-weight: bold;
    width: 100px;
    padding: 15px 45px 15px;
  }
  .detail-btn:hover {
    font-weight: bold;
    width: 100px;
    padding: 15px 45px 15px;
    color: #218838;
  }
  .shop-tot{
    background-color: #f39b01;
    border-radius: 4px;
    padding: 1px;
    color :#fff;
    font-weight: bold;
    margin-top: 8px;
  }
  .box-daftar{
    margin: 10px;
    border-color: #000;
    background-color: #fff;
    margin-bottom: 100px;
    border-radius: 5px;    
  }

  .mda {
  
    background-color: #f7f7f7;
}
.box {
    position: relative;
    background-color: #fff;
    padding: 10px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}

  @media only screen and (max-width: 991px) {
  body {
    background-color: lightblue;
  }
  .serch{
    
    margin-left: 0px;
    width: 100%;
    margin-top:15px;
    }
  .box-login {
    margin : 10px;
  }
}
}

   
   .thumbnail:hover{ 
    opacity: 1;
    transform: rotate(0);
    background: rgba(0,0,0,.05);
  }

    .thumbnail {
  display: block;
  padding: 4px;
  margin-bottom: 20px;
  line-height: 1.42857143;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 4px;
  -webkit-transition: border .2s ease-in-out;
       -o-transition: border .2s ease-in-out;
          transition: border .2s ease-in-out;
}
.thumbnail > img,
.thumbnail a > img {
  margin-right: auto;
  margin-left: auto;
}
a.thumbnail:hover,
a.thumbnail:focus,
a.thumbnail.active {
  border-color: #337ab7;
}
.thumbnail .caption {
  padding: 9px;
  color: #333;
}
.thumbnail > img,
.thumbnail a > img,
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  display: block;
  max-width: 100%;
  height: auto;
}
  </style>
</head>

<body style="background-color: #f9f9f9;">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
    <div class="container">
      <img src="<?php  echo base_url('assets/ecommerce/img/logo1.png')?>" width='40px'> 
      <a class="navbar-brand" href="<?php echo base_url('ecommerce') ?>">&nbsp;Rajawali</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse" id="navbarResponsive">
      <form class="" role="search" action="<?php echo base_url('ecommerce/filter_barang') ?>" method="GET">
          <input type="text" class="form-control serch" name="cari_barang" value="<?php echo $this->input->get('cari_barang') ?>" placeholder="Search" required>
      </form>
        <ul class="navbar-nav ml-auto">
       <!--    <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li> -->
          <?php if(isset($_SESSION['login']) AND $_SESSION['login']['role']==2){ ?>
          <li class="dropdown">
            <a class="nav-link shop-tot" data-toggle="dropdown" href="#"><span class="fas fa-shopping-cart"></span><span class="shop-tot"> <?php echo $this->Model_ecommerce->getkeranjang('sum') ?></span></a>
            <ul class="dropdown-menu">
              <li class="shop-box">
                <?php $ker = $this->Model_ecommerce->getkeranjang('data');
                  foreach ($ker as $k) { ?>
                  <a href="#">
                    <div class="media">
                      <div class="media-left">
                        <img src="<?php echo base_url('assets/ecommerce/barang/').$k->gambar ?>" class="media-object" style="width:60px; padding:5px; height: 50px">
                      </div>
                      <div class="media-body">
                        <b class="media-heading"><?=substr($k->nama_barang, 0,15) ?></b><br>
                        <small><?=$k->jumlah_beli?> barang</small>
                      </div>
                    </div>
                  <hr>
                  </a>
                <?php } ?>
                  
                  <center><a class="detail-btn" href="<?php echo base_url('ecommerce/keranjang') ?>">lihat keranjang</a></center>
                </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('ecommerce/transaksi') ?>"><span class="fa fa-exchange"></span></a>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#"><?=$_SESSION['login']['nama']?></a>
              <ul class="dropdown-menu" style="width: -10px">
                <li class="nav-item">
                  <a style="color: #000"  class="nav-link" href="<?php echo base_url('ecommerce/profile') ?>">Pengaturan akun</a>
                </li>
                <li class="nav-item">
                  <a style="color: #000"  class="nav-link" href="<?php echo base_url('ecommerce/logout') ?>">logout</a>
                </li>
             </ul>
          </li>
          <?php }else{ ?>
          <li class="dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#"><i class="fa fa-sign-in"></i> Login</a>
            <ul class="dropdown-menu">
             <div class="box-login">
               <form action="<?php echo base_url('ecommerce/autentifikasi_login') ?>" method="POST" >
                 <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" class="form-control" id="username" name="email">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-success btn-block">login</button>
               </form>
             </div>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('ecommerce/daftar') ?>"><i class="fa fa-sign-up"></i> Daftar</a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Footer -->

