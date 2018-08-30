<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.css">

<section class="content-header">
      <h1>
        Data MataPelajaran
      </h1>
</section>
 <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>EDIT MATAPELAJARAN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
        <tr><td>Kode MataPelajaran <?php echo form_error('kodemp') ?></td>
            <td><input type="text" class="form-control" name="kodemp" id="kodemp" placeholder="kodemp" value="<?php echo $kodedsn; ?>" / >
        </td>
      <tr><td>Nama <?php echo form_error('nama') ?></td>
            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="<?php echo $nama; ?>" />
        </td>
      
        <tr><td>Id Sekolah <?php echo form_error('idSklh') ?></td>
            <td><input type="text" class="form-control" name="idSklh" id="idSklh" placeholder="idSklh" value="<?php echo $Email; ?>" />
        </td>
<!--      <input type="hidden" name="Id_buku" value="<?php echo $Id_buku; ?>" /> -->
      <!-- <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>  -->
      <a href="<?php echo site_url('guru') ?>" class="btn btn-default">Cancel</a></td></tr>
  
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

