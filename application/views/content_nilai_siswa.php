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
              <h3 class="box-title">Laporan Nilai</h3>
              <div>
              <a href="<?php echo base_url().'cont_siswa/cetakLaporan/ujian' ?>">
              <button class="btn btn-primary" style="margin-top:10px;"><i class="fa fa-print"></i> Cetak Laporan Nilai Ujian</button></a>
              <a href="<?php echo base_url().'cont_siswa/cetakLaporan/tugas' ?>">
              <button class="btn btn-primary" style="margin-top:10px;"><i class="fa fa-print"></i> Cetak Laporan Nilai Tugas</button></a></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mata Pelajaran</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($datamp->result_array() as $c){
                 ?>
                <tr>
                  <td><?php echo $c['nama'] ?></td>
                  <td>
                    <?php 
                      $indeks = $siswa->getKelas();
                      //$Ke->saveNilaiIndeks($indeks,$siswa->getnis());
                      echo $indeks;
                    ?>  
                  </td>
                  <td>
                    <a href="<?php echo base_url().'cont_siswa/viewNilaimp/'.$c['kodemp'] ?>">
                    <button class="btn btn-primary" style="padding-left:6px;padding-right:6px;padding-top:4px;padding-bottom:4px;"><i class="fa fa-eye"></i></button>
                    </a>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
                <?php 
                if(isset($dataujian) || isset($dataTugas)) {
                  echo '
                  <h4 class="box-title">Detail Nilai '.$mp->getNama().'</h4>
                  <div class="col-md-6" style="padding-left:0px;">
                    <div class="box" >
                      <div class="box-header">
                        <h3 class="box-title">Nilai Tugas</h3>
                      </div>
                      <div class="box-body">
                        <table class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Nama Tugas</th>
                            <th>Nilai</th>
                          </tr>
                          </thead>
                          <tbody>';
                  foreach($dataTugas->result_array() as $c){
                          echo '<tr>
                          <td>'.$c['namatugas'].'</td>
                          <td>'.substr($c['nilai'],0,5).'</td></tr>';
                  }
                  echo '</tbody></table>
                      </div>
                    </div>
                  </div>';

                  echo '
                  <div class="col-md-6" style="padding-left:0px;">
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
                          <tbody>';
                  foreach($dataujian->result_array() as $c){
                          echo '<tr>
                          <td>'.$c['namaujian'].'</td>
                          <td>'.substr($c['nilai'],0,5).'</td></tr>';
                  }
                  echo '</tbody></table>
                      </div>
                  </div>';
                  }
                else{

                } 

                ?>
          <!-- /.box -->
        </div>

        <!-- /.col -->
      </div>
      </section>
      <!-- /.row -->
    </section>
<script src="<?php echo base_url()."assets/"; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<!-- <script src="<?php //echo base_url()."assets/"; ?>bootstrap/js/bootstrap.min.js"></script> -->
<!-- DataTables -->
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>

