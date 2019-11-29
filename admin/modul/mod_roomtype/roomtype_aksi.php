<?php
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Hapus
if ($module=='roomtype' AND $act=='hapus'){
  $sql = "DELETE FROM roomtype
          WHERE roomtype_id = '$_GET[id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Tambah
elseif ($module=='roomtype' AND $act=='tambah'){

  $sql = "INSERT INTO roomtype (
            roomtype_name)
          VALUES (
            '$_POST[roomtype_name]')";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Ubah
elseif ($module=='roomtype' AND $act=='edit'){
  $sql = "UPDATE roomtype SET
            roomtype_name  = '$_POST[roomtype_name]'
          WHERE roomtype_id = '$_POST[roomtype_id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}
?>
