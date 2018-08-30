<section class="content-header">
      <h1>
        Profil
      </h1>
</section>
 <section class="content">
 <div class="row" id="Card">
 <div class="col-md-4">

          <!-- Profile Image -->
       <form method="post" action="<?php echo base_Url().'Cont_Akun/updatesiswa/'.$siswa->getnis() ?>" enctype="multipart/form-data">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive" src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil_<?php echo $siswa->getnis() ?>.jpg" alt="User profile picture">


              <h3 class="profile-username text-center">Foto Profil</h3>

              <label for="exampleInputFile">Ganti Foto</label>
                  <input type="file" name="berkas">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
 <div class="col-md-7">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Profil</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">
                <div class="form-group">
                  <label >Nama</label>
                  <input class="form-control" name="nama" value="<?php echo $siswa->getNama() ?>">
                </div>
                <div class="form-group">
                  <label>Sekolah</label>
                  <input class="form-control" name="sekolah" disabled="" value="<?php echo $siswa->getSekolah() ?>">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input class="form-control" name="alamat" value="<?php echo $siswa->getAlamat() ?>">
                </div>
                <div class="form-group">
                  <label>Nomor HP</label>
                  <input class="form-control" name="nohp" value="<?php echo $siswa->getNohp() ?>">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $siswa->getEmail() ?>">
                </div>
                 <div class="form-group">
                  <label>No HP Orang tua</label>
                  <input type="nmrOrtu" class="form-control" name="nmrOrtu" value="<?php echo $siswa->getNmrOrtu() ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" formaction="<?php echo base_Url().'Cont_siswa/viewProfil' ?>" class="btn btn-danger pull-right" name="kembali" style="padding-left: 30px;padding-right: 30px;margin-bottom: 10px;margin-left: 10px;">Kembali</button>
                <button type="submit" class="btn btn-success pull-right" name="update" style="padding-left: 50px;padding-right: 50px;margin-bottom: 10px;">Ubah</button>
              </div>
            </form>
       </div>
          </div>
          <!-- /.box -->
  </div>
      	<!-- <script>
    		document.getElementById('Card1').style.display = "none";  		
		</script> -->
     <!-- /.col -->
</section>