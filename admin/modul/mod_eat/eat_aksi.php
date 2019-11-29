<?php
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Hapus
if ($module=='eat' AND $act=='hapus'){
  $sql = "DELETE FROM eat
          WHERE eat_id = '$_GET[id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Tambah
elseif ($module=='eat' AND $act=='tambah'){

  $sql = "INSERT INTO eat (
            eat_name)
          VALUES (
            '$_POST[eat_name]')";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Ubah
elseif ($module=='eat' AND $act=='edit'){
  $sql = "UPDATE eat SET
            eat_name  = '$_POST[eat_name]'
          WHERE eat_id = '$_POST[eat_id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}
?>
