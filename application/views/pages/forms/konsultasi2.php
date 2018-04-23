<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <section class="content">



<div class="container">


<div class="jawaban">
    <div class="row">
      <?php foreach ($Backward as $kons) {?>
  <div class="jawab">
    <div class="title">
      <h2>Jawablah pertanyaan berikut ini :</h2>
    </div>

    <div class="col-md-5 diagnosa-box-2" >
      <div class="pertanyaan-box-2">
  <center>  <h2><?php echo $kons['Pertanyaan']; ?></h2></center>
  </div>
      <?php echo validation_errors();?>
      <?php echo form_open('Konsultasi_control/jawaban'); ?>
      <div class="pertanyaan">
          <input type="hidden" name="KodePertanyaan" value="<?php echo $kons['KodePertanyaan'];?>">
          <input type="hidden" name="Pertanyaan" value="<?php echo $kons['Pertanyaan'];?>">
          <input type="hidden" name="Tanggal" value="<?php echo date('Y-m-d'); ?>">
          <input type="hidden" name="Waktu" value="<?php echo date('h:i:sa'); ?> ">
      </div>


        <div class="tombol">
      <center>  <button type="submit" name="btnYa" class="btnPilihanYa-2" onmouseover="btnOver(this)"
        onmouseout="btnOver($this)">YA</button>
        <button type="submit" name="btnNo" class="btnPilihanNo-2">TIDAK</button></center>
        </div>
<?php echo form_close(); ?>

    </div>




  </div>
<?php } ?>

<div class="col-md-6">
  <div class="hasiljawaban">
<div class="title-riwayatp">
  <h3>Riwayat Pertanyaan</h3>
</div>

<?php $i=1; ?>

<?php foreach ($jawabanUser as $jwb ) { ?>
<div class="riwayatpertanyaan">

 <h4><?php echo "$i . "; ?>  <?php echo $jwb['Pertanyaan']; ?> <span style=" <?php if ($jwb['jawaban']==='YA') {echo "color:#26c65b;";}else { echo "color:#d50808;";} ?> "> <?php echo $jwb['jawaban']; ?></span></h4>


<?php $i++ ?>
</div>


<?php } ?>

<script type="text/javascript">
  $(document).ready(function(){
    var dataString = $("#FormId").serialize();
    var url="Konsultasi_control/jawaban"
        $.ajax({
        type:"POST",
        url:"<?php echo base_url() ?>"+url,
        data:dataString,
        success:function (data) {
            swal('data');
        }
        });
  })
</script>


  </div>
</div>

    </div>
</div>




</div>


  </section>
  <!-- /.content -->
</div>
