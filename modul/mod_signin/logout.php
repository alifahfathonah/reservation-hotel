<?php
    session_start();
    unset($_SESSION["guest_username"]);
    unset($_SESSION["guest_name"]);
    unset($_SESSION["guest_password"]);

    header('location: ../../media.php?module=home');
  ?>