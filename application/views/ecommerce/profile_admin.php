<div class="content-wrapper">
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      
    </section>
    <section class="content">

      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
             <?php if ($_SESSION['login']['foto'] == '') {?>
              <img src="<?php echo base_url('assets');?>/admin/profile/not-profile-admin.png" class="profile-user-img img-responsive img-rounded" alt="Profile picture">
             <?php }else{ ?>
          <img src="<?php echo base_url('assets');?>/admin/profile/<?=$_SESSION['login']['foto'];?>" class="profile-user-img img-responsive img-circle" alt="Profile picture">
           <?php } ?>
              
              <h3 class="profile-username text-center"><?=$_SESSION['login']['nama_user'];?></h3>
              <p class="text-muted text-center">Admin</p>
            </div>
        
              <div class="box-body">
                  </center>
                </div>
              </div>
          </div>
          <div class="col-md-9">
             <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Biodata User</h3>
              </div>
         <div class="box-body">
                <div class="form-horizontal">
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="Username" name="username" placeholder="Username" value="<?php echo $_SESSION['login']['username'];?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">  
                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Name" value="<?=$_SESSION['login']['nama_user'];?>" maxlength="40" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Telpon</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $_SESSION['login']['telpon'];?>" readonly>
                    </div>
                  </div>
                </div>
              </div>
        </div>
          <div class="box box-primary">
         <div class="box-body">
                <form  action="<?php echo base_url('admin/update_password');?>" method="post">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password Lama</label>
                      <input type="password" class="form-control" name="password_lama" placeholder="Password Lama" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password Baru</label>
                    <input type="password" class="form-control" name="password_baru" placeholder="Password Baru" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confrim" placeholder="Konfirmasi Password" required>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <button style="margin-top: 24px;" type="submit" class="btn btn-success">Ubah Password</button>
                    </div>
                  </div>
                </form>
              </div>
        </div>
      </div>
    </div>
    </div>
    </section>
           