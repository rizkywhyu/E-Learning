<header class="main-header">
<a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>LN</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Web </b>E-Learning</span>
    </a>
  <nav class="navbar navbar-static-top">
    <div class="container-fluid">
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <form class="navbar-form navbar-left" role="search" >
        <div class="form-group">
          <input type="text" class="form-control" id="navbar-search-input" placeholder="Cari" style="padding-right: 90px;">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- logo akun -->
              <i class="fa fa-user"></i> 
              <span class="hidden-xs">
                <?php
                  echo $admSklh->getNama();
                ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/admin.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php
                    echo $admSklh->getNama();
                  ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_Url().'cont_akun/Logout' ?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
      </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>