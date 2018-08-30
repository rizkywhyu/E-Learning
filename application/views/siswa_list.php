
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-md-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DAFTAR SISWA <?php echo anchor('siswaadm/create/','Create',array('class'=>'btn btn-danger btn-sm'));?></h3>
		
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            
		    <th>NIS</th>
		    <th>Nama</th>
		    <th>Sekolah</th>
		    
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            //echo $tanah->nums_rows();
            foreach ($siswaadm_data as $siswaadm)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $siswaadm->NIS ?></td>
            <td><?php echo $siswaadm->Nama ?></td>
            <td><?php echo $siswaadm->Sekolah ?></td>
            
            <td style="text-align:center" width="140px">
            <?php 
            echo anchor(site_url('siswaadm/read/'.$siswaadm->NIS),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('siswaadm/update/'.$siswaadm->NIS),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('siswaadm/delete/'.$siswaadm->NIS),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure to Delete ?\')"'); 

            ?>

            </td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <div style="margin-top:20px"></div>
                <form action="<?php echo base_url(). 'siswaadm/uploadd' ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="file"/>
                    <input type="submit" value="Upload file"/>
                </form>
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