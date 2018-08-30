
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-md-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DAFTAR GURU  <?php echo anchor('Guruadmsekolah/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>

                  </h3>

                </div><!-- /.box-header -->
                <div class='box-body'>

        <table class="table table-bordered table-striped" id="mytable">

            <thead>
                <tr>
                    <th width="80px">No</th>
            
            <th>Kode Guru</th>
            <th>Nama</th>
            <th>Sekolah</th>
            
            <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;

            foreach ($guru_data as $guru)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $guru->kodeguru ?></td>
            <td><?php echo $guru->nama ?></td>
            <td><?php echo $guru->sekolah ?></td>
            
            <td style="text-align:center" width="200px">
            <?php 
            echo anchor(site_url('Guruadmsekolah/read/'.$guru->kodeguru),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('Guruadmsekolah/update/'.$guru->kodeguru),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('Guruadmsekolah/delete/'.$guru->kodeguru),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure to Delete ?\')"'); 
            
            ?>

            </td>
            </tr>
                <?php
            }
            ?>
            
            </tbody>

        </table>
        <div style="margin-top:20px"></div>
                <form action="<?php echo base_url(). 'Guruadmsekolah/uploadd' ?>" method="post" enctype="multipart/form-data">
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
        <!-- 10.14.211.121 -->