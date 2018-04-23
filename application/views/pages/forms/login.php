<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bower_components/font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/loginStyle.css">
<link href="https://fonts.googleapis.com/css?family=Anton|Black+Han+Sans|Roboto|Roboto+Condensed|Roboto+Slab|Source+Sans+Pro" rel="stylesheet">
    <title>DIAGNOSAKUCING</title>
  </head>
  <body>
      <div class="wrapper">
        <div class="tampilan-1">


        <div class="title-1">
            <h1>Periksa Kucingmu Sekarang !</h1>
            <h3>Atasi,hindari dan cari tahu penyakit kucingmu </h3>
        </div>
        <?php echo validation_errors();?>
                <?php echo form_open('Login/login_validation'); ?>
        <div class="formlogin">
            <input type="text" name="username" value="" placeholder="Username" required> <br>
            <input type="password" name="password" value="" placeholder="Password" required>
            <br>
            <button type="submit" name="submit">LOGIN</button>
            <br>
            <p>Tidak punya akun? <a href="#" id="daftar">Daftar sekarang!</a> </p>
        </div>
  <?php echo form_close(); ?>
  </div>

<div class="tampilan-2">
<div class="login-menu">
    <a href="#" id="login">LOGIN</a>
</div>

  <div class="title-2">
      <h1>Daftar gratis</h1>
      <h3>Atasi,hindari dan cari tahu penyakit kucingmu </h3>
  </div>
  <?php echo validation_errors();?>
          <?php echo form_open('Login/login_validation'); ?>
  <div class="formDaftar">
    <div class="fUsername">
      <label for="username">Username :</label>
      <input type="text" name="username" value=""  required>
    </div>

   <div class="fEmail">
     <label for="email">Email :</label>
     <input type="email" name="email" value=""  required>
   </div>

   <div class="fPassword">
     <label for="password">Password :</label>
     <input type="password" name="password" value="" required>
   </div>
   <div class="fRePassword">
     <label for="Repassword">Ulangi Password :</label>
     <input type="password" name="Repassword" value=""  required>
   </div>




    <button type="submit" name="submit">DAFTAR</button>
  </div>
<?php echo form_close(); ?>
</div>
      </div>
      <script src="<?php echo base_url(); ?>assets/js/script.js">
            </script>
      <script src="<?php echo base_url(); ?>assets/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/template/bower_components/jquery/dist/jquery.min.js"></script>
  </body>
</html>
