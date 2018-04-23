<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
<div class="tambahPertanyaan">


    <div class="box-body">


  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
  <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Tambah Rule</h3>
    </div>
  <div class="box-body">

  <!-- Main content -->

    <div class="form-group">
      <?php echo validation_errors();?>

  <?php echo form_open('Dataknowledge_control/tambahDataRule'); ?>




      <label>Nama Penyakit</label>
      <select class="form-control select2" id="select-btn" name="NamaPenyakit" style="width: 100%;  ">
        <option value="" selected="selected" >Pilih Penyakit</option>
            <?php foreach ($TabelPenyakit as $TP): ?>
        <option value="<?php echo $TP['NamaPenyakit']; ?>"><?php echo $TP['NamaPenyakit']; ?></option>
    <?php endforeach; ?>
      </select>
    </div>


    <div class="form-group">
      <label for="exampleInputEmail1">Kode Penyakit</label>
    <input id="kodepenyakit" readonly type="text" name="kodepenyakit" class="form-control" value=""  >
      <label for="exampleInputEmail1">Kode Rule</label>
      <?php foreach ($TabelRule as $P ): ?>
        <?php $lastKode= $P['KodeRule'];
        $kode = substr($lastKode,0,1);
       $angka = substr($lastKode,1,4);
       $angka_baru = str_repeat("0",4 - strlen($angka+1)).($angka+1);
       $hasil = $kode.$angka_baru;
       ?>

      <input  readonly type="text" name="KodeRule" class="form-control" value="<?php echo $hasil; ?>"  >
        <?php endforeach; ?>

    </div>

    <div class="form-group">
  <label for="exampleInputEmail1">Kode Pertanyaan</label>
  <input type="text" name="KodePertanyaan" class="form-control" >
</div>


<button type="submit" class="btn btn-primary" id="btn-submit" >Tambah</button>
</div>




  <?php echo form_close(); ?>





  <script type="text/javascript">
    $(document).ready(function(){
      $('#select-btn').on('change',function(){

var selectData = $(this).val();
var url ="Dataknowledge_control/ajaxTambahRule";
$.ajax({
  type:"POST",
  url:"<?php echo base_url() ?>"+url,
  data:{'selectData':selectData},
  success:function(data){
    $("#kodepenyakit").val(data);
  }
});

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
