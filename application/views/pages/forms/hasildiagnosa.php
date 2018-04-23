<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="TES">
        <h1>HASIL :</h1>
      <?php
      foreach ($tabelpenyakit as $data) {  ?>
          <h1> <?php echo $data['NamaPenyakit']; ?> </h1>
    <?php  } ?>


    </div>

  </section>
  <!-- /.content -->
</div>
