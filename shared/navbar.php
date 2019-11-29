<img src="admin/assets/images/header.jpg" style="height:150px; width: 100%;">
<div id="head-nav" class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="fa fa-gear"></span>
            </button>
            <a class="navbar-brand" href="#">
                <span>
                    <?php echo $r['identitas_website'] ?>
                </span>
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <!-- ========== Navbar Left ========== -->
            <ul class="nav navbar-nav left-nav">
                <?php include "menu.php"; ?>
            </ul>
            <!-- ========== Navbar Right ========== -->
            <ul class="nav navbar-nav navbar-right user-nav">
                <li class="dropdown profile_menu">
                    <?php 
if (!empty($_SESSION['guest_username']) AND !empty($_SESSION['guest_password'])){ ?>
                    <!-- dropdown -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img alt="Avatar" src="admin/assets/admin/images/avatar2.jpg" />
                        <span>
                            <?php echo $_SESSION['guest_name'] ?>
                        </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="?module=profile">Profile</a>
                        </li>
                        <li>
                            <a href="?module=invoicebooking">Lihat Histori Pemesanan</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="modul/mod_signin/logout.php">Logout</a>
                        </li>
                    </ul>
                    <?php } else { ?>
                    <?php if ($_GET['module']=='signin'){ ?>
                    <li class="active">
                        <?php } else { ?>
                        <li>
                            <?php } ?>
                            <a href="?module=signin">Masuk</a>
                        </li>
                        <?php if ($_GET['module']=='signup'){ ?>
                        <li class="active">
                            <?php } else { ?>
                            <li>
                                <?php } ?>
                                <a href="?module=signup">Daftar</a>
                            </li>
                            <?php } ?>
                        </li>
            </ul>
            <ul class="nav navbar-nav navbar-right not-nav"></ul>
        </div>
    </div>
</div>