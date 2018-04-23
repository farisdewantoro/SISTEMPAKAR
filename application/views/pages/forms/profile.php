<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <section class="content">



<div class="editProfile">

  <div class="alert alert-success" role="alert" style="<?php if(!empty($this->session->flashdata('success')) ){echo "display:block;";}else {echo "display:none;";} ?>"><?php echo $this->session->flashdata('success'); ?></div>

  <div class="box box-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-aqua-active">
      <div class="title-edit">
        <div class="logoedit">
    <i class="fa fa-edit"></i>
        </div>

        
      </div>

      <h3 class="widget-user-username"><?php echo $this->session->userdata('username'); ?></h3>

    </div>
    <div class="widget-user-image">
      <img class="img-circle" src=" <?php echo base_url(); ?>assets/img/user.jpg " alt="User Avatar">

    </div>
    <div class="box-footer">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
  <?php foreach ($profile as $p ): ?>
          <?php echo validation_errors();?>
                  <?php echo form_open('Profile_control/update_profile'); ?>





          <div class="form-group">
         <label for="exampleInputEmail1">Nama Lengkap</label>
         <input type="text" name="nama" class="form-control" value="<?php echo $p['nama']; ?> " >
       </div>
       <div class="form-group">
   <label for="exampleInputEmail1">Email address</label>
   <input type="email" name="email" class="form-control" required id="exampleInputEmail1" value="<?php echo $p['email']; ?> " >
 </div>
          <!-- /.description-block -->
          <div class="form-group">
         <label for="exampleInputEmail1">Alamat</label>
        <textarea name="alamat" class="form-control" rows="3"><?php echo $p['alamat']; ?> </textarea>
       </div>

       <div class="form-group">
      <label for="exampleInputEmail1">Deskripsi</label>
     <textarea name="deskripsi" class="form-control" rows="3"><?php echo $p['deskripsi']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">Foto</label>
      <input type="file" id="exampleInputFile">
      <p class="help-block">Masukan foto anda disini</p>
    </div>

      <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          <?php echo form_close(); ?>
        <!-- /.col -->
<?php endforeach; ?>


      </div>
      <!-- /.row -->
    </div>
  </div>



</div>

  </section>
  <!-- /.content -->
</div>
