<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DATA MATAPELAJARAN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
        <tr><td>Kode MataPelajaran <?php echo form_error('kodemp') ?></td>
            <td><input type="text" class="form-control" name="kodemp" id="kodemp" placeholder="kodemp" value="<?php echo $kodemp; ?>" / >
        </td>
	    <tr><td>Nama Matapelajaran<?php echo form_error('nama') ?></td>
            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="<?php echo $nama; ?>" />
        </td>
	    
	   
         <tr><td>Id Sekolah <?php echo form_error('idSklh') ?></td>
            <td><input type="text" class="form-control" name="idSklh" readonly="true" id="idSklh" placeholder="idSklh" value="<?php echo $this->session->userdata('id'); ?>" />
        </td>
        <tr><td>Kelas <?php echo form_error('kelas') ?></td>
            <td><input type="text" class="form-control" name="kelas" id="kelas" placeholder="kelas" value="<?php echo $kelas; ?>" />
        </td>
         <tr><td>Pengajar <?php echo form_error('kodeguru') ?></td>
            <td><input type="text" class="form-control" name="kodeguru" id="kodeguru" placeholder="kodeguru" value="<?php echo $kodeguru; ?>" / >
        </td>
<!--	    <input type="hidden" name="Id_buku" value="<?php echo $Id_buku; ?>" /> -->
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mapel') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->