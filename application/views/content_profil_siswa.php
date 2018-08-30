<section class="content-header">
      <h1>
        Profil
      </h1>
</section>
 <section class="content">
 <div class="row" id="Card">
 <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive" src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil_<?php echo $siswa->getnis() ?>.jpg" alt="User profile picture">


              <h3 class="profile-username text-center"><?php echo $siswa->getNama() ?></h3>

              <p class="text-muted text-center"><?php echo $siswa->getSekolah() ?></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
  <div class="col-md-9">        
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-user"></i> Nama</strong>

              <p class="text-muted">
                <?php echo $siswa->getNama() ?>
              </p>

              <strong><i class="fa fa-user"></i> NIS</strong>

              <p class="text-muted">
                <?php echo $siswa->getnis() ?>
              </p>

              <strong><i class="fa fa-university"></i> Sekolah</strong>

              <p class="text-muted">
                <?php echo $siswa->getSekolah() ?>
              </p>

              <strong><i class="fa fa-map-marker"></i> Alamat</strong>

              <p class="text-muted">
              <?php echo $siswa->getAlamat() ?>
              </p>

              <strong><i class="fa fa-mobile-phone"></i> Nomor HP</strong>
              <p class="text-muted">
              <?php echo $siswa->getNohp() ?>
              </p>

              <strong><i class="glyphicon glyphicon-envelope"></i> Email</strong>
              <p class="text-muted">
              <?php echo $siswa->getEmail() ?>
              </p>

               <strong><i class="glyphicon glyphicon-envelope"></i> No HP Orang tua</strong>
              <p class="text-muted">
              <?php echo $siswa->getNmrOrtu() ?>
              </p>

              <a href ="<?php echo base_Url().'Cont_siswa/ViewEditProfil' ?>"> <button class="btn btn-success pull-right" type="submit">Edit Profil</button> </a>

              <a href="#ubahPass">
              <button class="btn btn-primary pull-right" type="submit" style="margin-right: 18px;">Ubah Password</button></a>
              
              <div id="ubahPass">
                <div class="window" style="width:420px; height:240px;">
               <a href="#" class="close-button" title="Close">X</a>
                 <form method="post" action="<?php echo base_Url().'Cont_siswa/updatePass' ?>">
                  <div class="box-body">
                    <div class="form-group">
                     <label >Password Baru</label>
                     <input class="form-control" type="password" name="pass1" required>
                    </div>
                    <div class="form-group">
                     <label >Ketik Ulang Password Baru</label>
                     <input class="form-control" type="password" name="pass2" required>
                    </div>
                  <button style="padding-left:30px; padding-right: 30px;" class="btn btn-success btn-flat pull-center" >Ubah Password</button>                 
                </div>
                </form>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
 
  </div>
      	<!-- <script>
    		document.getElementById('Card1').style.display = "none";  		
		</script> -->
     <!-- /.col -->
</section>