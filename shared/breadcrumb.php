<?php

// Bagian Identitas Website
if ($_GET['module']=='home'){
  ?>
  <div class="page-head">
    <h3>Beranda </h3>
    <ol class="breadcrumb">
      <li class="active"><i class='fa fa-home'></i> Beranda</li>
  	</ol>
  </div>
<?php }

// Bagian Kamar
if ($_GET['module']=='room'){
  ?>
  <div class="page-head">
    <h3>Cari Kamar </h3>
    <ol class="breadcrumb">
    <li><a href="?module=room"><i class='fa fa-users'></i> Beranda</a></li>
    <li class="active">Cari Kamar</li>
  	</ol>
  </div>
<?php }

// Bagian Bank
if ($_GET['module']=='bank'){
  ?>
  <div class="page-head">
    <h3>Bank </h3>
    <ol class="breadcrumb">
    <li><a href="?module=bank"><i class='fa fa-users'></i> Beranda</a></li>
    <li class="active">Bank</li>
  	</ol>
  </div>
<?php }

// Bagian Contact
if ($_GET['module']=='contact'){
  ?>
  <div class="page-head">
    <h3>Contact Us </h3>
    <ol class="breadcrumb">
    <li><a href="?module=contact"><i class='fa fa-users'></i> Beranda</a></li>
    <li class="active">Contact Us</li>
  	</ol>
  </div>
<?php }

// Bagian Gallery
if ($_GET['module']=='gallery'){
  ?>
  <div class="page-head">
    <h3>Galeri </h3>
    <ol class="breadcrumb">
    <li><a href="?module=gallery"><i class='fa fa-users'></i> Beranda</a></li>
    <li class="active">Galeri</li>
  	</ol>
  </div>
<?php }

// Bagian Rincian Booking
if ($_GET['module']=='cart'){
  ?>
  <div class="page-head">
    <h3>Rincian Booking </h3>
    <ol class="breadcrumb">
    <li><a href="?module=cart"><i class='fa fa-users'></i> Beranda</a></li>
    <li class="active">Rincian Booking</li>
  	</ol>
  </div>
<?php }

// Bagian Cart
if ($_GET['module']=='checkout'){
  ?>
  <div class="page-head">
    <h3>Checkout </h3>
    <ol class="breadcrumb">
    <li><a href="?module=checkout"><i class='fa fa-users'></i> Beranda</a></li>
    <li class="active">Checkout</li>
  	</ol>
  </div>
<?php }

// Bagian Signin
if ($_GET['module']=='signin'){
  ?>
  <div class="page-head">
    <h3>Signin </h3>
    <ol class="breadcrumb">
    <li><a href="?module=signin"><i class='fa fa-users'></i> Beranda</a></li>
    <li class="active">Signin</li>
  	</ol>
  </div>
<?php }

// Bagian Signup
if ($_GET['module']=='signup'){
  ?>
  <div class="page-head">
    <h3>Signup </h3>
    <ol class="breadcrumb">
    <li><a href="?module=signup"><i class='fa fa-users'></i> Beranda</a></li>
    <li class="active">Signup</li>
  	</ol>
  </div>
<?php }

// Bagian Signup
if ($_GET['module']=='profile'){
  ?>
  <div class="page-head">
    <h3>Profile </h3>
    <ol class="breadcrumb">
    <li><a href="?module=profile"><i class='fa fa-users'></i> Beranda</a></li>
    <li class="active">Profile</li>
  	</ol>
  </div>
<?php }

// Bagian Invoice Booking
elseif ($_GET['module']=='invoicebooking'){
  ?>
  <div class="page-head">
    <h3>Transaksi - Booking</h3>
    <ol class="breadcrumb">
      <li><a href="?module=invoicebooking"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Transaksi - Booking</li>
    </ol>
  </div>
<?php }

// Bagian Invoice Done
elseif ($_GET['module']=='invoicedone'){
  ?>
  <div class="page-head">
    <h3>Transaksi - Done</h3>
    <ol class="breadcrumb">
      <li><a href="?module=invoicedone"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Transaksi - Done</li>
    </ol>
  </div>
<?php }

// Bagian Invoice Cancel
elseif ($_GET['module']=='invoicecancel'){
  ?>
  <div class="page-head">
    <h3>Transaksi - Cancel</h3>
    <ol class="breadcrumb">
      <li><a href="?module=invoicecancel"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Transaksi - Cancel</li>
    </ol>
  </div>
<?php }
?>