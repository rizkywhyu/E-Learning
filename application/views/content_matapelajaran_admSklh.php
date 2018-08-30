<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.css">

<section class="content-header">
      <h1>
        Kelola MataPelajaran
      </h1>
</section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <h3 class='box-title'>DAFTAR SISWA <?php echo anchor('Siswa/create/','Create',array('class'=>'btn btn-danger btn-sm'));?></h3>
    
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            
        <th>Kode MataPelajaran</th>
        <th>MataPelajaran</th>
        
        
        <th>Action</th>
                </tr>
            </thead>
      <tbody>
            <?php
            $start = 0;
            //echo $tanah->nums_rows();
            foreach ($admSklh as $admSklh)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $admSklh->kodemp?></td>
            <td><?php echo $admSklh->nama ?></td>
            
            
            <td style="text-align:center" width="140px">
            <?php 
            echo anchor(site_url('Siswa/read/'.$admSklh->kodemp),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('Siswa/update/'.$admSklh->kodemp),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('Siswa/delete/'.$admSklh->kodemp),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure to Delete ?\')"'); 

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
             <!-- /.box-header -->
          
            <!-- /.box-body -->
              <!-- /.box-header -->
           
            <!-- /.box-body -->
              <!-- /.box-header -->
            
            <!-- /.box-body -->
            
            
            

          </div>

          <!-- /.box -->
        </div>

        <!-- /.col -->
      </div>
     
     
      </section>
     
      <!-- /.row -->
<script src="<?php echo base_url()."assets/"; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<!--<script src="<?php //echo base_url()."assets/"; ?>bootstrap/js/bootstrap.min.js"></script>-->
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
  if(<?php echo $idx ?> == 0){
    document.getElementById('pilKelas').style.display = "none";
    document.getElementById('pilMp').style.display = "none";
    document.getElementById('tabelAll').style.display = "none";
    document.getElementById('tabelKelas').style.display = "none";
    document.getElementById('tabelMp').style.display = "none";
    document.getElementById('km').style.display = "none";
    document.getElementById('tabelkm').style.display = "none";
  }
  else if(<?php echo $idx ?> == 1){
    document.getElementById('pilKelas').style.display = "block";
    document.getElementById('tabelKelas').style.display = "block";
    document.getElementById('pilMp').style.display = "none";
    document.getElementById('tabelAll').style.display = "none";
    document.getElementById('tabelMp').style.display = "none";
    document.getElementById('km').style.display = "none";
    document.getElementById('tabelkm').style.display = "none";
  }
  else if(<?php echo $idx ?> == 2){
    document.getElementById('pilKelas').style.display = "none";
    document.getElementById('tabelKelas').style.display = "none";
    document.getElementById('pilMp').style.display = "block";
    document.getElementById('tabelAll').style.display = "none";
    document.getElementById('tabelMp').style.display = "block";
    document.getElementById('km').style.display = "none";
    document.getElementById('tabelkm').style.display = "none";
  }
  else if(<?php echo $idx ?> == 3){
    document.getElementById('pilKelas').style.display = "none";
    document.getElementById('pilMp').style.display = "none";
    document.getElementById('tabelAll').style.display = "none";
    document.getElementById('tabelKelas').style.display = "none";
    document.getElementById('tabelMp').style.display = "none";
    document.getElementById('km').style.display = "block";
    document.getElementById('tabelkm').style.display = "block";
  }

  function check() {
   var val = document.getElementById('pil').value;
   if(val=='all') {
    document.getElementById('tabelAll').style.display = "block";
    document.getElementById('tabelKelas').style.display = "none";
    document.getElementById('tabelMp').style.display = "none";
    document.getElementById('pilKelas').style.display = "none";
    document.getElementById('pilMp').style.display = "none";
    document.getElementById('km').style.display = "none";
    document.getElementById('tabelkm').style.display = "none";
   } else if(val == 'kelas') {
    document.getElementById('pilKelas').style.display = "block";
    document.getElementById('tabelAll').style.display = "none";
    document.getElementById('pilMp').style.display = "none";
    document.getElementById('km').style.display = "none";
   } else if(val == 'matpel') {
   document.getElementById('pilMp').style.display = "block";
   document.getElementById('pilKelas').style.display = "none";
   document.getElementById('tabelAll').style.display = "none";
   document.getElementById('km').style.display = "none";
   } else if(val == 'km') {
    document.getElementById('pilMp').style.display = "none";
   document.getElementById('pilKelas').style.display = "none";
   document.getElementById('tabelAll').style.display = "none";
   document.getElementById('km').style.display = "block";
   }
  }

  function pilKelas(kelas){
    window.location = "<?php echo base_url().'cont_dsn/viewNilaiKelas/'?>"+kelas;
  }

  function pilMp(mp){
    window.location = "<?php echo base_url().'cont_dsn/viewNilaiMp/'?>"+mp;
  }

  function pilkm(km){
    window.location = "<?php echo base_url().'cont_dsn/viewNilaiKm/'?>"+km;
  }

</script>

