<?php
include "../../config/koneksi.php";
include "../../config/fungsi_thumb.php";
error_reporting(0);
    session_start();
    $room_id = $_POST['room_id'];
    $transaction_checkin = $_POST['transaction_checkin'];
    $transaction_checkout = $_POST['transaction_checkout'];


    $date1=date_create($_POST['transaction_checkin']);
    $date2=date_create($_POST['transaction_checkout']);
    $day=date_diff($date1,$date2);
    $day=$day->format("%a");

    if(isset($_SESSION['cart'][$room_id]))
    {
        echo "<script>alert('Kamar sudah terdaftar ke Rincian Booking!');</script>";
        echo "<script>location='../../media.php?module=cart';</script>";
    }
    else
    {      $_SESSION['cart'][$room_id] = array( 
        "room_id" => $room_id, 
        "qty" => $day, 
        "transaction_checkin" => $transaction_checkin, 
        "transaction_checkout" => $transaction_checkout 
    ); 
        echo "<script>alert('Kamar telah ditambah ke Rincian Booking!');</script>";
        echo "<script>location='../../media.php?module=cart';</script>";
    }
?>