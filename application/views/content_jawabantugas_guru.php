 <section class="content-header">
      <h1>
        Penilaian Jawaban Tugas
      </h1>
</section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Nilai</h3>
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
          <form method="post" >
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>NIS</th>
                  <th>File</th>
                  <th>Nilai</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $jmlsiswa=0;
                foreach($dataJwbTugas->result_array() as $c){
                  $jmlsiswa++;
                  $daftarsiswa = new siswa();
                  $daftarsiswa = $daftarsiswa->getDetailsiswa($c['nis']);
                  $jwbtugas = $jwbtugas->getDetailJawabanTugas($c['kodejt'],$c['nis']);
                  $tugas = $tugas->getDetailTugas($c['kodetugas']);
                  $nilai = $tugas->getNilai($c['nis'],$c['kodetugas'],"tugas");
                  echo '<tr>
                  <td>'.$daftarsiswa->getNama().'</td>
                  <td>'.$daftarsiswa->getnis().'</td>
                  <td>
                  '.anchor('cont_tugas/downloadjwb/'.$jwbtugas->getNamaFile(), $jwbtugas->getNamaFile()).'</td>
                  <td>
                    <input type="number" min="0" max="100" step="0.01" name="nilai_'.$jmlsiswa.'" value="'.$nilai.'" ></input>
                    <input type="hidden" id="nis" name="nis_'.$jmlsiswa.'" value="'.$daftarsiswa->getnis().'" ></input>
                  </td>
                </tr>';
                }
                ?>
                </tbody>
              </table>
              <button type="submit" formaction="<?php echo base_url().'cont_tugas/nilaiJawabanTugas/'.$tugas->getKodeTugas().'/'.$idForum.'/'.$jmlsiswa ?>" class="btn btn-success pull-right" style="padding-top: 4px;padding-bottom: 4px;padding-right: 20px;margin-right:7px;margin-top:15px;">Simpan Nilai Tugas</button>
             <button type="submit" formnovalidate formaction="<?php echo base_url().'cont_guru/viewDetailForum/'.$idForum ?>" class="btn btn-danger pull-right" style="padding-top: 4px;padding-bottom: 4px;padding-right: 20px;margin-right:7px;margin-top:15px;">Kembali</button>
          </form>
            </div>
            <!-- /.box-body -->
          </div>
               
          <!-- /.box -->
        </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
