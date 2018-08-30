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
            <form method="post" action="<?php echo base_Url().'Cont_ujian/tambahujian' ?>">
              <div class="box-body">
               <div class="form-group">
                <label>
                Kelas        : <?php echo $kelas ?></br>
                MP           : <?php echo $kodemp ?></br>
                Jumlah Soal  : <?php echo $jmlsoal ?></label>
                <?php
                $j = 1;
                while($j <= $jmlsoal){ 
                echo '

                  <div class="box-header with-border">
                    <h3 class="box-title">ujian No. '.$j.'</h3>
                  </div>
                  <div class="box-body">
                  <label>Soal ujian</label>
                  <form method="post">
                    <div class="form-group">
                      <textarea class="form-control" rows="3" name="txtSoal_'.$j.'" placeholder="Enter ..." required></textarea>
                    </div>
                    <div class="form-group">
                      <div>
                      <input type="radio" name="rad_'.$j.'" value="A" checked>A. <input name="txtA_'.$j.'" placeholder="Pilihan Ganda A..." style="padding-right:300px;" required></input></input></div>
                      <div>
                     <input type="radio" name="rad_'.$j.'" value="B">B. <input name="txtB_'.$j.'" placeholder="Pilihan Ganda B..." style="padding-right:300px;" required></input></input></div>
                     <div>
                     <input type="radio" name="rad_'.$j.'" value="C">C. <input name="txtC_'.$j.'" placeholder="Pilihan Ganda C..." style="padding-right:300px;" required></input></input></div>
                     <div>
                     <input type="radio" name="rad_'.$j.'" value="D">D. <input name="txtD_'.$j.'" placeholder="Pilihan Ganda D..." style="padding-right:300px;" required></input></input></div>
                     <div>
                     <input type="radio" name="rad_'.$j.'" value="E">E. <input name="txtE_'.$j.'" placeholder="Pilihan Ganda E..." style="padding-right:300px;" required></input></input></div>
                    </div>
                </div>';
              $j++;
              }
                 ?>

              <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" formaction="<?php echo base_url().'cont_ujian/tambahujian'?>" class="btn btn-success pull-right" style="padding-left: 50px;padding-right: 50px;">Tambah ujian</button>
              </div>
            </form>
          </div>
  </div>
</div>
</section>