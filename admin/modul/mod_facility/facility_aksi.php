<?php
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Hapus
if ($module=='facility' AND $act=='hapus'){
  $sql = "DELETE FROM facility
          WHERE facility_id = '$_GET[id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Tambah
elseif ($module=='facility' AND $act=='tambah'){

  $sql = "INSERT INTO facility (
            facility_name)
          VALUES (
            '$_POST[facility_name]')";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Ubah
elseif ($module=='facility' AND $act=='edit'){
  $sql = "UPDATE facility SET
            facility_name  = '$_POST[facility_name]'
          WHERE facility_id = '$_POST[facility_id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}
?>
