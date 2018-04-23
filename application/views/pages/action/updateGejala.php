<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
<div class="tambahPertanyaan">


    <div class="box-body">


  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
  <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Update Gejala</h3>
    </div>
  <div class="box-body">

  <!-- Main content -->

    <div class="form-group">
      <?php echo validation_errors();?>

  <?php echo form_open_multipart('Dataknowledge_control/updateGejala/'.$getGejala['NoGejala']); ?>
  <label for="exampleInputEmail1">Nama Gejala</label>


  <input  type="text" name="NamaGejala" class="form-control" value="<?php echo $getGejala['NamaGejala']; ?>"  >


    </div>


    <div class="form-group">

      <label for="exampleInputEmail1">Kode Gejala</label>


      <input  readonly type="text" name="KodeGejala" class="form-control" value="<?php echo $getGejala['KodeGejala']; ?>"  >

    </div>



<button type="submit" class="btn btn-primary" id="btn-submit" >Tambah</button>
</div>




  <?php echo form_close(); ?>










</div>
</div>
</div>
</div>



</div>
  </section>
  <!-- /.content -->
</div>
