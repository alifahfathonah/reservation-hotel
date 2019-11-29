<?php
error_reporting(0);
include "config/library.php";

// Bagian Home
if ($_GET['module']=='home') { ?>
  <?php include "modul/mod_home/home.php"; ?>
<?php }

// Bagian Kamar
if ($_GET['module']=='room') { ?>
  <?php include "modul/mod_room/room.php"; ?>
<?php } 

// Bagian Gallery
if ($_GET['module']=='gallery') { ?>
  <?php include "modul/mod_gallery/gallery.php"; ?>
<?php }

// Bagian Contact Us
if ($_GET['module']=='contact') { ?>
  <?php include "modul/mod_contact/contact.php"; ?>
<?php }

// Bagian Bank
if ($_GET['module']=='bank') { ?>
  <?php include "modul/mod_bank/bank.php"; ?>
<?php }

// Bagian Cart
if ($_GET['module']=='cart') { ?>
  <?php include "modul/mod_cart/cart.php"; ?>
<?php } 

// Bagian Checkout
if ($_GET['module']=='checkout') { ?>
  <?php include "modul/mod_checkout/checkout.php"; ?>
<?php } 

// Bagian Signin
if ($_GET['module']=='signin') { ?>
  <?php include "modul/mod_signin/signin.php"; ?>
<?php } 

// Bagian Signup
if ($_GET['module']=='signup') { ?>
  <?php include "modul/mod_signup/signup.php"; ?>
<?php } 

// Bagian Profile
if ($_GET['module']=='profile') { ?>
  <?php include "modul/mod_profile/profile.php"; ?>
<?php } 


// Bagian Invoice Booking
elseif ($_GET['module']=='invoicebooking'){ ?>
  <?php include "modul/mod_invoicebooking/invoicebooking.php"; ?>
<?php }

// Bagian Invoice Done
elseif ($_GET['module']=='invoicedone'){ ?>
  <?php include "modul/mod_invoicedone/invoicedone.php"; ?>
<?php }

// Bagian Invoice Cancel
elseif ($_GET['module']=='invoicecancel'){ ?>
  <?php include "modul/mod_invoicecancel/invoicecancel.php"; ?>
<?php }
?>


