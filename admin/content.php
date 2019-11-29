<?php
error_reporting(0);
include "../config/library.php";

// Bagian Home
if ($_GET['module']=='home') { ?>
  <?php include "modul/mod_home/home.php"; ?>
<?php }

// Bagian Identitas Website
elseif ($_GET['module']=='website'){ ?>
  <?php include "modul/mod_website/website.php"; ?>
<?php }

// Bagian Identitas Profile
elseif ($_GET['module']=='profile'){ ?>
  <?php include "modul/mod_profile/profile.php"; ?>
<?php }

// Bagian User
elseif ($_GET['module']=='user'){ ?>
  <?php include "modul/mod_user/user.php"; ?>
<?php }

// Bagian Guest
elseif ($_GET['module']=='guest'){ ?>
  <?php include "modul/mod_guest/guest.php"; ?>
<?php }

// Bagian Tipe Kamar
elseif ($_GET['module']=='roomtype'){ ?>
  <?php include "modul/mod_roomtype/roomtype.php"; ?>
<?php }

// Bagian Tipe Kelas
elseif ($_GET['module']=='classtype'){ ?>
  <?php include "modul/mod_classtype/classtype.php"; ?>
<?php }

// Bagian Fasilitas
elseif ($_GET['module']=='facility'){ ?>
  <?php include "modul/mod_facility/facility.php"; ?>
<?php }

// Bagian Makanan
elseif ($_GET['module']=='eat'){ ?>
  <?php include "modul/mod_eat/eat.php"; ?>
<?php }

// Bagian Kamar
elseif ($_GET['module']=='room'){ ?>
  <?php include "modul/mod_room/room.php"; ?>
<?php }

// Bagian Bank
elseif ($_GET['module']=='bank'){ ?>
  <?php include "modul/mod_bank/bank.php"; ?>
<?php }

// Bagian Slide
elseif ($_GET['module']=='slide'){ ?>
  <?php include "modul/mod_slide/slide.php"; ?>
<?php }

// Bagian Galeri
elseif ($_GET['module']=='gallery'){ ?>
  <?php include "modul/mod_gallery/gallery.php"; ?>
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

// Bagian Laporan
elseif ($_GET['module']=='laporan'){ ?>
  <?php include "modul/mod_laporan/laporan.php"; ?>
<?php } ?>


