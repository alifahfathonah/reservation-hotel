<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="fa fa-gear"></span>
            </button>
            <a class="navbar-brand" href="#">
                <span><?php echo $r['identitas_website'] ?></span>
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <!-- ========== Navbar Left ========== -->
            <ul class="nav navbar-nav left-nav">
                <li class="active">
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
            </ul>
            <!-- ========== Navbar Right ========== -->
            <ul class="nav navbar-nav navbar-right user-nav">
                <li class="dropdown profile_menu">
                    <!-- dropdown -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img alt="Avatar" src="assets/admin/images/avatar2.jpg" />
                        <span>
                            <?php echo $r2['admin_name'] ?>
                        </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="?module=home">Beranda</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right not-nav"></ul>
        </div>
    </div>
</div>