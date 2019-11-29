<?php
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Hapus
if ($module=='classtype' AND $act=='hapus'){
  $sql = "DELETE FROM classtype
          WHERE classtype_id = '$_GET[id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Tambah
elseif ($module=='classtype' AND $act=='tambah'){

  $sql = "INSERT INTO classtype (
            classtype_name)
          VALUES (
            '$_POST[classtype_name]')";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Ubah
elseif ($module=='classtype' AND $act=='edit'){
  $sql = "UPDATE classtype SET
            classtype_name  = '$_POST[classtype_name]'
          WHERE classtype_id = '$_POST[classtype_id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}
?>
