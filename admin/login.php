<!DOCTYPE html>
<html lang="en-US">
  <head>
    <?php
    include "../config/koneksi.php";
    $result=mysqli_query($connect, "SELECT * FROM identitas WHERE identitas_id=1");
    while ($r=mysqli_fetch_array($result)) { ?>

    <title><?php echo $r['identitas_website'] ?> - Login</title>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $r['identitas_deskripsi'] ?>"/>
    <meta name="keywords" content="<?php echo $r['identitas_keyword'] ?>"/>
    <meta name="author" content="<?php echo $r['identitas_author'] ?>"/>

    <link rel="shortcut icon" type="image/x-icon" href="assets/images/website/<?php echo $r['identitas_favicon'] ?>" sizes="16x16" />

    <!-- Font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

    <link href="assets/admin/fonts/font-awesome-4/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/admin/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="assets/admin/css/style.css" rel="stylesheet" />

    <style type="text/css">
      body {
        background:url(assets/admin/images/login.jpg);
        background-attachment:fixed;
        background-size:cover;
      }
    </style>

  </head>
  <body class="texture">
    <div id="cl-wrapper" class="login-container">
      <div class="middle-login">
        <div class="block-flat">
          <div class="header">
            <h3 class="text-center">
              <img class="logo-img" src="assets/images/website/<?php echo $r['identitas_favicon'] ?>" alt="logo"/>
            </h3>
			    </div>
          <div>
            <form style="margin-bottom: 0px !important;" class="form-horizontal" action="cek_login.php" method="post" name="formLogin" id="form" parsley-validate novalidate>
              <div class="content">
                <div class="form-group input-group-lg">
                  <div class="col-sm-12">
                    <input type="text" name="username" id="user" required class="form-control" placeholder="Username" autocomplete="off"/>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="password" name="password" id="pass" required class="form-control" placeholder="Password" autocomplete="off"/>
                  </div>
                </div>
              </div>
              <div class="foot">
                <button type="submit" class="btn btn-primary btn-block" name="masuk">Login</button>
              </div>
            </form>
          </div>
        </div>
      <div class="text-center out-links"><a href="#">2018 &copy; <?php echo $r['identitas_author'] ?> All Right Reserved</a></div>
      </div>
    </div>

    <script src="assets/admin/js/jquery.js"></script>
    <script src="assets/admin/js/behaviour/general.js" type="text/javascript" ></script>

    <script src="assets/admin/js/behaviour/voice-commands.js"></script>
    <script src="assets/admin/js/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/admin/js/jquery.flot/jquery.flot.js" type="text/javascript" ></script>
    <script src="assets/admin/js/jquery.flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="assets/admin/js/jquery.flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="assets/admin/js/jquery.flot/jquery.flot.labels.js" type="text/javascript"></script>
    <script src="assets/admin/js/jquery.parsley/parsley.js" type="text/javascript"></script>
  </body>
  <?php } ?>
</html>
