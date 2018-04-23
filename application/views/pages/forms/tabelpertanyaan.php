<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Main content -->
  <section class="content">
<div class="dataknowledge">

    <div class="box">
      <div class="box-header btnRight">
        <h3 class="box-title">Tabel Pertanyaan</h3>
        <a href="<?php echo base_url(); ?>tambahPertanyaan" class="btn btn-primary"> Tambah Pertanyaan</a>

      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Kode Pertanyaan</th>
            <th>Gejala</th>
            <th>Pertanyaan</th>
            <th>Aksi</th>

          </tr>
          </thead>
          <tbody>



<?php $i=1; ?>
            <?php foreach ($dataknowledge as $d ): ?>

          <tr>
            <td> <?php echo $i++; ?>
            </td>
            <td> <?php echo $d['KodePertanyaan']; ?> </td>
            <td> <?php echo $d['NamaGejala']; ?> </td>
            <td><?php echo $d['Pertanyaan']; ?></td>
            <td class="action"> <a href="<?php echo base_url(); ?>updatePertanyaan/<?php echo $d['NoPertanyaan']; ?>">  <i class="fa fa-edit"></i></a>

                <button value="<?php echo $d['NoPertanyaan']; ?>" id="btnDelete" onclick="validate(this)"><i class="fa fa-trash"></i></button>
              </td>
          </tr>

  <?php endforeach; ?>

          </tbody>
          <!-- <tfoot>
          <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>

          </tr>
          </tfoot> -->
        </table>



        <?php if (		 $this->session->flashdata('success')) {?>
          <script>
      $(document).ready(function(){


                              swal({
                                  title: "Berhasil !",
                                  text: "<?php echo $this->session->flashdata('success'); ?>",
                                  timer:3000,
                                  showConfirmButton: true,
                                  type: 'success'
                              });
                              });
                          </script>
        <?php  } ?>



        <script>
      $(function(){ TablesDatatables.init(); });
      function validate(a)
      {
var id= a.value;

          swal({
                  title: "Are you sure?",
                  text: "You want to delete this !",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, Delete it!",
                  closeOnConfirm: false }, function()
              {
            
                  $(location).attr('href','<?php echo base_url(); ?>deletePertanyan/'+id);

              }
          );
      }
       </script>


        <div class="pagination1">
        	<?php echo $this->pagination->create_links(); ?>
        </div>
      </div>
      <!-- /.box-body -->
    </div>



</div>

  </section>
  <!-- /.content -->
</div>
