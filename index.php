<?php
  session_start();
  error_reporting(0);

  include "config/koneksi.php";

  include "config/fungsi_indotgl.php";
  include "config/fungsi_combobox.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_badword.php";
  include "config/fungsi_rupiah.php";
  include "config/fungsi_kalender.php";
  include "config/fungsi_thumb.php";

  include "config/class_paging.php";

  include "config/library.php";
  include "config/option.php";

  header("location: media.php?module=home");
?>
