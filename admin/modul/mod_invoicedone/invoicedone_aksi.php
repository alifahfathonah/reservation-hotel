<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Checkin
if ($module=='invoicedone' AND $act=='checkin'){

  $now = date('Y-m-d H:i:s');

  $sql = "UPDATE invoice SET
              invoice_checkin  = 'Sudah Checkin - ".$now."'
            WHERE invoice_id = '$_GET[id]'";

if (mysqli_query($connect, $sql)) {
  header('location:../../media.php?module='.$module);
  }
}

// Checkout
if ($module=='invoicedone' AND $act=='checkout'){
  
    $now = date('Y-m-d H:i:s');
  
    $sql = "UPDATE invoice SET
                invoice_checkout  = 'Sudah Checkout - ".$now."'
              WHERE invoice_id = '$_GET[id]'";
  
  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
    }
  }
?>
