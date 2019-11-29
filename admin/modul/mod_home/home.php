 <?php 
 $result=mysqli_query($connect,"SELECT * FROM identitas WHERE identitas_id=1"); while ($r=mysqli_fetch_array($result)) { ?>
<div class="cl-mcont">
    <div class='row'>
        <div class="col-md-12">
            <div class="block-flat">
                <div class="header">
                    <h4>Selamat datang di Halaman Administrator
                        <?php echo $r['identitas_website'] ?>
                    </h4>
                </div>
                <div class="content">
                    <div class='blockquote'>
                        <div class='text-orange'>
                            <h5>Hallo,
                                <?php echo $_SESSION['name'] ?>
                            </h5>
                        </div>
                        <p>Sistem informasi ini untuk administrator atau operator menjalankan data yang akan dibuat</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="dash-cols">
                    <div class="col-sm-6 col-md-6">
                        <div class="widget-block white-box calendar-box">
                            <div class="col-md-6 blue-box calendar no-padding">
                                <div class="padding ui-datepicker"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="padding">
                                    <h2 class="text-center">
                                        <?php echo $hari_ini;?>
                                    </h2>
                                    <h2 class="day">
                                        <?php echo $thn_sekarang;?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="widget-block photo white-box weather-box">
                            <div class="col-md-6 padding photo">
                                <h2 class="text-center">
                                    <?php echo $hari_ini;?>
                                </h2>
                                <h1 class="day">
                                    <?php echo $date;?>
                                </h1>
                            </div>
                            <div class="col-md-6 blue-box">
                                <div class="padding text-center">
                                    <canvas id="sun-icon" width="130" height="215"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.dash-col -->
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="assets/admin/js/jquery.easypiechart/jquery.easy-pie-chart.css" />
<link rel="stylesheet" type="text/css" href="assets/admin/js/bootstrap.switch/bootstrap-switch.css" />
<link rel="stylesheet" type="text/css" href="assets/admin/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css"
/>
<link rel="stylesheet" type="text/css" href="assets/admin/js/jquery.select2/select2.css" />
<link rel="stylesheet" type="text/css" href="assets/admin/js/bootstrap.slider/css/slider.css" />

<script type="text/javascript" src="assets/admin/js/jquery.sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="assets/admin/js/jquery.easypiechart/jquery.easy-pie-chart.js"></script>
<script type="text/javascript" src="assets/admin/js/jquery.nestable/jquery.nestable.js"></script>
<script type="text/javascript" src="assets/admin/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="assets/admin/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/admin/js/jquery.select2/select2.min.js" type="text/javascript"></script>
<script src="assets/admin/js/skycons/skycons.js" type="text/javascript"></script>
<script src="assets/admin/js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
<script src="assets/admin/js/intro.js/intro.js" type="text/javascript"></script>
<link rel="stylesheet" href="assets/admin/css/calendar.css" />
 <?php } ?>