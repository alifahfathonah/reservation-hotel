<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  header("location: login.php");
} else { ?>
  <!DOCTYPE html>
  <html>

  <head>
    <?php
  include "../config/koneksi.php";
  $result=mysqli_query($connect,"SELECT * FROM identitas WHERE identitas_id=1");
  while ($r=mysqli_fetch_array($result)) { ?>


      <title>
        <?php echo $r['identitas_website'] ?>
      </title>

      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="<?php echo $r['identitas_deskripsi'] ?>" />
      <meta name="keywords" content="<?php echo $r['identitas_keyword'] ?>" />
      <meta name="author" content="<?php echo $r['identitas_author'] ?>" />

      <link rel="shortcut icon" type="image/x-icon" href="assets/images/website/<?php echo $r['identitas_favicon'] ?>" sizes="16x16"
      />

      <link href="assets/admin/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
      <link href="assets/admin/fonts/font-awesome-4/css/font-awesome.min.css" rel="stylesheet" />
      <link href='assets/admin/fonts/css/fonts.css' rel='stylesheet' type='text/css'>
      <link href="assets/admin/js/jquery.nanoscroller/nanoscroller.css" rel="stylesheet" type="text/css" />
      <link href="assets/admin/css/style.css" rel="stylesheet" type="text/css" />


      <!-- Font -->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
      <script src="assets/admin/js/highchart.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="assets/admin/js/jquery.js" type="text/javascript"></script>
      <script src="assets/admin/js/date/jquery-1.7.1.min.js" type="text/javascript"></script>
      <script src="assets/admin/js/date/jquery-ui-1.8.17.custom.min.js" type="text/javascript"></script>
      <script src="assets/admin/js/behaviour/general.js" type="text/javascript"></script>
      <script src="assets/admin/js/jquery.nanoscroller/jquery.nanoscroller.js" type="text/javascript"></script>
      <script src="assets/admin/js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
  </head>

  <body>
    <?php 
  $result2 =mysqli_query($connect,"SELECT * FROM admin WHERE admin_username='$_SESSION[username]'");
  $r2      = mysqli_fetch_array($result2);
  ?>

    <div id="cl-wrapper" class="fixed-menu">
      <?php include "shared/navbar.php"; ?>
      <?php include "shared/sidemenu.php"; ?>

      <!-- ==================== Content ==================== -->
      <div class="container-fluid" id="pcont">
        <?php include "shared/breadcrumb.php"; ?>
        <?php include "content.php"; ?>
      </div>
      <!-- ==================== End Content ==================== -->
    </div>
    <script>
      $(function () {
        $('#modal-konfirmasi').on('show.bs.modal', function (event) {
          var div = $(event.relatedTarget)
          var id = div.data('id')
          var modal = $(this)
          modal.find('#hapus-user').attr("href",
            "modul/mod_user/user_aksi.php?module=user&act=hapus&id=" + id);
          modal.find('#hapus-guest').attr("href", "modul/mod_guest/guest_aksi.php?module=guest&act=hapus&id=" + id);
          modal.find('#hapus-roomtype').attr("href",
            "modul/mod_roomtype/roomtype_aksi.php?module=roomtype&act=hapus&id=" + id);
          modal.find('#hapus-classtype').attr("href",
            "modul/mod_classtype/classtype_aksi.php?module=classtype&act=hapus&id=" + id);
          modal.find('#hapus-facility').attr("href", "modul/mod_facility/facility_aksi.php?module=facility&act=hapus&id=" + id);
          modal.find('#hapus-eat').attr("href",
            "modul/mod_eat/eat_aksi.php?module=eat&act=hapus&id=" + id);
          modal.find('#hapus-slide').attr("href",
            "modul/mod_slide/slide_aksi.php?module=slide&act=hapus&id=" + id);
          modal.find('#hapus-room').attr("href",
            "modul/mod_room/room_aksi.php?module=room&act=hapus&id=" + id);
          modal.find('#hapus-bank').attr("href",
            "modul/mod_bank/bank_aksi.php?module=bank&act=hapus&id=" + id);
          modal.find('#accept-invoice').attr("href",
            "modul/mod_invoicebooking/invoicebooking_aksi.php?module=invoicebooking&act=accept&id=" + id);
        });
      });
      $(function () {
        $('#modal-konfirmasi').on('show.bs.modal', function (event) {
          var div = $(event.relatedTarget)
          var id = div.data('id')
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function () {
        App.init();
        App.dashBoard();
        introJs().setOption('showBullets', false).start();
      });
    </script>
    <script src="assets/admin/js/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/admin/js/jquery.flot/jquery.flot.js" type="text/javascript"></script>
    <script src="assets/admin/js/jquery.flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="assets/admin/js/jquery.flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="assets/admin/js/jquery.flot/jquery.flot.labels.js" type="text/javascript"></script>
    <script src="asset/admin/js/jquery.nestable/jquery.nestable.js"></script>
    <script src="asset/admin/js/bootstrap.switch/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="asset/admin/js/jquery.select2/select2.min.js" type="text/javascript"></script>
    <script src="asset/admin/js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
    <script src="asset/admin/js/jquery.icheck/icheck.min.js" type="text/javascript"></script>
    <script src="asset/admin/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

    <script src="assets/admin/js/jquery.parsley/parsley.js" type="text/javascript"></script>
  </body>

  </html>
  <?php } } ?>