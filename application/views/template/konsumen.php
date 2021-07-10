<!DOCTYPE html>
<html>
<?php
$setting_aplikasi = $this->db->get('setting')->row();
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= "{$title} - {$setting_aplikasi->nama}"; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->

  <!-- logo website -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>">

  <!-- Font Awesome -->


  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bs4/css/bootstrap.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
</head>

<body>
  <!-- Main content -->
  <div class="container" style="padding:30px">
    <div class="row">
      <div class="col-md-12">
        <center>
          <div class=" mb-3" style="font-size:30px"><b>KEDAI WARUNG KOPI SOETOMO</b></div>
        </center>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <section class="content">
          <?php $this->load->view($page); ?>
        </section>
      </div>
    </div>

  </div>
  <!-- As a heading -->
  <!-- /.content -->
</body>
<!-- As a heading -->
<!-- sweetallert -->
<script src="<?= base_url('/assets/bs4/js/bootstrap.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->


</html>