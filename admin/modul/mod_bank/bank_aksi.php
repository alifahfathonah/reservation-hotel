<?php
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Hapus
if ($module=='bank' AND $act=='hapus'){
  $sql = "DELETE FROM bank
          WHERE bank_id = '$_GET[id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Tambah
elseif ($module=='bank' AND $act=='tambah'){

  $sql = "INSERT INTO bank (
            bank_name,
            bank_owner,
            bank_noaccount)
          VALUES (
            '$_POST[bank_name]',
            '$_POST[bank_owner]',
            '$_POST[bank_noaccount]')";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Ubah
elseif ($module=='bank' AND $act=='edit'){
  $sql = "UPDATE bank SET
            bank_name  = '$_POST[bank_name]',
            bank_owner  = '$_POST[bank_owner]',
            bank_noaccount  = '$_POST[bank_noaccount]'
          WHERE bank_id = '$_POST[bank_id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}
?>
