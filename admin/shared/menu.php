<?php if ($_GET['module']=='home'){ ?>
<li class="active">
<?php } else { ?>
<li>
<?php } ?>
  <a href="?module=home"><i class="fa fa-home"></i> <span>Beranda</span></a>
</li>
<?php if ($_SESSION['level']=='admin') { ?>

<?php if ($_GET['module']=='website'){ ?>
<li class="active">
<?php } else { ?>
<li>
<?php } ?>
  <a href="?module=website&act=edit&id=1"><i class="fa fa-globe"></i> <span>Identitas Website</span></a>
</li>

<li>
  <a href=""><i class="fa fa-users"></i> <span>Modul Pengguna</span></a>
  <ul class="sub-menu">

    <?php if ($_GET['module']=='profile'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=profile">Akun Saya</a></li>

    <?php if ($_GET['module']=='user'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=user">Staff</a></li>

    <?php if ($_GET['module']=='guest'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=guest">Tamu</a></li>

  </ul>
</li>
<li>
  <a href=""><i class="fa fa-building"></i> <span>Modul Hotel</span></a>
  <ul class="sub-menu">

    <?php if ($_GET['module']=='roomtype'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=roomtype">Tipe Kamar</a></li>

    <?php if ($_GET['module']=='classtype'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=classtype">Tipe Kelas</a></li>

    <?php if ($_GET['module']=='facility'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=facility">Fasilitas</a></li>

    <?php if ($_GET['module']=='eat'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=eat">Makanan</a></li>

    <?php if ($_GET['module']=='room'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=room">Kamar</a></li>

  </ul>
</li>

    <?php } ?>

    <?php if ($_GET['module']=='bank'){ ?>
<li class="active">
<?php } else { ?>
<li>
<?php } ?>
  <a href="?module=bank"><i class="fa fa-money"></i> <span>Bank</span></a>
</li>

<li>
  <a href=""><i class="fa fa-image"></i> <span>Modul Albums</span></a>
  <ul class="sub-menu">
    <?php if ($_GET['module']=='slide'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=slide">Slide</a></li>

    <?php if ($_GET['module']=='gallery'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=gallery">Galeri</a></li>
  </ul>
</li>

<li>
  <a href=""><i class="fa fa-file"></i> <span>Modul Transaksi</span></a>
  <ul class="sub-menu">
    <?php if ($_GET['module']=='invoicebooking'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=invoicebooking">Booking</a></li>

    <?php if ($_GET['module']=='invoicedone'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=invoicedone">Selesai</a></li>

    <?php if ($_GET['module']=='invoicecancel'){ ?>
    <li class="active">
    <?php } else { ?>
    <li>
    <?php } ?>
    <a href="?module=invoicecancel">Cancel</a></li>
  </ul>
</li>

<?php if ($_GET['module']=='laporan'){ ?>
<li class="active">
<?php } else { ?>
<li>
<?php } ?>
  <a href="?module=laporan"><i class="fa fa-file-o"></i> <span>Laporan Penjualan</span></a>
</li>