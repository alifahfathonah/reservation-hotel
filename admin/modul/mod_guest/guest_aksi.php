<?php
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Hapus
if ($module=='guest' AND $act=='hapus'){
  $sql = "DELETE FROM guest
          WHERE guest_username = '$_GET[id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Tambah
elseif ($module=='guest' AND $act=='tambah'){

  $password = md5($_POST['guest_password']);

  $sql = "INSERT INTO guest (
            guest_username,
            guest_password,
            guest_name,
            guest_address,
            guest_notelp,
            guest_gender,
            guest_age)
          VALUES (
            '$_POST[guest_username]',
            '$password',
            '$_POST[guest_name]',
            '$_POST[guest_address]',
            '$_POST[guest_notelp]',
            '$_POST[guest_gender]',
            '$_POST[guest_age]')";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Ubah
elseif ($module=='guest' AND $act=='edit'){
  if ($_POST['guest_password']) {
    $password = md5($_POST['guest_password']);
  $sql = "UPDATE guest SET
            guest_name  = '$_POST[guest_name]',
            guest_password = '$password',
            guest_address = '$_POST[guest_address]',
            guest_notelp = '$_POST[guest_notelp]',
            guest_gender = '$_POST[guest_gender]',
            guest_age = '$_POST[guest_age]'
          WHERE guest_username = '$_POST[guest_username]'";
          } else {
            $sql = "UPDATE guest SET
            guest_name  = '$_POST[guest_name]',
            guest_address = '$_POST[guest_address]',
            guest_notelp = '$_POST[guest_notelp]',
            guest_gender = '$_POST[guest_gender]',
            guest_age = '$_POST[guest_age]'
          WHERE guest_username = '$_POST[guest_username]'";
          }

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}
?>
