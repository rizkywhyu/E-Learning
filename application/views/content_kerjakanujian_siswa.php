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
              <h3 class="box-title">Mengerjakan ujian</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" >
              <div class="box-body">
               <div class="form-group">
                <label>
                Judul ujian : <?php echo $ujian->getJudul() ?></br>
                Jumlah Soal  : <?php echo $ujian->getJmlSoal() ?></br>
                Tanggal ujian : <?php echo $ujian->getTanggalMulai() ?></br>
                Pukul : <?php echo $ujian->getWaktuMulai().' - '.$ujian->getWaktuAkhir() ?></br>
                Jumlah Soal : <?php echo $ujian->getJmlSoal() ?> </label>
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $ujian->getJudul() ?>'</h3>
                </div>
                <?php
                foreach($dataujian->result_Array() as $c){ 
                echo '
                  <div class="box-body">
                  <form method="post">
                    <div class="form-group" >
                    <label >'.$c['nomor'].') </label>
                      '.$c['soal'].'
                    </div>
                    <div class="form-group" style="margin-left:12px;">
                      <div>
                        <input type="radio" name="rad_'.$c['nomor'].'" value="A" >A. '.$c['jwbA'].'</input>
                      </div>
                      <div>
                        <input type="radio" name="rad_'.$c['nomor'].'" value="B" >B. '.$c['jwbB'].'</input>
                      </div>
                      <div>
                        <input type="radio" name="rad_'.$c['nomor'].'" value="C" >C. '.$c['jwbC'].'</input>
                      </div>
                      <div>
                        <input type="radio" name="rad_'.$c['nomor'].'" value="D" >D. '.$c['jwbD'].'</input>
                      </div>
                      <div>
                        <input type="radio" name="rad_'.$c['nomor'].'" value="E" >E. '.$c['jwbE'].'</input>
                      </div>
                    </div>
                  </div>';
              }
                 ?>

            <div class="box-footer">
                <button type="submit" formaction="<?php echo base_url().'cont_ujian/hasilujian/'.$idForum.'/'.$ujian->getKodeujian().'/'.$ujian->getJmlSoal()?>" class="btn btn-success pull-right" style="padding-left: 50px;padding-right: 50px;">Selesai</button>
                <button type="submit" formnovalidate formaction="<?php echo base_url().'cont_mhs/viewDetailForum/'.$idForum?>" class="btn btn-danger pull-right" style="padding-left: 50px;padding-right: 50px;margin-right:8px;">Kembali</button>
              </div>
            </form>
          </div>
  </div>
</div>
</section>