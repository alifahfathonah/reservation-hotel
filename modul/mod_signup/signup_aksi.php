<?php
include "../../config/koneksi.php";
error_reporting(0);
$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

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
    echo "<script>alert('Akun telah berhasil terdaftar, silahkan coba masuk!');</script>";
    echo "<script>location='../../media.php?module=signin';</script>";
  }
?>
