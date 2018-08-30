  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil_<?php echo $guru->getKodeguru() ?>.jpg" alt="User Image" style="max-width:100px; margin-left: 50px;padding-bottom: 18px;padding-top: 18px;">
        </div>
        <div class="pull-left info" style="position: relative; left: 30px; text-align:center">
          <p>
          <?php
            echo $guru->getNama();
          ?>  
          </p>
		  <a>Status : Guru</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
		<li>
          <a href="<?php echo base_url().'Cont_guru/Beranda'?>">
          <i class="glyphicon glyphicon-home"></i> 
          <span>Beranda</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_Url().'Cont_guru/ViewForum' ?>">
            <i class="fa fa-comments-o"></i> <span>Forum</span>
            <span class="pull-right-container"></span>
          </a>
      </li>
		<li>
          <a href="<?php echo base_url().'cont_guru/viewNilai' ?>">
            <i class="fa fa-files-o"></i> <span>Penilaian dan Laporan</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
