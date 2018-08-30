
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>MATAPELAJARAN READ</h3>
        <table class="table table-bordered">
	    <tr><td>Kode MataPelajaran</td><td><?php echo $kodemp; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    
      <tr><td>Id Sekolah</td><td><?php echo $idSklh; ?></td></tr>
      <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
      <tr><td>Pengajar</td><td><?php echo $kodeguru; ?></td></tr>
      <tr><td></td><td><a href="<?php echo site_url('mapel') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->