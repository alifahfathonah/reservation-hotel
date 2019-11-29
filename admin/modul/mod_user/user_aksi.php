<?php
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Hapus
if ($module=='user' AND $act=='hapus'){
  $sql = "DELETE FROM admin
          WHERE admin_username = '$_GET[id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Tambah
elseif ($module=='user' AND $act=='tambah'){

  $password = md5($_POST['admin_password']);

  $sql = "INSERT INTO admin (
            admin_username,
            admin_password,
            admin_name,
            admin_level,
            admin_session )
          VALUES (
            '$_POST[admin_username]',
            '$password',
            '$_POST[admin_name]',
            '$_POST[admin_level]',
            '')";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Ubah
elseif ($module=='user' AND $act=='edit'){
  $sql = "UPDATE admin SET
            admin_name  = '$_POST[admin_name]',
            admin_level = '$_POST[admin_level]'
          WHERE admin_username = '$_POST[admin_username]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}
?>
