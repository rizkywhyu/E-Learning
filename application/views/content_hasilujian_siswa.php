<section class="content-header">
      <h1>
        Hasil Ujian
      </h1>
</section>
 <section class="content" style="margin:auto; max-width: 500px; margin-top:90px;">
 <div class="row" id="Card">

             <div class="col-md-10 col-sm-10 col-xs-12" >
                  <div class="panel panel-success">
                        <div class="panel-heading bg-green">
                           <h3 style="text-align:center;">Hasil</h3>
                        </div>
                        <h4 style="text-align:center;">Nilai : <?php echo $nilaiujian ?></h4><hr/>
                        <h4 style="text-align:center;">Benar <?php echo $i.' Dari '.$jmlsoal.' Soal'; ?></h4>
                        <a href="<?php echo base_url().'cont_siswa/viewDetailForum/'.$idForum ?>">
                         <button class="btn btn-primary col-md-12 " style="margin-top:10px;">Kembali Ke Forum</button>
                         </a>
                  </div>
            </div>
 </div>
</section>