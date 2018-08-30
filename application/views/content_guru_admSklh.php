<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.css">
<section class="content-header">
      <h1>
        Daftar Guru
      </h1>
</section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               <h3 class='box-title'>DAFTAR GURU  <?php echo anchor('cont_admsklh/Beranda33/','Create',array('class'=>'btn btn-danger btn-sm'));?>

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
            foreach ($admSklh as $admSklh)
            {
                ?>
                <tr>
        <td><?php echo ++$start ?></td>
        <td><?php echo $admSklh->kodeguru ?></td>
        <td><?php echo $admSklh->nama ?></td>
        <td><?php echo $admSklh->sekolah ?></td>
        
        <td style="text-align:center" width="200px">
      <?php 
      echo anchor(site_url('Guru/read/'.$admSklh->kodeguru),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
      echo '  '; 
      echo anchor(site_url('Guru/update/'.$admSklh->kodeguru),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
      echo '  '; 
      echo anchor(site_url('Guru/delete/'.$admSklh->kodeguru),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure to Delete ?\')"'); 
            
      ?>

        </td>
          </tr>
                <?php
            }
            ?>
            
            </tbody>

        </table>
            </div>
            <!-- /.box-body -->
          </div>
                
          <!-- /.box -->
        </div>

        <!-- /.col -->
      </div>
      </section>
      <!-- /.row -->
    </section>
<script src="<?php echo base_url()."assets/"; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<!-- <script src="<?php //echo base_url()."assets/"; ?>bootstrap/js/bootstrap.min.js"></script> -->
<!-- DataTables -->
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>

