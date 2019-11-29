<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <?php
  include "config/koneksi.php";
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

    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/images/website/<?php echo $r['identitas_favicon'] ?>" sizes="16x16"
    />

    <link href="admin/assets/admin/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
    <link href="admin/assets/admin/fonts/font-awesome-4/css/font-awesome.min.css" rel="stylesheet" />
    <link href='admin/assets/admin/fonts/css/fonts.css' rel='stylesheet' type='text/css'>
    <link href="admin/assets/admin/js/jquery.nanoscroller/nanoscroller.css" rel="stylesheet" type="text/css" />
    <link href="admin/assets/admin/css/style2.css" rel="stylesheet" type="text/css" />


    <!-- Font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
    <script src="admin/assets/admin/js/highchart.js"></script>
    <script src="admin/assets/admin/js/exporting.js"></script>
    <script src="admin/assets/admin/js/jquery.js" type="text/javascript"></script>
    <script src="admin/assets/admin/js/date/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="admin/assets/admin/js/date/jquery-ui-1.8.17.custom.min.js" type="text/javascript"></script>
    <script src="admin/assets/admin/js/behaviour/general.js" type="text/javascript"></script>
    <script src="admin/assets/admin/js/jquery.nanoscroller/jquery.nanoscroller.js" type="text/javascript"></script>
    <script src="admin/assets/admin/js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
</head>

<body>
    <?php include "shared/navbar.php"; ?>
      <?php include "shared/sidemenu.php"; ?>
      <!-- ==================== Content ==================== -->
    <div id="cl-wrapper">
      <div class="container-fluid" id="pcont">
        <?php include "shared/breadcrumb.php"; ?>
        <?php include "content.php"; ?>
        <?php include "shared/footer.php"; ?>
      </div>
      <!-- ==================== End Content ==================== -->
    </div>
    <script>
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
    <script src="admin/assets/admin/js/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="admin/assets/admin/js/jquery.flot/jquery.flot.js" type="text/javascript"></script>
    <script src="admin/assets/admin/js/jquery.flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="admin/assets/admin/js/jquery.flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="admin/assets/admin/js/jquery.flot/jquery.flot.labels.js" type="text/javascript"></script>
    <script src="admin/asset/admin/js/jquery.nestable/jquery.nestable.js"></script>
    <script src="admin/asset/admin/js/bootstrap.switch/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="admin/asset/admin/js/jquery.select2/select2.min.js" type="text/javascript"></script>
    <script src="admin/asset/admin/js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
    <script src="admin/asset/admin/js/jquery.icheck/icheck.min.js" type="text/javascript"></script>
    <script src="admin/asset/admin/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

    <script src="admin/assets/admin/js/jquery.parsley/parsley.js" type="text/javascript"></script>
</body>

</html>
<?php } ?>