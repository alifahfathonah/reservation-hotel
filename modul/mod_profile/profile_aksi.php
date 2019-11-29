<?php
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Ubah
if ($module=='profile' AND $act=='edit'){
  $sql = "UPDATE guest SET
            guest_name  = '$_POST[guest_name]',
            guest_address = '$_POST[guest_address]',
            guest_notelp = '$_POST[guest_notelp]',
            guest_gender = '$_POST[guest_gender]',
            guest_age = '$_POST[guest_age]'
          WHERE guest_username = '$_POST[guest_username]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

elseif ($module=='profile' AND $act=='editpwd'){
  $sql = "UPDATE guest SET
            guest_password  = md5('$_POST[guest_password]')
          WHERE guest_username = '$_POST[guest_username]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}
?>
