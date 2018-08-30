<section class="content-header">
      <h1>
        ujian
      </h1>
</section>
 <section class="content">
 <div class="row" >
  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah ujian Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" >
              <div class="box-body">
              <a data-toggle="modal" href="#editKet">
              <button class="btn btn-success" >Edit Keterangan Soal</button></a>
               <div class="form-group">
                <label>
                Kelas        : <?php echo $ujian->getKelas() ?></br>
                MP           : <?php echo $ujian->getKodeMp() ?></br>
                Jumlah Soal  : <?php echo $ujian->getJmlSoal() ?></br>
                Judul ujian : <?php echo $ujian->getJudul() ?></br>
                Tanggal ujian : <?php echo $ujian->getTanggalMulai() ?></br>
                Pukul : <?php echo $ujian->getWaktuMulai().' - '.$ujian->getWaktuAkhir() ?></br>
                Jumlah Soal : <?php echo $ujian->getJmlSoal() ?> </label>
                <?php
                foreach($dataSoal->result_Array() as $c){ 
                echo '

                  <div class="box-header with-border">
                    <h3 class="box-title">ujian No. '.$c['nomor'].'</h3>
                  </div>
                  <div class="box-body">
                  <label>Soal ujian</label>
                  <form method="post">
                    <div class="form-group">
                      <textarea class="form-control" rows="5" name="txtSoal_'.$c['nomor'].'" required>'.$c['soal'].'</textarea>
                    </div>
                    <div class="form-group">
                      <div>
                      <input type="radio" name="rad_'.$c['nomor'].'" value="A" ';if($c['jwb_benar']=="A"){echo $cek;}echo'>A. <input name="txtA_'.$c['nomor'].'" value="'.$c['jwbA'].'" style="padding-right:300px;" required></input></input></div>
                      <div>
                     <input type="radio" name="rad_'.$c['nomor'].'" value="B" ';if($c['jwb_benar']=="B"){echo $cek;}echo'>B. <input name="txtB_'.$c['nomor'].'" value="'.$c['jwbB'].'" style="padding-right:300px;" required></input></input></div>
                     <div>
                     <input type="radio" name="rad_'.$c['nomor'].'" value="C" ';if($c['jwb_benar']=="C"){echo $cek;}echo'>C. <input name="txtC_'.$c['nomor'].'" value="'.$c['jwbC'].'" style="padding-right:300px;" required></input></input></div>
                     <div>
                     <input type="radio" name="rad_'.$c['nomor'].'" value="D" ';if($c['jwb_benar']=="D"){echo $cek;}echo'>D. <input name="txtD_'.$c['nomor'].'" value="'.$c['jwbD'].'" style="padding-right:300px;" required></input></input></div>
                     <div>
                     <input type="radio" name="rad_'.$c['nomor'].'" value="E" ';if($c['jwb_benar']=="E"){echo $cek;}echo'>E. <input name="txtE_'.$c['nomor'].'" value="'.$c['jwbE'].'" style="padding-right:300px;" required></input></input></div>
                    </div>
                </div>';
              }
                 ?>

              <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" formaction="<?php echo base_url().'cont_ujian/UpdateIsiujian/'.$ujian->getKodeujian().'/'.$ujian->getJmlSoal().'/'.$idForum?>" class="btn btn-success pull-right" style="padding-left: 50px;padding-right: 50px;">Ubah ujian</button>
                <button type="submit" formnovalidate formaction="<?php echo base_url().'cont_guru/viewDetailForum/'.$idForum?>" class="btn btn-danger pull-right" style="padding-left: 50px;padding-right: 50px;margin-right:8px;">Kembali</button>
              </div>
            </form>
          </div>
  </div>
</div>
                  <div class="modal fade" id="editKet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                                        </div>
                                        <form method="post">
                                        <div class="modal-body">
                                             <div class="form-group">
                                              <label class="pull-left">Judul</label>
                                              <input name="judul" class="form-control" value="<?php echo $ujian->getJudul() ?>" required></input>
                                            </div>
                                            <div class="form-group">
                                              <label class="pull-left">Tanggal ujian</label>
                                              <input type="date" name="tanggalMulai" class="form-control" value="<?php echo $ujian->getTanggalMulai() ?>" required></input>
                                            </div>
                                            <div class="form-group pull-left">
                                              <label>Waktu Mulai</label>
                                              <input type="time" name="waktuMulai" value="<?php echo $ujian->getWaktuMulai() ?>" required></input>
                                            </div>
                                            <div class="form-group">
                                              <label>Waktu Akhir</label>
                                              <input type="time" name="waktuAkhir" value="<?php echo $ujian->getWaktuAkhir() ?>" required></input>
                                            </div> 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" formaction="<?php echo base_url().'cont_ujian/updateujian/'.$ujian->getKodeujian().'/'.$idForum?>" >Simpan Perubahan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

</section>
