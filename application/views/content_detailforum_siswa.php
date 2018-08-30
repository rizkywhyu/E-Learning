<section class="content-header">
      <h1>
        Forum
      </h1>
</section>
 <section class="content">
 <div class="row">
  <div class="col-md-4 col-sm-4 col-xs-12" >
                <div class="box box-widget">
                      <!-- /.box-header -->
                      <div class="box-header with-border bg-blue">
                        <div class="user-block">
                          <span>Kolom Komentar</span>
                        </div>
                      </div>

                      <!-- /.box-body -->
                      <div class="box-footer box-comments" id="easyPaginate">
                      <?php foreach($daftarKomentar->result_array() as $c) {?>
                        <div class="box-comment">
                          <!-- User image -->
                          <img class="img-circle img-sm" src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil.jpg" alt="User Image">

                          <div class="comment-text">
                                <span class="username">
                                  <?php echo $c['email'] ?>
                                  <span class="text-muted pull-right"><?php echo $c['jam'].' '.$c['tgl'] ?></span>
                                </span><!-- /.username -->
                                <?php echo $c['isi'] ?>
                          </div>
                          <ul class="list-inline">
                          <?php 
                          $reply = new replykomentar();
                          $daftarReply = $reply->getDaftarByComm($c['idComm']);
                          ?>
                            <li class="pull-right"><a href="#" onClick="viewReply(<?php echo $c['idComm']?>)" class="link-blue text-sm clicked"><i class="fa fa-mail-reply margin-r-5" ></i> Reply (<?php echo $daftarReply->num_rows() ?>)</a></li>  
                          </ul>
                          <!-- /.comment-text -->
                        </div>
                        <!-- Reply Comment -->
                        <div id="boxReply<?php echo $c['idComm'] ?>" style="display:none;">
                        <?php 
                        foreach($daftarReply->result_array() as $d) {?>
                        <div class="box-comment"  style="padding-left:40px;background-color:gainsboro;border-radius: 5px;padding-right: 10px;">
                          <!-- User image -->
                          <img class="img-circle img-sm" src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil.jpg" alt="User Image">
                          <div class="comment-text">
                                <span class="username">
                                  <?php echo $d['email'] ?>
                                  <span class="text-muted pull-right"><?php echo $d['jam'].' '.$d['tgl'] ?></span>
                                </span>
                                <?php echo $d['isi'] ?>
                          </div>
                          <!-- /.comment-text -->
                        </div>
                        <?php } ?>
                        </div>
                        <div class="box-footer" style="background-color:gainsboro;border-radius: 5px;display:none;" id="boxKirim<?php echo $c['idComm'] ?>">
                        <form action="<?php echo base_url().'cont_siswa/addCommentReply/'.$idForum.'/'.$c['idComm'] ?>" method="post">
                          <img class="img-responsive img-circle img-sm" src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil_SHN.jpg" alt="Alt Text">
                          <div class="input-group">
                            <input name="isi" placeholder="Kirim Komentar" class="form-control" type="text">
                                <span class="input-group-btn">
                                  <button type="submit" class="btn btn-primary btn-flat">Send</button>
                                </span>
                          </div>
                        </form>
                        </div>
                        <?php }?>
                        <!-- /.box-comment -->
                      </div>
                      <!-- /.box-footer -->
                      <div class="box-footer">
                        <form action="<?php echo base_url().'cont_siswa/addComment/'.$idForum ?>" method="post">
                          <img class="img-responsive img-circle img-sm" src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil_SHN.jpg" alt="Alt Text">
                          <div class="input-group">
                            <input name="isi" placeholder="Kirim Komentar" class="form-control" type="text">
                                <span class="input-group-btn">
                                  <button type="submit" class="btn btn-primary btn-flat">Send</button>
                                </span>
                          </div>
                        </form>
                      </div>
                      <!-- /.box-footer -->
                    </div>
  </div>
    <div class="col-md-8 col-sm-8 col-xs-12">
               <div class="panel panel-primary">
                        <div class="panel-heading">
                           <?php echo $forum->getNama() ?>
                           
                        </div>
                        <div class="btn-group btn-group-justified">
                            <a onclick="openCity(event, 'Materi')" class="tablinks btn btn-primary" id="defaultOpen">Materi</a>
                            <a onclick="openCity(event, 'Tugas')" class="tablinks btn btn-success">Tugas</a>
                            <a onclick="openCity(event, 'ujian')" class="tablinks btn bg-orange">ujian</a>
                          </div>
                        <div class="panel-body">

                              <div id="Materi" class="tabcontent">
                                <h4>Daftar Materi</h4>
                                <hr/>
                                 <div class="list-group">
                                 <?php 
                                 $i = 1;
                                 $materi = new materi();
                                  foreach($daftarMateri->result_array() as $c){
                                    $materi = $materi->getDetailMateri($c['kodemateri']);
                                    echo '
                                    <a data-toggle="collapse" href="#coll'.$i.'" class="list-group-item bg-blue">Nama Materi : '.$materi->getJudul().'</a>

                                    <div id="coll'.$i.'" class="collapse" style="border-style: solid; border-color: grey; border-width: 1px; padding-top:8px; padding-right:8px;">
                                      <p style="margin-left: 13px;">
                                        Nama : '.$materi->getJudul().'</br>
                                        '.anchor('cont_materi/download/'.$materi->getKodeMateri(),'Download '.$materi->getNamaFile()).'</br>
                                        <br>Deskripsi :</br>'.nl2br($materi->getDeskripsi()).'</p>
                                    ' ?>
                                    <?php
                                        $comm = new komentar();
                                        $daftarComm = $comm->getDaftarByMateri($c['kodemateri']);
                                        ?>
                                        <br><a data-toggle="collapse" href="#coll1Comm<?php echo $i ?>" class="link-blue text-sm clicked pull-right"><i class="fa fa-comments margin-r-5" ></i> Comments (<?php echo $daftarComm->num_rows() ?>)</a></br>

                                        <div id="coll1Comm<?php echo $i ?>" class="box box-widget collapse">
                                        <div class="box-header with-border bg-blue">
                                          <div class="user-block">
                                            <span>Kolom Komentar</span>
                                          </div>
                                        </div>

                                        <!-- /.box-body -->
                                        <div class="box-footer box-comments">
                                        <?php foreach($daftarComm->result_array() as $c) {?>
                                          <div class="box-comment">
                                            <!-- User image -->
                                            <img class="img-circle img-sm" src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil.jpg" alt="User Image">

                                            <div class="comment-text">
                                                  <span class="username">
                                                    <?php echo $c['email'] ?>
                                                    <span class="text-muted pull-right"><?php echo $c['jam'].' '.$c['tgl'] ?></span>
                                                  </span>
                                                  <?php echo $c['isi'] ?>
                                            </div>
                                            <!-- /.comment-text -->
                                          </div>
                                          <!-- Reply Comment -->
                                          <?php } ?>
                                          <!-- /.box-comment -->
                                        </div>
                                        <!-- /.box-footer -->
                                        <div class="box-footer">
                                          <form action="<?php echo base_url().'cont_siswa/addComment2/'.$materi->getKodeMateri().'/'.$idForum.'/0' ?>" method="post">
                                            <img class="img-responsive img-circle img-sm" src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil_SHN.jpg" alt="Alt Text">
                                            <div class="input-group">
                                              <input name="isi" placeholder="Kirim Komentar" class="form-control" type="text">
                                                  <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-primary btn-flat">Send</button>
                                                  </span>
                                            </div>
                                          </form>
                                        </div>
                                        <!-- /.box-footer -->
                                      </div> 
                                      </div>

                                  <?php 
                                    $i++;
                                  }
                                 ?>
                                  
                                </div>
                              </div>

                              <div id="ujian" class="tabcontent">
                                <h4>Daftar ujian</h4>
                                <hr/>
                                 <div class="list-group">
                                 <?php 
                                 $i = 1;
                                 $ujian = new ujian();
                                  foreach($daftarujian->result_array() as $c){
                                    $ujian = $ujian->getDetailujian($c['kodeujian']);
                                    $cek = $ujian->getNilai($siswa->getnis(),$c['kodeujian'],"ujian"); 
                                    $cek_batas = $ujian->cekWaktu($ujian->getKodeujian());
                                    if($cek_batas['batasTanggal'] != 0){
                                        $statusWaktu = '
                                      <div class="callout callout-danger" style="padding-bottom: 1px;padding-top: 10px;border-left-width: 12px;">
                                        <h4>Waktu Pengerjaan ujian Belum Bisa DImulai/Waktu Ujian sudah lewat</h4>
                                      </div>';
                                      $btnStatus = 'disabled';
                                    }
                                    else {
                                      if(substr($cek_batas['waktuMulai'],0,1) == '-' && substr($cek_batas['batasWaktu'],0,1) != '-'){
                                        $btnStatus = 'active';
                                        $statusWaktu = '
                                    <div class="callout callout-info" style="padding-bottom: 1px;padding-top: 10px;border-left-width: 12px;">
                                      <h4>Waktu Pengerjaan ujian Sedang Berlangsung</h4>
                                    </div>';
                                      }
                                      else{
                                        $btnStatus = 'disabled';
                                        $statusWaktu = '
                                    <div class="callout callout-danger" style="padding-bottom: 1px;padding-top: 10px;border-left-width: 12px;">
                                      <h4>Waktu Pengerjaan ujian Belum Bisa DImulai/Waktu Ujian sudah lewat</h4>
                                    </div>';
                                      }
                                    }

                                    if($cek != null){
                                      $btnStatus = 'disabled';
                                      $statusWaktu = '
                                    <div class="callout callout-success" style="padding-bottom: 1px;padding-top: 10px;border-left-width: 12px;">
                                      <h4>Anda Sudah Mengerjakan Ujian</h4>
                                    </div>';
                                    }

                                    echo '
                                    <a data-toggle="collapse" href="#coll3'.$i.'" class="list-group-item bg-orange">Nama ujian : '.$ujian->getJudul().'</a>

                                    <div id="coll3'.$i.'" class="collapse" style="border-style: solid; border-color: grey; border-width: 1px; padding-top:8px; padding-right:8px;">
                                    '.$statusWaktu.'
                                      <a href="'.base_url().'cont_siswa/viewKerjakanujian/'.$forum->getIdForum().'/'.$ujian->getKodeujian().'">
                                      <button class="btn btn-success pull-right" style="margin-right:6px;" '.$btnStatus.'>Kerjakan ujian</button></a>
                                      <p style="margin-left: 13px;">
                                        Nama : '.$ujian->getJudul().'</br>
                                        Jumlah ujian : '.$ujian->getJmlSoal().'</br>
                                        <br>Tanggal (tahun/bulan/hari) :</br>'.$ujian->getTanggalMulai().'</br>
                                        <br>Waktu : '.$ujian->getWaktuMulai().' - '.$ujian->getWaktuAkhir().'</p>
                                   </div>
                                    ';

                                    $i++;
                                  }
                                 ?>
                                  
                                </div>
                              </div>

                              <div id="Tugas" class="tabcontent">
                                <h4>Daftar Tugas</h4>
                                <hr/>
                                 <div class="list-group">
                                 <?php 
                                 $i = 1;
                                 $tugas = new tugas();
                                  foreach($daftarTugas->result_array() as $c){
                                    $tugas = $tugas->getDetailTugas($c['kodetugas']);
                                    $cek = $tugas->getJawabanTugas($siswa->getnis(),$tugas->getKodeTugas());
                                    $cek_batas = $tugas->cekBatasTugas($tugas->getKodeTugas());
                                    if($cek->num_rows() == 0 && $cek_batas == 0 ){
                                      $btnStatus = 'active';
                                      $statusTugas = null;
                                    }
                                    else if($cek->num_rows() > 0) {
                                      $statusTugas = '
                                                      <div class="callout callout-success" style="padding-bottom: 1px;padding-top: 10px;border-left-width: 12px;">
                                                        <h4>Anda Sudah Mengerjakan Tugas</h4>
                                                      </div>';
                                      $btnStatus = 'disabled';
                                    }
                                    else if($cek_batas < 0){
                                      $statusTugas = '
                                                      <div class="callout callout-info" style="padding-bottom: 1px;padding-top: 10px;border-left-width: 12px;">
                                                        <h4>Tugas Belum Bisa Dikumpulkan !</h4>
                                                      </div>';
                                      $btnStatus = 'disabled';
                                    }
                                    else if($cek_batas > 0){
                                      $statusTugas = '
                                                      <div class="callout callout-danger" style="padding-bottom: 1px;padding-top: 10px;border-left-width: 12px;">
                                                        <h4>Waktu Pengumpulan Tugas Sudah Lewat !</h4>
                                                      </div>';
                                      $btnStatus = 'disabled';
                                    }
                                    echo '
                                    <a data-toggle="collapse" href="#coll2'.$i.'" class="list-group-item bg-green">Nama tugas : '.$tugas->getJudul().'</a>

                                    <div id="coll2'.$i.'" class="collapse" style="border-style: solid; border-color: grey; border-width: 1px; padding-top:8px; padding-right:8px;">
                                    '.$statusTugas.'
                                      <a href="#upload'.$i.'" data-toggle="modal">
                                      <button class="btn btn-primary pull-right" style="margin-right:6px;" '.$btnStatus.'>Upload Jawaban</button></a>
                                      <p style="margin-left: 13px;">
                                        Nama : '.$tugas->getJudul().'</br>
                                        '.anchor('cont_tugas/download/'.$tugas->getKodeTugas(),'Download '.$tugas->getNamaFile()).'</br>
                                        <br>Deskripsi Tugas :</br>'.$tugas->getDeskripsi().'</br>
                                        <br>Tanggal Batas Pengumpulan : '.$tugas->getBatasTanggal().'</p>
                                   '?>
                                   <?php
                                        $comm = new komentar();
                                        $daftarComm = $comm->getDaftarByTugas($c['kodetugas']);
                                        ?>
                                        <br><a data-toggle="collapse" href="#collComm<?php echo $i ?>" class="link-blue text-sm clicked pull-right"><i class="fa fa-comments margin-r-5" ></i> Comments (<?php echo $daftarComm->num_rows() ?>)</a></br>

                                        <div id="collComm<?php echo $i ?>" class="box box-widget collapse">
                                        <div class="box-header with-border bg-blue">
                                          <div class="user-block">
                                            <span>Kolom Komentar</span>
                                          </div>
                                        </div>

                                        <!-- /.box-body -->
                                        <div class="box-footer box-comments">
                                        <?php foreach($daftarComm->result_array() as $c) {?>
                                          <div class="box-comment">
                                            <!-- User image -->
                                            <img class="img-circle img-sm" src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil.jpg" alt="User Image">

                                            <div class="comment-text">
                                                  <span class="username">
                                                    <?php echo $c['email'] ?>
                                                    <span class="text-muted pull-right"><?php echo $c['jam'].' '.$c['tgl'] ?></span>
                                                  </span>
                                                  <?php echo $c['isi'] ?>
                                            </div>
                                            <!-- /.comment-text -->
                                          </div>
                                          <!-- Reply Comment -->
                                          <?php } ?>
                                          <!-- /.box-comment -->
                                        </div>
                                        <!-- /.box-footer -->
                                        <div class="box-footer">
                                          <form action="<?php echo base_url().'cont_siswa/addComment2/'.$tugas->getKodeTugas().'/'.$idForum.'/1' ?>" method="post">
                                            <img class="img-responsive img-circle img-sm" src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil_SHN.jpg" alt="Alt Text">
                                            <div class="input-group">
                                              <input name="isi" placeholder="Kirim Komentar" class="form-control" type="text">
                                                  <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-primary btn-flat">Send</button>
                                                  </span>
                                            </div>
                                          </form>
                                        </div>
                                        <!-- /.box-footer -->
                                      </div>
                                   </div>

                                   <?php echo'

                                   <div class="modal fade" id="upload'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Upload Jawaban Tugas</h4>
                                        </div>
                                        <div class="modal-body">
                                    <form method="post" action="'.base_Url().'Cont_Tugas/uploadJawabanTugas/'.$forum->getIdForum().'/'.$tugas->getKodeTugas().'/'.$siswa->getnis().'" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label>Deskripsi</label>
                                          <textarea class="form-control" rows="3" name="TxtDeskripsi" placeholder="Masukkan Deskripsi Disini..."></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="pilihFile">Pilih File</label>
                                          <input type="file" name="berkasUpload">
                                          <p class="help-block">Maks. 4MB dan ekstensi : .rar</p>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-success pull-right">Upload</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                          </div>
                                    ';

                                    $i++;
                                  }
                                 ?>
                                  
                                </div>
                              </div>
                        </div>
                 </div>
              </div>
  </div>
</section>

<script type="text/javascript">
document.getElementById("defaultOpen").click();
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
$('.clicked').click(function(e) {
    e.preventDefault();
});
  function viewReply(idComm){
    if(document.getElementById('boxReply'+idComm).style.display == 'none'){
      document.getElementById('boxReply'+idComm).style.display = 'block';
      document.getElementById('boxKirim'+idComm).style.display = 'block'; 
    }
    else{
      document.getElementById('boxReply'+idComm).style.display = 'none'; 
      document.getElementById('boxKirim'+idComm).style.display = 'none';
    }
  }

</script>
