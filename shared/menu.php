<?php if ($_GET['module']=='home'){ ?>
<li class="active">
<?php } else { ?>
<li>
<?php } ?>
  <a href="?module=home"><i class="fa fa-home"></i> <span>Beranda</span></a>
</li>
<?php if ($_GET['module']=='room'){ ?>
<li class="active">
<?php } else { ?>
<li>
<?php } ?>
  <a href="?module=room"><i class="fa fa-building"></i> <span>Cari Kamar</span></a>
</li>

<?php if ($_GET['module']=='gallery'){ ?>
<li class="active">
<?php } else { ?>
<li>
<?php } ?>
  <a href="?module=gallery"><i class="fa fa-image"></i> <span>Photo</span></a>
</li>


    <?php if ($_GET['module']=='bank'){ ?>
<li class="active">
<?php } else { ?>
<li>
<?php } ?>
  <a href="?module=bank"><i class="fa fa-money"></i> <span>Pembayaran</span></a>
</li>

<?php if ($_GET['module']=='cart'){ ?>
<li class="active">
<?php } else { ?>
<li>
<?php } ?>
  <a href="?module=cart"><i class="fa fa-shopping-cart"></i> <span>Rincian Booking</span></a>
</li>


<?php if ($_GET['module']=='checkout'){ ?>
<li class="active">
<?php } else { ?>
<li>
<?php } ?>
  <a href="?module=checkout"><i class="fa fa-money"></i> <span>Checkout</span></a>
</li>

<?php if ($_GET['module']=='contact'){ ?>
<li class="active">
<?php } else { ?>
<li>
<?php } ?>
  <a href="?module=contact"><span>Contact Us</span></a>
</li>
