<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/ecommerce/') ?>vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/ecommerce/') ?>css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
    background-color: #218838;
    border-radius: 4px;
    padding: 1px;
    color :#fff;
    font-weight: bold;
    margin-top: 8px;
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
  </style>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Rajawali</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse" id="navbarResponsive">
      <form class="" role="search" action="http://localhost/rajawali/ecommerce#" method="POST">
          <input type="text" class="form-control serch" placeholder="Search">
      </form>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="dropdown">
            <a class="nav-link shop-tot" data-toggle="dropdown" href="#"><span class="fas fa-shopping-cart"></span><span class="shop-tot">10</span></a>
            <ul class="dropdown-menu">
              <li class="shop-box">
                  <a href="#">
                    <div class="media">
                      <div class="media-left">
                        <img src="http://placehold.it/700x400" class="media-object" style="width:60px; padding:5px; height: 50px">
                      </div>
                      <div class="media-body">
                        <b class="media-heading">nama barang</b><br>
                        <small>deskripsi barang yang..</small><br>
                        <small>10 barang</small>
                      </div>
                    </div>
                  <hr>
                  </a>
                   <a href="haj">
                    <div class="media">
                      <div class="media-left">
                        <img src="http://placehold.it/700x400" class="media-object" style="width:60px; padding:5px; height: 50px">
                      </div>
                      <div class="media-body">
                        <b class="media-heading">nama barang</b><br>
                        <small>deskripsi barang yang..</small><br>
                        <small>10 barang</small>
                      </div>
                    </div>
                  <hr>
                  </a>
                  <center><a class="detail-btn" href="#">lihat keranjang</a></center>
                </li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Login</a>
            <ul class="dropdown-menu">
             <div class="box-login">
               <form>
                 <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd">
                </div>
                <button type="submit" class="btn btn-success btn-block">Submit</button>
               </form>
             </div>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Daftar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Footer -->

