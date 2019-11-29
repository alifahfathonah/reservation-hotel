<div class="cl-sidebar" data-position="right">
    <div class="cl-toggle">
        <i class="fa fa-bars"></i>
    </div>
    <div class="cl-navblock">
        <div class="menu-space">
            <div class="content">
                <div class="side-user">
                    <div class="avatar">
                        <img src="assets/admin/images/avatar1_50.jpg" alt="Avatar" />
                    </div>
                    <div class="info">
                        <a href="#">
                            <?php echo $r2['admin_name'] ?>
                        </a>
                        <img src="assets/admin/images/state_online.png" alt="Status" />
                        <span>Online</span>
                    </div>
                </div>
                <ul class="cl-vnavigation">
                    <?php include "menu.php"; ?>
                </ul>
            </div>
        </div>
        <div class="text-center collapse-button" style="padding:7px 9px;">
            <button id="sidebar-collapse" class="btn btn-default" style="">
                <i class="fa fa-angle-left"></i>
            </button>
        </div>
    </div>
</div>