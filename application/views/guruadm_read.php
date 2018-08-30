
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>GURU READ</h3>
        <table class="table table-bordered">
	    <tr><td>Kode Guru</td><td><?php echo $kodeguru; ?></td></tr>
	    <tr><td>nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Sekolah</td><td><?php echo $sekolah; ?></td></tr>
      <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>No HP</td><td><?php echo $noHP; ?></td></tr>
      <tr><td>Email</td><td><?php echo $email; ?></td></tr>
      <tr><td>Id Sekolah</td><td><?php echo $idSklh; ?></td></tr>
      <tr><td></td><td><a href="<?php echo site_url('guruadmsekolah') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->