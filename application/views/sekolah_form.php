<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DATA SEKOLAH</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
         <!-- <tr><td>Id Sekolah <?php echo form_error('idSklh') ?></td> -->
            <td><input type="hidden" class="form-control" name="idSklh" id="idSklh" placeholder="idSklh" value="<?php echo $idSklh; ?>" / >
        </td>
        <tr><td>Sekolah <?php echo form_error('nm_sklh') ?></td>
            <td><input type="text" class="form-control" name="nm_sklh" id="nm_sklh" placeholder="nm_sklh" value="<?php echo $nm_sklh; ?>" / >
        </td>
	    <tr><td>Username <?php echo form_error('u_name') ?></td>
            <td><input type="text" class="form-control" name="u_name" id="u_name" placeholder="u_name" value="<?php echo $u_name; ?>" />
        </td>
	   
	   
	    
<!--	    <input type="hidden" name="Id_buku" value="<?php echo $Id_buku; ?>" /> -->
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sekolah') ?>" class="btn btn-default">Cancel</a></td></tr>
	
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