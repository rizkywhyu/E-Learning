<section class="content-header">
      <h1>
        Forum
      </h1>
     
</section>
 <section class="content">
 <div class="row" id="Card">
 <?php 
  $i = 1;
  foreach($daftarForum->result_array() as $c){
    $mp = new matapelajaran();
    $dataTugas = $mp->getDaftarTugas($c['kelas'],$c['mp']);
    $dataMateri = $mp->getDaftarMateri($c['kelas'],$c['mp']);
    $dataUjian = $mp->getDaftarUjian($c['kelas'],$c['mp']);
    if($i % 5 == 0){
      $color = 'orange';
    }
    else if($i % 5 == 1){
      $color = 'green';
    }
    else if($i % 5 == 2){
      $color = 'red';
    }
    else if($i % 5 == 3){
      $color = 'blue';
    }
    else if($i % 5 == 4){
      $color = 'purple';
    }

    if($siswa->cekAkses($siswa->getnis(),$c['idForum']) != null){
      $akses = base_url().'cont_siswa/viewDetailForum/'.$c['idForum'];
    }else {
      $akses = '#pass'.$i;
    }
    echo '
        <div class="col-md-3" style="padding-bottom: 15px;">
          <!-- Widget: user widget style 1 -->
          <a href="'.$akses.'" data-toggle="modal"><div class="box box-widget widget-user-2" >
            <div class="widget-user-header bg-'.$color.'">
              <h5>'.$c['nama'].'</h5>
              <h6>'.$c['kelas'].'<h6>
            </div>
           </a> 
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Tugas <span class="pull-right badge bg-blue">'.$dataTugas->num_rows().'</span></a></li>
                <li><a href="#">Ujian <span class="pull-right badge bg-aqua">'.$dataUjian->num_rows().'</span></a></li>
                <li><a href="#">Materi <span class="pull-right badge bg-green">'.$dataMateri->num_rows().'</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
      </div> 
      <div class="modal fade" id="pass'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Forum '.$c['nama'].'</h4>
                                        </div>
                                        <form method="post">
                                        <div class="modal-body">
                                           <div class="form-group">
                                            <label>Masukkan Password</label>
                                            <input class="form-control" name="pass" type="password" required></input>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                            <button type="submit" formaction="'.base_url().'cont_forum/cekPass/'.$c['idForum'].'/'.$siswa->getnis().'" class="btn btn-primary">Masuk Forum</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>';
      $i++;
  }

  ?>

  </div>

                            
     <!-- /.col -->
</section>


