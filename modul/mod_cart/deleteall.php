<?php
    session_start();
    unset($_SESSION["cart"]);

    echo "<script>alert('Rincian Booking telah kosong!');</script>";
    echo "<script>location='../../media.php?module=cart';</script>";
?>