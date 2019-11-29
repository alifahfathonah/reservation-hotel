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


<?php
include "../../config/koneksi.php";

$username = $_POST['guest_username'];
$password = md5($_POST['guest_password']);

$login=mysqli_query($connect,"SELECT * FROM guest WHERE guest_username='$username' AND guest_password='$password'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION[guest_username]   = $r[guest_username];
  $_SESSION[guest_name]       = $r[guest_name];
  $_SESSION[guest_password]   = $r[guest_password];

	$sid_lama = session_id();

	session_regenerate_id();

	$sid_baru = session_id();

  mysqli_query($connect,"UPDATE guest SET guest_session='$sid_baru' WHERE guest_username='$username'");
  echo "<script>alert('Anda berhasil masuk!');</script>";
  echo "<script>location='../../media.php?module=home';</script>";
}
else{
  
  echo "<script>alert('Username atau Password salah!');</script>";
  echo "<script>location='../../media.php?module=signin';</script>";
}
?>
