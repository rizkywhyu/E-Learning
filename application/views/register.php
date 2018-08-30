<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar Akun</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/stylelogin.css">
 <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  
  <link href="http://103.247.226.138/demo/ci_inventory/asset/css/fonts/stylesheet.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
 <body>
        <div class="login-box">
            
            <div class="header text-center">
                <h1 style="font-family:'norwester'; color:#2B2F3E; font-size:40px;">E-LEARNING</h1>
                <h5 style="font-family:'glober'; color:#2B2F3E; margin-bottom:20px;">Aplikasi Pembelajaran SMP dan SMA<br/>Kabupaten Bandung</h5>
            </div>
  <div class="register-box-body">
    <p class="login-box-msg">Daftar Akun</p>
	<form method="post" action="<?php echo base_url().'cont_akun/tambahAkun' ?>">
      <div class="form-group has-feedback">
        <input type="id" class="form-control" placeholder="NIS/Kode Guru/User Sekolah" name="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Ketik ulang password" name="password2" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="daftar">Daftar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="<?php echo base_url()."web/login"; ?>" class="text-center">Saya sudah memiliki akun</a>	
       <div id="cek">
           <div class="window" style="width:400px; height:200px;">
               <!-- <a href="#" class="close-button" title="Close">X</a> -->
               <h4>Apakah Ini Anda ?</h4>
               <p>Nama : <?php echo $this->session->userdata('nama') ?></p>
               <p>Sekolah : <?php echo $this->session->userdata('sekolah') ?></p>

               <a href="<?php echo base_url().'cont_akun/daftarSukses' ?>"><button class="btn btn-success btn-flat" name="btniya">Iya</button></a>
               <a href="#"> <button class="btn btn-danger btn-flat" >Tidak</button></a>
           </div>
       </div>
  </div>
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()."assets/"; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()."assets/"; ?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()."assets/"; ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
