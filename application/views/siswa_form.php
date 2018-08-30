<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DATA SISWA</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
        <tr><td>NIS <?php echo form_error('NIM') ?></td>
            <td><input type="text" class="form-control" name="NIS" id="NIS" placeholder="NIS" value="<?php echo $NIS; ?>" / >
        </td>
	    <tr><td>Nama <?php echo form_error('Nama') ?></td>
            <td><input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama" value="<?php echo $Nama; ?>" />
        </td>
	    
	    <tr><td>Sekolah <?php echo form_error('Sekolah') ?></td>
        <td><input type="text" class="form-control" name="Sekolah" id="Sekolah" placeholder="Sekolah" value="<?php echo $Sekolah; ?>" />
        </td>
        
	  
        <tr><td>Kelas <?php echo form_error('Kelas') ?></td>
            <td><input type="text" class="form-control" name="Kelas" id="Kelas" placeholder="Kelas" value="<?php echo $Kelas; ?>" />
        </td>
        <tr><td>Alamat <?php echo form_error('Alamat') ?></td>
            <td><input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Alamat" value="<?php echo $Alamat; ?>" />
        </td>
        <tr><td>No HP <?php echo form_error('NoHP') ?></td>
            <td><input type="text" class="form-control" name="NoHP" id="NoHP" placeholder="NoHP" value="<?php echo $NoHP; ?>" />
        </td>
        <tr><td>Email <?php echo form_error('Email') ?></td>
            <td><input type="text" class="form-control" name="Email" id="Email" placeholder="Email" value="<?php echo $Email; ?>" />
        </td>
        <tr><td>No. HP Orangtua <?php echo form_error('nmrOrtu') ?></td>
            <td><input type="text" class="form-control" name="nmrOrtu" id="nmrOrtu" placeholder="nmrOrtu" value="<?php echo $nmrOrtu; ?>" />
        </td>
         <tr><td>Id Sekolah <?php echo form_error('idSklh') ?></td>
            <td><input type="text" class="form-control" name="idSklh" id="idSklh" placeholder="idSklh" value="<?php echo $idSklh; ?>" />
        </td>
<!--	    <input type="hidden" name="Id_buku" value="<?php echo $Id_buku; ?>" /> -->
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('siswaadm') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->