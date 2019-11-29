<?php
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Ubah
if ($module=='profile' AND $act=='edit'){
  $sql = "UPDATE admin SET
            admin_name  = '$_POST[admin_name]'
          WHERE admin_username = '$_POST[admin_username]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

elseif ($module=='profile' AND $act=='editpwd'){
  $sql = "UPDATE admin SET
            admin_password  = md5('$_POST[admin_password]')
          WHERE admin_username = '$_POST[admin_username]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}
?>
