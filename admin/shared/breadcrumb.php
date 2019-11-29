<?php

// Bagian Identitas Home
if ($_GET['module']=='home'){
  ?>
  <div class="page-head">
    <h3>Dashboard <small>Control Panel</small></h3>
    <ol class="breadcrumb">
      <li class="active"><i class='fa fa-home'></i> Dashboard</li>
  	</ol>
  </div>
  <?php
}

// Bagian Identitas Website
elseif ($_GET['module']=='website') {
  ?>
  <div class="page-head">
    <h3>Identitas <small>Website</small></h3>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class='fa fa-home'></i> Dashboard</a></li>
      <li class="active">Identitas Website</li>
    </ol>
  </div>
<?php }

// Bagian Profil
elseif ($_GET['module']=='profile') {
  ?>
  <div class="page-head">
    <h3>Akun <small>Saya</small></h3>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class='fa fa-home'></i> Dashboard</a></li>
      <li class="active">Profile</li>
    </ol>
  </div>
<?php }

// Bagian User
elseif ($_GET['module']=='user'){
  ?>
  <div class="page-head">
    <h3>Pengguna</h3>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class='fa fa-home'></i> Dashboard</a></li>
      <li class="active">Pengguna</li>
    </ol>
  </div>
<?php }

// Bagian Guest
elseif ($_GET['module']=='guest'){
  ?>
  <div class="page-head">
    <h3>Guest</h3>
    <ol class="breadcrumb">
      <li><a href="?module=guest"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Guest</li>
    </ol>
  </div>
<?php } 

// Bagian Tipe Kamar
elseif ($_GET['module']=='roomtype'){
  ?>
  <div class="page-head">
    <h3>Tipe Kamar</h3>
    <ol class="breadcrumb">
      <li><a href="?module=roomtype"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Tipe Kamar</li>
    </ol>
  </div>
<?php } 

// Bagian Tipe Kelas
elseif ($_GET['module']=='classtype'){
  ?>
  <div class="page-head">
    <h3>Tipe Kelas</h3>
    <ol class="breadcrumb">
      <li><a href="?module=classtype"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Tipe Kelas</li>
    </ol>
  </div>
<?php } 

// Bagian Fasilitas
elseif ($_GET['module']=='facility'){
  ?>
  <div class="page-head">
    <h3>Fasilitas</h3>
    <ol class="breadcrumb">
      <li><a href="?module=facility"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Fasilitas</li>
    </ol>
  </div>
<?php } 

// Bagian Makanan
elseif ($_GET['module']=='eat'){
  ?>
  <div class="page-head">
    <h3>Makanan</h3>
    <ol class="breadcrumb">
      <li><a href="?module=eat"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Makanan</li>
    </ol>
  </div>
<?php } 

// Bagian Kamar
elseif ($_GET['module']=='room'){
  ?>
  <div class="page-head">
    <h3>Kamar</h3>
    <ol class="breadcrumb">
      <li><a href="?module=room"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Kamar</li>
    </ol>
  </div>
<?php } 

// Bagian Bank
elseif ($_GET['module']=='bank'){
  ?>
  <div class="page-head">
    <h3>Bank</h3>
    <ol class="breadcrumb">
      <li><a href="?module=bank"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Bank</li>
    </ol>
  </div>
<?php }

// Bagian Galeri
elseif ($_GET['module']=='gallery'){
  ?>
  <div class="page-head">
    <h3>Galeri</h3>
    <ol class="breadcrumb">
      <li><a href="?module=gallery"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Galeri</li>
    </ol>
  </div>
<?php }

// Bagian Slide
elseif ($_GET['module']=='slide'){
  ?>
  <div class="page-head">
    <h3>Slide</h3>
    <ol class="breadcrumb">
      <li><a href="?module=slide"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Slide</li>
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

// Bagian Laporan
elseif ($_GET['module']=='laporan'){
  ?>
  <div class="page-head">
    <h3>Laporan</h3>
    <ol class="breadcrumb">
      <li><a href="?module=laporan"><i class='fa fa-users'></i> Dashboard</a></li>
      <li class="active">Laporan</li>
    </ol>
  </div>
<?php }?>