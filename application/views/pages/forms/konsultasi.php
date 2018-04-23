<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->

<div class="container">
<div class="jawaban">
    <div class="row">

      <?php foreach ($konsul as $kons) {?>



  <div class="jawab">

    <div class="title">
      <h2>Jawablah pertanyaan berikut ini :</h2>
    </div>

    <div class="diagnosa-box">
      <div class="pertanyaan-box">


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
<center>  <button type="submit" name="btnYa" class="btnPilihanYa" >YA</button>
  <button type="submit" name="btnNo" class="btnPilihanNo">TIDAK</button></center>
  </div>



<?php echo form_close(); ?>

    </div>




  </div>




    </div>
</div>

<?php } ?>



</div>


  </section>
  <!-- /.content -->
</div>
