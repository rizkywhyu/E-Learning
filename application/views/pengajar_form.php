<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DATA PENGAJAR</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
        <td><input type="hidden" class="form-control" name="id" id="id" placeholder="id" value="<?php echo $id; ?>" / >
        </td>
        <tr><td>Kode Guru <?php echo form_error('kodegur') ?></td>
            <td><input type="text" class="form-control" name="kodeguru" id="kodeguru" placeholder="kodeguru" value="<?php echo $kodeguru; ?>" / >
        </td>
	    <tr><td>Kode MataPelajaran <?php echo form_error('kodemp') ?></td>
            <td><input type="text" class="form-control" name="kodemp" id="kodemp" placeholder="kodemp" value="<?php echo $kodemp; ?>" />
        </td>
	    
	   
        
        <tr><td>Kelas <?php echo form_error('kelas') ?></td>
            <td><input type="text" class="form-control" name="kelas" id="kelas" placeholder="kelas" value="<?php echo $kelas; ?>" />
        </td>
<!--	    <input type="hidden" name="Id_buku" value="<?php echo $Id_buku; ?>" /> -->
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengajar') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->