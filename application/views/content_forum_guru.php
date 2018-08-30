<section class="content-header">
      <h1>
        Forum
      </h1>
     
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahForum" style="padding-top: 4px;padding-bottom: 4px;padding-right: 20px;margin-right:7px;margin-top:15px;">Buat Forum Baru
        </button>


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
    echo '
        <div class="col-md-3" style="padding-bottom: 15px;">
          <!-- Widget: user widget style 1 -->
          <a href="'.base_url().'cont_guru/viewDetailForum/'.$c['idForum'].'"><div class="box box-widget widget-user-2" >
            <div class="widget-user-header bg-'.$color.'">
              <h5>'.$c['nama'].'</h5>
              <h6>'.$c['kelas'].'<h6>
            </div>
           </a> 
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a data-toggle="modal" data-target="#modalHapus'.$i.'">Hapus Forum <span class="pull-right fa fa-trash"></span></a></li>
                <li><a href="#">Tugas <span class="pull-right badge bg-blue">'.$dataTugas->num_rows().'</span></a></li>
                <li><a href="#">Ujian <span class="pull-right badge bg-aqua">'.$dataUjian->num_rows().'</span></a></li>
                <li><a href="#">Materi <span class="pull-right badge bg-green">'.$dataMateri->num_rows().'</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
      </div> 
      <div class="modal fade" id="modalHapus'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Hapus</h4>
                                        </div>
                                        <div class="modal-body">
                                            Anda yakin ingin menghapus forum ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                            <a type="button" href="'.base_url().'cont_forum/hapusForum/'.$c['idForum'].'" class="btn btn-primary">Ya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
      $i++;
  }

  ?>

  </div>
<div class="modal fade" id="tambahForum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Forum</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?php echo base_Url().'Cont_Forum/TambahForum/'.$guru->getKodeGuru() ?>" enctype="multipart/form-data">
                                                <div class="box-body">
                                                  <div class="form-group">
                                                    <label>Nama Forum</label>
                                                    <input class="form-control" name="nama" required></input>
                                                    </div>
                                                  <div class="form-group">
                                                    <label>Pilih Kelas dan Mata Pelajaran</label>
                                                    <select class="form-control" name="kmp">
                                                     <?php foreach($datamp->result_array() as $c) {
                                                  echo '
                                                        <option value="'.$c['kelas'].'_'.$c['kodemp'].'">'.$c['kelas'].' - '.$c['nama'].'</option>
                                                  ';
                                                }
                                                  ?>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                  <label>Password</label>
                                                  <input class="form-control" name="pass1" type="password"></input>
                                                  </div>
                                                  <div class="form-group">
                                                  <label>Ketik ulang Password</label>
                                                  <input class="form-control" name="pass2" type="password"></input>
                                                  </div>
                                              </div>  
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-success" >Tambah Forum</button>

                                        </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                            
     <!-- /.col -->
</section>


