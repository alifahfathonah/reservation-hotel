<?php
include "../../config/koneksi.php";
include "../../config/fungsi_thumb.php";
    session_start();
    $menu_id=$_GET["id"];
    unset($_SESSION["cart"][$menu_id]);

    echo "<script>alert('Kamar telah dihapus ke Rincian Booking!');</script>";
    echo "<script>location='../../media.php?module=cart';</script>";
?>