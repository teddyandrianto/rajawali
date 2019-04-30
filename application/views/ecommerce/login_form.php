<div class="container">
	<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 box-daftar">
      <h2>Login akun sekarang</h2>
	  <p>Lengkapi form login dibawah ini :</p>
	  <form id="myform" method="POST" action="<?php echo base_url('ecommerce/autentifikasi_login') ?>">
	    <div class="form-group">
	      <label for="pwd">Email</label>
	      <input type="Email" class="form-control" name="email" id="email" placeholder="Email">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Password</label>
	      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
	    </div>
	    
	    <div class="form-group">
	    	<button class="btn btn-success btn-block">Login</button>
	    	<a class="btn btn-block " href="<?php echo base_url('ecommerce/Daftar') ?>">Daftar</a>
	    </div>
	  </form>
	</div>
	</div>
</div>
<br>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>

<script type="text/javascript">

$("#myform").validate({
  rules: {
    email: {
      required: true,
      email: true
    },
    password: "required",
   /* konfirmasi_password: {
      equalTo: "#password"
    },*/
  },
  messages: {
   
    email: {
      required: "Mohon masukan email anda",
      email: "Maaf masukan email anda tidak sesuai ikuti format name@domain.com"
    },
    password : "Mohon masukan password anda !"
  }
});




</script>