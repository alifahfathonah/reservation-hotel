<?php
include "../config/koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$login=mysqli_query($connect,"SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION[username]   = $r[admin_username];
  $_SESSION[name]       = $r[admin_name];
  $_SESSION[password]   = $r[admin_password];
  $_SESSION[level]      = $r[admin_level];

	$sid_lama = session_id();

	session_regenerate_id();

	$sid_baru = session_id();

  mysqli_query($connect,"UPDATE admin SET admin_session='$sid_baru' WHERE admin_username='$username'");
  header('location:media.php?module=home');
}
else{
  header('location:login.php');
}
?>
