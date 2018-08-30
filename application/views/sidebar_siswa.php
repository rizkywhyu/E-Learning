  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil_<?php echo $siswa->getnis() ?>.jpg" alt="User Image" style="max-width:100px; margin-left: 50px;padding-bottom: 18px;padding-top: 18px;">
        </div>
        <div class="pull-left info" style="position: relative; left: 30px; text-align:center">
          <p>
          <?php
            echo $siswa->getNama();
          ?>  
          </p>
		  <a>Status : Siswa/i</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
		<li>
          <a href="<?php echo base_url().'Cont_siswa/Beranda'?>">
          <i class="glyphicon glyphicon-home"></i> 
          <span>Beranda</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
		<!-- <li>
          <a href="<?php echo base_Url().'Cont_siswa/ViewProfil' ?>">
            <i class="fa fa-user"></i> <span>Profil</span>
            <span class="pull-right-container"></span>
          </a>
        </li> -->
		<!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Mata Kuliah</span>
            <span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo Base_url()."Cont_siswa/viewTugas" ?>"><i class="fa fa-circle-o"></i>Tugas</a></li>
            <li><a href="<?php echo base_Url().'Cont_siswa/ViewMateri' ?>"><i class="fa fa-circle-o"></i>Materi</a></li>
            <li><a href="<?php echo base_Url().'Cont_siswa/ViewKuis' ?>"><i class="fa fa-circle-o"></i>Kuis</a></li>
          </ul>
        </li> -->
        <li>
          <a href="<?php echo base_Url().'Cont_siswa/ViewForum' ?>">
            <i class="fa fa-comments-o"></i> <span>Forum</span>
            <span class="pull-right-container"></span>
          </a>
      </li>
		<li>
          <a href="<?php echo base_Url().'Cont_siswa/ViewNilai' ?>">
            <i class="fa fa-files-o"></i> <span>Laporan Nilai</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <!-- <li>
          <a href="<?php echo base_Url().'Cont_siswa/ViewNilais' ?>">
            <i class="fa fa-files-o"></i> <span>Laporan Nilai</span>
            <span class="pull-right-container"></span>
          </a>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
