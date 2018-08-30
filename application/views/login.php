<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Pembelajaran SMP dan SMA di Kabupaten Bandung</title>
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
  <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  
  <link href="<?php echo base_url()."asset/"; ?>/css/fonts/stylesheet.css" rel="stylesheet" type="text/css">
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
 <body>
      <div class="col-md-12">
        <div class="login-box">
            
            <div class="header text-center">
                <h1 style="font-family:'norwester'; color:#2B2F3E; font-size:40px;">E-LEARNING</h1>
                <h5 style="font-family:'glober'; color:#2B2F3E; margin-bottom:20px;">Aplikasi Pembelajaran SMP dan SMA<br/>Kabupaten Bandung</h5>
            </div>
            <form action="<?=base_url('cont_akun/verifikasilogin')?>" method="post">
                <div class="login-box">

                    <div class="form-group">
                        <input type="username" name="username" class="form-control" placeholder="username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="password"/>
                    </div>          
                    <div class="form-group">

                        <input type="checkbox" name="remember_me"/> Ingat saya
                        
                            
                            <a class="pull-right" onclick="myFunction()" href="<?php echo base_url()."web/register"; ?>">Register</a>
                    
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>  
                    
                    
                </div>
            </form>
        </div>
        </div>
       
<script src="<?php echo base_url()."assets/"; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()."assets/"; ?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()."assets/"; ?>plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap 3.3.6 -->
        

    </body>
</html>