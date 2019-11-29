<?php
include "../../config/koneksi.php";

    session_start();

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 8; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    $sql = "INSERT INTO invoice (
            invoice_id,
            guest_username,
            invoice_qty,
            invoice_price,
            invoice_status,
            invoice_pesan,
            invoice_payment)
          VALUES (
            '$randomString',
            '$_POST[guest_username]',
            '$_POST[invoice_qty]',
            '$_POST[invoice_price]',
            'booking',
            '$_POST[invoice_pesan]',
            '$_POST[invoice_payment]')";

    foreach ($_SESSION["cart"] as $cart):
        $result = mysqli_query($connect, "SELECT * FROM room WHERE room_no='$cart[room_id]'");
        $r      = mysqli_fetch_array($result);
        $room_totalprice=$cart['qty']*$r['room_price'];

        $checkin = $cart['transaction_checkin'].' 00:00:00';
        $checkout = $cart['transaction_checkout'].' 00:00:00';
        
        
$date1=date_create($cart['transaction_checkin']);
$date2=date_create($cart['transaction_checkout']);
$day=date_diff($date1,$date2);
$day=$day->format("%a");
        $sql2 = "INSERT INTO transaction (
            invoice_id,
            room_id,
            transaction_qty,
            transaction_price,
            transaction_totalprice,
            transaction_status,
            transaction_checkin,
            transaction_checkout,
            transaction_day)
          VALUES (
            '$randomString',
            '$r[room_no]',
            '$cart[qty]',
            '$r[room_price]',
            '$room_totalprice',
            'booking',
            '$checkin',
            '$checkout',
            '$day')";
        mysqli_query($connect, $sql2);
    endforeach;

  if (mysqli_query($connect, $sql)) {
    unset($_SESSION["cart"]);
    echo "<script>alert('Reservasi berhasil, silahkan Upload Bukti Pembayaran');</script>";
    echo "<script>location='../../media.php?module=invoicebooking';</script>";
  }
?>