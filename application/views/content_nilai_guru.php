<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.css">

<section class="content-header">
      <h1>
        Laporan Nilai
      </h1>
</section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Siswa</h3>
              <div>
              <div class="form-group">
                <a data-target="#cetak" data-toggle="modal">
                <button class="btn btn-primary" style="margin-top:10px;"><i class="fa fa-print"></i> Cetak Laporan Nilai Tugas/Soal</button></a></div>
              </div>
              <div class="form-group">
                <select id= "pil" name="Selection" onchange="check()" class="form-control" style="width:25%;">
                  <option value="None">--Pilih Pelaporan--</option>
                  <option value="all">Tampikan Semua Siswa</option> 
                  <option value="kelas">Berdasarkan Kelas</option>
                  <option value="matpel">Berdasarkan Pelajaran</option>
                  <option value="km">Berdasarkan Kelas dan Mata Pelajaran</option>
                  <option value="forum">Berdasarkan Forum</option>
                </select>
              </div>
              <div class="form-group">

                <select id= "pilKelas" name="Selection" onchange="pilKelas(this.options[this.selectedIndex].value)" class="form-control" style="width:25%;">
                  <option value="None">--Pilih Kelas--</option>
                  <?php 
                  $tempKelas = null;
                  foreach($datamp->result_array() as $c) {
                    if($c['kelas'] != $tempKelas){
                      echo '
                            <option value="'.$c['kelas'].'">'.$c['kelas'].'</option>
                      ';
                      $tempKelas = $c['kelas'];
                    }
                  }
                    ?>
                </select>

                <select id= "pilMp" name="Selection" onchange="pilMp(this.options[this.selectedIndex].value)" class="form-control" style="width:25%;">
                  <option value="None">--Pilih Mata Pelajaran--</option>
                  <?php foreach($datamp->result_array() as $c) {
                    echo '
                          <option value="'.$c['kodemp'].'">'.$c['nama'].'</option>
                    ';
                  }
                    ?>
                </select>

                <select id= "km" name="Selection" onchange="pilkm(this.options[this.selectedIndex].value)" class="form-control" style="width:25%;">
                  <option value="None">--Pilih Kelas dan Mata Pelajaran--</option>
                  <?php foreach($datamp->result_array() as $c) {
                    echo '
                          <option value="'.$c['kelas'].'_'.$c['kodemp'].'">'.$c['kelas'].' '.$c['nama'].'</option>
                    ';
                  }
                    ?>

                </select>

                <select id= "forum" name="Selection" onchange="pilForum(this.options[this.selectedIndex].value)" class="form-control" style="width:25%;">
                  <option value="None">--Pilih Forum--</option>
                  <?php foreach($dataForum->result_array() as $c) {
                    echo '
                          <option value="'.$c['idForum'].'">'.$c['nama'].'</option>
                    ';
                  }
                    ?>

                </select>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="tabelAll">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Siswa</th>
                  <th>NIS</th>
                  <th>Mata Pelajaran</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0; 
                $dataArray = array();
                foreach($dataAll->result_array() as $c){
                  $i++;
                  $siswa = new siswa();
                  $mp = new matapelajaran();
                  $siswa = $siswa->getDetailsiswa($c['nis']);
                  $mp = $mp->getDetailmp($c['kodemp']);
                 ?>
                <tr>
                  <td><?php echo $siswa->getNama() ?></td>
                  <td><?php echo $siswa->getnis() ?></td>
                  <td><?php echo $mp->getNama() ?></td>
                  <td><?php echo $siswa->getKelas() ?></td>
                  <td>
                    <a href="<?php echo '#modalNilai'.$i ?>" data-toggle="modal">
                    <button class="btn btn-primary" style="padding-left:6px;padding-right:6px;padding-top:4px;padding-bottom:4px;"><i class="fa fa-eye"></i></button>
                    </a>
                  </td>
                </tr>
                 
                <?php
                 $dataArray += array(
                  'nis'.$i => $siswa->getnis(),
                  'kodemp'.$i => $mp->getKodemp()
                  );
                } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
             <!-- /.box-header -->
            <div class="box-body" id="tabelKelas">
              <table id="example12" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Siswa</th>
                  <th>NIS</th>
                  <th>Mata Pelajaran</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0; 
                if(isset($kelasPil)){
                $dataArray = null;  
                $dataArray = array();
                foreach($dataAll->result_array() as $c){
                if($c['kelas']==$kelasPil) {
                  $i++;
                  $siswa = new siswa();
                  $mp = new matapelajaran();
                  $siswa = $siswa->getDetailsiswa($c['nis']);
                  $mp = $mp->getDetailmp($c['kodemp']);
                 ?>
                <tr>
                  <td><?php echo $siswa->getNama() ?></td>
                  <td><?php echo $siswa->getnis() ?></td>
                  <td><?php echo $mp->getNama() ?></td>
                  <td><?php echo $siswa->getKelas() ?></td>
                  <td>
                    <a href="<?php echo '#modalNilai'.$i ?>" data-toggle="modal">
                    <button class="btn btn-primary" style="padding-left:6px;padding-right:6px;padding-top:4px;padding-bottom:4px;"><i class="fa fa-eye"></i></button>
                    </a>
                  </td>
                </tr>
                 
                <?php
                 $dataArray += array(
                  'nis'.$i => $siswa->getnis(),
                  'kodemp'.$i => $mp->getKodemp()
                  );
                } } }?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
              <!-- /.box-header -->
            <div class="box-body" id="tabelMp">
              <table id="example13" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Siswa</th>
                  <th>NIS</th>
                  <th>Mata Pelajaran</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0; 
                if(isset($mps)){
                  $dataArray = null;
                  $dataArray = array();
                foreach($dataAll->result_array() as $c){
                if($c['kodemp']==$mps) {
                  $i++;
                  $siswa = new siswa();
                  $mp = new matapelajaran();
                  $siswa = $siswa->getDetailsiswa($c['nis']);
                  $mp = $mp->getDetailmp($c['kodemp']);
                 ?>
                <tr>
                  <td><?php echo $siswa->getNama() ?></td>
                  <td><?php echo $siswa->getnis() ?></td>
                  <td><?php echo $mp->getNama() ?></td>
                  <td><?php echo $siswa->getKelas() ?></td>
                  <td>
                    <a href="<?php echo '#modalNilai'.$i ?>" data-toggle="modal">
                    <button class="btn btn-primary" style="padding-left:6px;padding-right:6px;padding-top:4px;padding-bottom:4px;"><i class="fa fa-eye"></i></button>
                    </a>
                  </td>
                </tr>
                 
                <?php
                 $dataArray += array(
                  'nis'.$i => $siswa->getnis(),
                  'kodemp'.$i => $mp->getKodemp()
                  );
                } } }?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
              <!-- /.box-header -->
            <div class="box-body" id="tabelkm">
              <table id="example14" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Siswa</th>
                  <th>NIS</th>
                  <th>Mata Pelajaran</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0; 
                if(isset($kmp)){
                  $dataArray = null;
                  $dataArray = array();
                foreach($dataAll->result_array() as $c){
                if($c['kodemp']==$kmp && $c['kelas']==$kelas) {
                  $i++;
                  $siswa = new siswa();
                  $mp = new matapelajaran();
                  $siswa = $siswa->getDetailsiswa($c['nis']);
                  $mp = $mp->getDetailmp($c['kodemp']);
                 ?>
                <tr>
                  <td><?php echo $siswa->getNama() ?></td>
                  <td><?php echo $siswa->getnis() ?></td>
                  <td><?php echo $mp->getNama() ?></td>
                  <td><?php echo $siswa->getKelas() ?></td>
                  <td>
                    <a href="<?php echo '#modalNilai'.$i ?>" data-toggle="modal">
                    <button class="btn btn-primary" style="padding-left:6px;padding-right:6px;padding-top:4px;padding-bottom:4px;"><i class="fa fa-eye"></i></button>
                    </a>
                  </td>
                </tr>
                 
                <?php
                 $dataArray += array(
                  'nis'.$i => $siswa->getnis(),
                  'kodemp'.$i => $mp->getKodemp()
                  );
                } } }?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-body" id="tabelForum">
              <table id="example14" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Siswa</th>
                  <th>NIS</th>
                  <th>Mata Pelajaran</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0; 
                if(isset($dataNisForum)){
                  $dataArray = null;
                  $dataArray = array();
                foreach($dataNisForum->result_array() as $c){
                  $i++;
                  $siswa = new siswa();
                  $mp = new matapelajaran();
                  $siswa = $siswa->getDetailsiswa($c['nis']);
                  $mp = $mp->getDetailmp($c['kodemp']);
                 ?>
                <tr>
                  <td><?php echo $siswa->getNama() ?></td>
                  <td><?php echo $siswa->getnis() ?></td>
                  <td><?php echo $mp->getNama() ?></td>
                  <td><?php echo $siswa->getKelas() ?></td>
                  <td>
                    <a href="<?php echo '#modalNilai'.$i ?>" data-toggle="modal">
                    <button class="btn btn-primary" style="padding-left:6px;padding-right:6px;padding-top:4px;padding-bottom:4px;"><i class="fa fa-eye"></i></button>
                    </a>
                  </td>
                </tr>
                 
                <?php
                 $dataArray += array(
                  'nis'.$i => $siswa->getnis(),
                  'kodemp'.$i => $mp->getKodemp()
                  );
               } }?>
                </tbody>
              </table>
            </div>
            
            

          </div>

          <!-- /.box -->
        </div>

        <!-- /.col -->
      </div>
      <?php 
      $j = 0;
      foreach($dataArray as $d) { $j++;
      ?>
      <div class="modal fade" id="<?php echo 'modalNilai'.$j ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Daftar Nilai</h4>
                                        </div>
                                        <form method="post">
                                        <div class="modal-body">
                                            <h4 class="box-title">Detail Nilai</h4>
                                              <div class="col-md-6">
                                                <div class="box" >
                                                  <div class="box-header">
                                                    <h3 class="box-title">Nilai Tugas</h3>
                                                  </div>
                                                  <div class="box-body">
                                                    <table class="table table-bordered table-striped">
                                                      <thead>
                                                        <th>Nama Tugas</th>
                                                        <th>Nilai</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                                      <?php
                                                      $niss = $dataArray['nis'.$j];
                                                      $tugas = new tugas();
                                                      $dataTugas = $tugas->getNilaipermp($dataArray['nis'.$j],"tugas",$dataArray['kodemp'.$j]);
                                                      $jmlTugas=0;
                                                      foreach($dataTugas->result_array() as $c){
                                                        $jmlTugas++;
                                                              echo '<tr>
                                                              <input type="hidden" name="kodeTugas_'.$jmlTugas.'" value="'.$c['kodetugas'].'"></input>
                                                              <td>'.$c['namatugas'].'</td>
                                                              <td>
                                                            <input type="number" min="0" max="100" step="0.01" name="nTugas_'.$jmlTugas.'" value="'.substr($c['nilai'],0,5).'" ></input>
                                                            </td>';
                                                      }
                                                      ?>
                                                      </tbody></table>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-md-6">
                                              <div class="box" >
                                                <div class="box-header">
                                                  <h3 class="box-title">Nilai ujian</h3>
                                                </div>
                                                <div class="box-body">
                                                  <table class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                      <th>Nama ujian</th>
                                                      <th>Nilai</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $ujian = new ujian();
                                                    $dataujian = $ujian->getNilaipermp($dataArray['nis'.$j],"ujian",$dataArray['kodemp'.$j]);
                                                    $jmlujian = 0;
                                                    foreach($dataujian->result_array() as $c){
                                                      $jmlujian++;
                                                            echo '<tr>
                                                            <input type="hidden" name="kodeujian_'.$jmlujian.'" value="'.$c['kodeujian'].'"></input>
                                                            <td>'.$c['namaujian'].'</td>
                                                            <td>
                                                            <input type="number" min="0" max="100" step="0.01" name="nujian_'.$jmlujian.'" value="'.substr($c['nilai'],0,5).'" ></input>
                                                            </td>';
                                                    }
                                                    ?>
                                                    </tbody></table>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" formaction="<?php echo base_url().'cont_guru/saveNilai/'.$jmlTugas.'/'.$jmlujian.'/'.$niss ?>" class="btn btn-primary">Simpan Nilai</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
    <?php } ?>
    <div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Cetak Laporan</h4>
                                        </div>
                                        <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                              <select name="pilCetak" id="pilCetak" class="form-control">
                                                <option value="None">--Pilih Laporan Nilai Tugas/Soal--</option>
                                                <?php foreach($datamp->result_array() as $c) {
                                                  echo '
                                                        <option value="'.$c['kelas'].'_'.$c['kodemp'].'">'.$c['kelas'].' '.$c['nama'].'</option>
                                                  ';
                                                }
                                                  ?>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" formaction="<?php echo base_url().'cont_guru/toExcelSoal/' ?>" class="btn btn-primary" onClick="cekCetak()" >Cetak Laporan Hasil Pengerjaan Soal</button>
                                            <button type="submit" formaction="<?php echo base_url().'cont_guru/toExcelTugas/' ?>" class="btn btn-primary">Cetak Laporan Hasil Pengerjaan Tugas</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
      </section>
     
      <!-- /.row -->
<script src="<?php echo base_url()."assets/"; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<!--<script src="<?php //echo base_url()."assets/"; ?>bootstrap/js/bootstrap.min.js"></script>-->
<!-- DataTables -->
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example12").DataTable();
    $("#example13").DataTable();
    $("#example14").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
  if(<?php echo $idx ?> == 0){
    document.getElementById('pilKelas').style.display = "none";
    document.getElementById('pilMp').style.display = "none";
    document.getElementById('tabelAll').style.display = "none";
    document.getElementById('tabelKelas').style.display = "none";
    document.getElementById('tabelMp').style.display = "none";
    document.getElementById('km').style.display = "none";
    document.getElementById('tabelkm').style.display = "none";
    document.getElementById('forum').style.display = "none";
    document.getElementById('tabelForum').style.display = "none";
  }
  else if(<?php echo $idx ?> == 1){
    document.getElementById('pilKelas').style.display = "block";
    document.getElementById('tabelKelas').style.display = "block";
    document.getElementById('pilMp').style.display = "none";
    document.getElementById('tabelAll').style.display = "none";
    document.getElementById('tabelMp').style.display = "none";
    document.getElementById('km').style.display = "none";
    document.getElementById('tabelkm').style.display = "none";
    document.getElementById('forum').style.display = "none";
    document.getElementById('tabelForum').style.display = "none";
  }
  else if(<?php echo $idx ?> == 2){
    document.getElementById('pilKelas').style.display = "none";
    document.getElementById('tabelKelas').style.display = "none";
    document.getElementById('pilMp').style.display = "block";
    document.getElementById('tabelAll').style.display = "none";
    document.getElementById('tabelMp').style.display = "block";
    document.getElementById('km').style.display = "none";
    document.getElementById('tabelkm').style.display = "none";
    document.getElementById('forum').style.display = "none";
    document.getElementById('tabelForum').style.display = "none";
  }
  else if(<?php echo $idx ?> == 3){
    document.getElementById('pilKelas').style.display = "none";
    document.getElementById('pilMp').style.display = "none";
    document.getElementById('tabelAll').style.display = "none";
    document.getElementById('tabelKelas').style.display = "none";
    document.getElementById('tabelMp').style.display = "none";
    document.getElementById('km').style.display = "block";
    document.getElementById('tabelkm').style.display = "block";
    document.getElementById('forum').style.display = "none";
    document.getElementById('tabelForum').style.display = "none";
  }
  else if(<?php echo $idx ?> == 4){
    document.getElementById('pilKelas').style.display = "none";
    document.getElementById('pilMp').style.display = "none";
    document.getElementById('tabelAll').style.display = "none";
    document.getElementById('tabelKelas').style.display = "none";
    document.getElementById('tabelMp').style.display = "none";
    document.getElementById('km').style.display = "none";
    document.getElementById('tabelkm').style.display = "none";
    document.getElementById('forum').style.display = "block";
    document.getElementById('tabelForum').style.display = "block";
  }

  function check() {
   var val = document.getElementById('pil').value;
   if(val=='all') {
    document.getElementById('tabelAll').style.display = "block";
    document.getElementById('tabelKelas').style.display = "none";
    document.getElementById('tabelMp').style.display = "none";
    document.getElementById('tabelForum').style.display = "none";
    document.getElementById('pilKelas').style.display = "none";
    document.getElementById('pilMp').style.display = "none";
    document.getElementById('km').style.display = "none";
    document.getElementById('tabelkm').style.display = "none";
    document.getElementById('forum').style.display = "none";
   } else if(val == 'kelas') {
    document.getElementById('pilKelas').style.display = "block";
    document.getElementById('tabelAll').style.display = "none";
    document.getElementById('pilMp').style.display = "none";
    document.getElementById('km').style.display = "none";
    document.getElementById('forum').style.display = "none";
   } else if(val == 'matpel') {
   document.getElementById('pilMp').style.display = "block";
   document.getElementById('pilKelas').style.display = "none";
   document.getElementById('tabelAll').style.display = "none";
   document.getElementById('km').style.display = "none";
   document.getElementById('forum').style.display = "none";
   } else if(val == 'km') {
    document.getElementById('pilMp').style.display = "none";
   document.getElementById('pilKelas').style.display = "none";
   document.getElementById('tabelAll').style.display = "none";
   document.getElementById('km').style.display = "block";
   document.getElementById('forum').style.display = "none";
   } else if(val == 'forum') {
    document.getElementById('pilMp').style.display = "none";
   document.getElementById('pilKelas').style.display = "none";
   document.getElementById('tabelAll').style.display = "none";
   document.getElementById('km').style.display = "none";
   document.getElementById('forum').style.display = "block";
   }
  }

  function pilKelas(kelas){
    window.location = "<?php echo base_url().'cont_guru/viewNilaiKelas/'?>"+kelas;
  }

  function pilMp(mp){
    window.location = "<?php echo base_url().'cont_guru/viewNilaiMp/'?>"+mp;
  }

  function pilkm(km){
    window.location = "<?php echo base_url().'cont_guru/viewNilaiKm/'?>"+km;
  }
  function pilForum(idforum){
    window.location = "<?php echo base_url().'cont_guru/viewNilaiperForum/'?>"+idforum;
  }

  function cekCetak(){
    if(document.getElementById('pilCetak').value == "none"){
      return false;
    }
    else {
      return true;
    }
  }

</script>

