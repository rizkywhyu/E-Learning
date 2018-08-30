
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-md-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DAFTAR SEKOLAH <?php echo anchor('Sekolah/create/','Create',array('class'=>'btn btn-danger btn-sm'));?></h3>
		
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            
		    <th>Sekolah</th>
		    <!-- <th>Password</th> -->
		    <th>Usename</th>
		    
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            //echo $tanah->nums_rows();
            foreach ($Sekolah_data as $Sekolah)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $Sekolah->nm_sklh ?></td>
            <!-- <td><?php echo $Sekolah->password ?></td> -->
            <td><?php echo $Sekolah->u_name ?></td>
            
            <td style="text-align:center" width="140px">
            <?php 
            echo anchor(site_url('Sekolah/read/'.$Sekolah->idSklh),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('Sekolah/update/'.$Sekolah->idSklh),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('Sekolah/delete/'.$Sekolah->idSklh),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure to Delete ?\')"'); 

            ?>

            </td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->