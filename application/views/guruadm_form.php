<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DATA GURU</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
        <tr><td>Kode Guru <?php echo form_error('kodeguru') ?></td>
            <td><input type="text" class="form-control" name="kodeguru" id="kodeguru" placeholder="kodeguru" value="<?php echo $kodeguru; ?>" / >
        </td>
	    <tr><td>Nama <?php echo form_error('nama') ?></td>
            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="<?php echo $nama; ?>" />
        </td>
	    <tr><td>Sekolah <?php echo form_error('sekolah') ?></td>
            <td><input type="text" class="form-control" name="sekolah" readonly="true" id="sekolah" placeholder="sekolah" value="<?php echo $this->session->userdata('nama'); ?>" />
        </td>
	   
	    <tr><td>alamat <?php echo form_error('alamat') ?></td>
            <td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" value="<?php echo $alamat; ?>" />
        </td>

	    <tr><td>No HP <?php echo form_error('noHP') ?></td>
            <td><input type="text" class="form-control" name="noHP" id="noHP" placeholder="noHP" value="<?php echo $noHP; ?>" />
        </td>
        <tr><td>Email <?php echo form_error('email') ?></td>
            <td><input type="text" class="form-control" name="email" id="email" placeholder="email" value="<?php echo $email; ?>" />
        </td>
       <tr><td>Id Sekolah <?php echo form_error('idSklh') ?></td>
            <td><input type="text" class="form-control" name="idSklh" readonly="true" id="idSklh" placeholder="idSklh" value="<?php echo $this->session->userdata('id'); ?>" />
        </td>
<!--	    <input type="hidden" name="Id_buku" value="<?php echo $Id_buku; ?>" /> -->
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('Guruadmsekolah') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    <!-- <script>
            $(document).ready(function () {
                $(".select2").select2({
                    placeholder: "Please Select"
                });
            });
        </script> -->
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->