<section class="content-header">
      <h1>
        Forum
      </h1>
</section>
 <section class="content">
 <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12" >
                  <div class="panel panel-success">
                        <div class="panel-heading bg-green">
                           Actions
                        </div>
                        <div class="panel-body list-group">
                        <a href="#tambahMateri" data-toggle="modal" class="list-group-item">Buat Materi</a>
                        <a href="#tambahUjian" data-toggle="modal" class="list-group-item">Buat Ujian</a>
                        <a href="#tambahTugas" data-toggle="modal" class="list-group-item">Buat Tugas</a>
                        </div>
                  </div>
          <!-- Box Comment -->
                    <div class="box box-widget">
                      <!-- /.box-header -->
                      <div class="box-header with-border bg-blue">
                        <div class="user-block">
                          <span>Kolom Komentar</span>
                        </div>
                      </div>

                      <!-- /.box-body -->
                      <div class="box-footer box-comments">
                      <?php foreach($daftarKomentar->result_array() as $c) {?>
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
                        <form action="<?php echo base_url().'cont_guru/addCommentReply/'.$idForum.'/'.$c['idComm'] ?>" method="post">
                          <img class="img-responsive img-circle img-sm" src="<?php echo base_url()."assets/"; ?>gambar/fotoprofile/profil_SHN.jpg" alt="Alt Text">
                          <div class="input-group">
                            <input name="isi" placeholder="Kirim Komentar" class="form-control" type="text">
                                <span class="input-group-btn">
                                  <button type="submit" class="btn btn-primary btn-flat">Send</button>
                                </span>
                          </div>
                        </form>
                        </div>
                        <?php } ?>
                        <!-- /.box-comment -->
                      </div>
                      <!-- /.box-footer -->
                      <div class="box-footer">
                        <form action="<?php echo base_url().'cont_guru/addComment/'.$idForum ?>" method="post">
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
                    <!-- /.box -->
               </div>

    <div class="col-md-8 col-sm-8 col-xs-12">
               <div class="panel panel-primary">
                        <div class="panel-heading">
                           <?php echo $forum->getNama() ?>
                           
                        </div>
                        <div class="btn-group btn-group-justified">
                            <a onclick="openCity(event, 'Materi')" class="tablinks btn btn-primary" id="defaultOpen">Materi</a>
                            <a onclick="openCity(event, 'Tugas')" class="tablinks btn btn-success">Tugas</a>
                            <a onclick="openCity(event, 'Ujian')" class="tablinks btn bg-orange">Ujian</a>
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
                                    <a href="'.base_url().'cont_materi/hapusFromForum/'.$forum->getIdForum().'/'.$materi->getKodeMateri().'/'.$materi->getNamaFile().'" onClick="return confirmHapus()">
                                      <button class="btn btn-danger pull-right" name="BtnEdit" >Hapus Materi</button></a>
                                      <a href="#ubahMateri'.$i.'" data-toggle="modal">
                                      <button class="btn btn-success pull-right" name="BtnEdit" style="margin-right:6px;">Edit Materi</button></a>
                                      <p style="margin-left: 13px;">
                                        Nama : '.$materi->getJudul().'</br>
                                        '.anchor('cont_materi/download/'.$materi->getKodeMateri(),'Download '.$materi->getNamaFile()).'</br>
                                        <br>Deskripsi :</br>'.nl2br($materi->getDeskripsi()).'</p>
                                      '?>

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
                                          <form action="<?php echo base_url().'cont_guru/addComment2/'.$materi->getKodeMateri().'/'.$idForum.'/0' ?>" method="post">
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

                                    <?php echo '
                                      <div class="modal fade" id="ubahMateri'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Ubah Materi</h4>
                                        </div>
                                        <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                        <label>Judul Materi</label>
                                        <input class="form-control" name="TxtJudul" value="'.$materi->getJudul().'" required></input>
                                      </div>
                                      <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" rows="3" name="TxtDeskripsi" >'.$materi->getDeskripsi().'</textarea>
                                      </div>
                                      <div class="form-group">
                                          <label for="pilihFile">Pilih File Materi</label>
                                          <input type="file" name="berkasUpload">
                                          *Pilih File jika ingin merubah file materi. <br/>
                                      </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                            <button type="submit" formaction="'.base_url().'cont_materi/updatemateriFromForum/'.$forum->getIdForum().'/'.$materi->getKodeMateri().'" class="btn btn-primary" >Ubah</button>
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

                              <div id="Ujian" class="tabcontent">
                                <h4>Daftar Ujian</h4>
                                <hr/>
                                 <div class="list-group">
                                 <?php 
                                 $i = 1;
                                 $Ujian = new ujian();
                                  foreach($daftarUjian->result_array() as $c){
                                    $Ujian = $Ujian->getDetailujian($c['kodeujian']);
                                    echo '
                                    <a data-toggle="collapse" href="#coll3'.$i.'" class="list-group-item bg-orange">Nama Ujian : '.$Ujian->getJudul().'</a>

                                    <div id="coll3'.$i.'" class="collapse" style="border-style: solid; border-color: grey; border-width: 1px; padding-top:8px; padding-right:8px;">
                                    <a href="'.base_url().'cont_ujian/hapus/'.$forum->getIdForum().'/'.$Ujian->getKodeujian().'" onClick="return confirmHapus()">
                                      <button class="btn btn-danger pull-right" >Hapus Ujian</button></a>
                                      <a href="'.base_url().'cont_guru/viewEditujian/'.$forum->getIdForum().'/'.$Ujian->getKodeujian().'">
                                      <button class="btn btn-success pull-right" name="BtnEdit" style="margin-right:6px;">Edit Ujian</button></a>
                                      <p style="margin-left: 13px;">
                                        Nama : '.$Ujian->getJudul().'</br>
                                        Jumlah Ujian : '.$Ujian->getJmlSoal().'</br>
                                        <br>Tanggal :</br>'.$Ujian->getTanggalMulai().'</br>
                                        <br>Waktu : '.$Ujian->getWaktuMulai().' - '.$Ujian->getWaktuAkhir().'</p>
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
                                ?>
                                    <a data-toggle="collapse" href="#coll2<?php echo $i ?>" class="list-group-item bg-green">Nama tugas : <?php echo $tugas->getJudul() ?></a>

                                    <div id="coll2<?php echo $i ?>" class="collapse" style="border-style: solid; border-color: grey; border-width: 1px; padding-top:8px; padding-right:8px;">
                                    <a href="<?php echo base_url().'cont_tugas/hapusFromForum/'.$forum->getIdForum().'/'.$tugas->getKodeTugas() ?>" onClick="return confirmHapus()">
                                      <button class="btn btn-danger pull-right" name="BtnEdit" >Hapus Tugas</button></a>
                                      <a href="#ubahTugas<?php echo $i ?>" data-toggle="modal">
                                      <button class="btn btn-success pull-right" name="BtnEdit" style="margin-right:6px;">Edit Tugas</button></a>
                                      <a href="<?php echo base_url().'cont_guru/viewJawabanTugas/'.$forum->getIdForum().'/'.$tugas->getKodeTugas() ?>">
                                      <button class="btn btn-primary pull-right" name="BtnEdit" style="margin-right:6px;">Lihat Daftar Jawaban Tugas</button></a>
                                      <p style="margin-left: 13px;">
                                      <?php echo '
                                        Nama : '.$tugas->getJudul().'</br>
                                        '.anchor('cont_tugas/download/'.$tugas->getKodeTugas(),'Download '.$tugas->getNamaFile()).'</br>
                                        <br>Deskripsi Tugas :</br>'.$tugas->getDeskripsi().'</br>
                                        <br>Tanggal Batas Pengumpulan : '.$tugas->getBatasTanggal().'</p> '; ?>
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
                                          <form action="<?php echo base_url().'cont_guru/addComment2/'.$tugas->getKodeTugas().'/'.$idForum.'/1' ?>" method="post">
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

                                      <div class="modal fade" id="ubahTugas<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Ubah tugas</h4>
                                        </div>
                                        <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <label>Judul Tugas</label>
                                          <input class="form-control" name="TxtJudul" value="<?php echo $tugas->getJudul() ?>" ></input>
                                        </div>
                                        <div class="form-group">
                                          <label>Deskripsi</label>
                                          <textarea class="form-control" rows="3" name="TxtDeskripsi" value="<?php echo $tugas->getDeskripsi() ?>"></textarea>
                                        </div>
                                        <div class="form-group">
                                        <label>Batas Tanggal</label>
                                        <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="Date" class="form-control" id="tanggal" name="batastgl" value="<?php echo $tugas->getBatasTanggal()?>" required>
                                        </div>
                                        </div>
                                      <div class="form-group">
                                          <label for="pilihFile">Pilih File Tugas</label>
                                          <input type="file" name="berkasUpload">
                                          *Pilih File jika ingin merubah file tugas. <br/>
                                      </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                            <button type="submit" formaction="<?php echo base_url().'cont_tugas/updatetugasFromForum/'.$forum->getIdForum().'/'.$tugas->getKodeTugas()?>" class="btn btn-primary">Ubah</button>
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                                    

                            <?php    
                                $i++;
                                  }
                                 ?>
                                  
                                </div>
                              </div>
                        </div>
                 </div>
              </div>
  </div>
  <!-- MODAL TAMBAH MATERI-->
                          <div class="modal fade" id="tambahMateri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Materi</h4>
                                        </div>
                                        <div class="modal-body">
                                    <form method="post" action="<?php echo base_Url().'Cont_Materi/TambahMateriFromForum' ?>" enctype="multipart/form-data">
                                      <div class="form-group">

                                          <input class="form-control" name="matapelajaran" type="hidden" value="<?php echo $forum->getmp()?>"></input>
                                          <input class="form-control" name="kelas" type="hidden" value="<?php echo $forum->getKelas()?>"></input>
                                          <input class="form-control" name="idForum" type="hidden" value="<?php echo $forum->getIdForum()?>"></input>

                                        </div>
                                        <div class="form-group">
                                          <label>Judul Materi</label>
                                          <input class="form-control" name="TxtJudul" required></input>
                                        </div>
                                        <div class="form-group">
                                          <label>Deskripsi</label>
                                          <textarea class="form-control" rows="3" name="TxtDeskripsi" placeholder="Masukkan Deskripsi Disini..."></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="pilihFile">Pilih File</label>
                                          <input type="file" name="berkasUpload">
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-success pull-right">Tambah Materi</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                          </div>
<!-- END TAMBAH MATERI-->

<!-- MODAL TAMBAH TUGAS-->
                           <div class="modal fade" id="tambahTugas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Tugas</h4>
                                        </div>
                                  <div class="modal-body">
                                    <form method="post" action="<?php echo base_Url().'Cont_Tugas/TambahTugasFromForum' ?>" enctype="multipart/form-data">
                                      <div class="form-group">

                                          <input class="form-control" name="matapelajaran" type="hidden" value="<?php echo $forum->getmp()?>"></input>
                                          <input class="form-control" name="kelas" type="hidden" value="<?php echo $forum->getKelas()?>"></input>
                                          <input class="form-control" name="idForum" type="hidden" value="<?php echo $forum->getIdForum()?>"></input>

                                        </div>
                                        <div class="form-group">
                                          <label>Judul Tugas</label>
                                          <input class="form-control" name="TxtJudul"></input>
                                        </div>
                                        <div class="form-group">
                                          <label>Deskripsi</label>
                                          <textarea class="form-control" rows="3" name="TxtDeskripsi" placeholder="Masukkan Deskripsi Disini..."></textarea>
                                        </div>
                                        <div class="form-group">
                                        <label>Batas Tanggal</label>
                                          <input type="datetime-local" class="form-control" name="batastgl">
                                      </div>
                                        <div class="form-group">
                                          <label for="pilihFile">Pilih File</label>
                                          <input type="file" name="berkasUpload">
                                        </div>
                                  </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-success pull-right">Tambah Tugas</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                          </div>
<!-- MODAL TAMBAH TUGAS-->

                      <div class="modal fade" id="tambahUjian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Ujian</h4>
                                        </div>
                                  <div class="modal-body">
                                    <form method="post">
                                    <div class="form-group">

                                          <input class="form-control" name="matapelajaran" type="hidden" value="<?php echo $forum->getmp()?>"></input>
                                          <input class="form-control" name="kelas" type="hidden" value="<?php echo $forum->getKelas()?>"></input>
                                          <input class="form-control" name="idForum" type="hidden" value="<?php echo $forum->getIdForum()?>"></input>

                                        </div>
                                    <div class="form-group">
                                      <label class="pull-left">Judul</label>
                                      <input name="judul" class="form-control" required></input>
                                    </div>
                                    <div class="form-group">
                                     <label class="pull-left">Jumlah Soal</label>
                                      <select name="jmlsoal" class="form-control">
                                      <?php 
                                      $j = 1;
                                      while ($j<=10) {
                                        echo '<option selected="selected">'.$j.'</option>';
                                        $j++;
                                      }
                                      ?>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label class="pull-left">Tanggal ujian</label>
                                      <input type="date" name="tanggalMulai" class="form-control" required></input>
                                    </div>
                                    <div class="form-group pull-left">
                                      <label>Waktu Mulai</label>
                                      <input type="time" name="waktuMulai" required></input>
                                    </div>
                                    <div class="form-group">
                                      <label>Waktu Akhir</label>
                                      <input type="time" name="waktuAkhir" required></input>
                                    </div> 
                                  </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-success pull-right" formaction="<?php echo base_url().'cont_guru/viewTambahujian' ?>">Buat Ujian</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                          </div>
     <!-- /.col -->
</section>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="jquery.easyPaginate.js"></script>

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

  function confirmHapus() {
  var msg;
  msg= "Apakah Anda Yakin Akan Menghapus Data ? " ;
  var agree=confirm(msg);
  if (agree)
    return true ;
  else
    return false ;
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
