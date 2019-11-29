<?php

include "config/fungsi_indotgl.php";
include "config/fungsi_rupiah.php";
include "config/class_paging.php";

$aksi="modul/mod_room/room_aksi.php";

$date = date("Y-m-d");
$checkin = $date;

switch($_GET['act']) {
    // Form Edit
    default:
  ?>
    <!-- Content -->
    <div class="cl-mcont">
        <div class="row">
            <div class="content">
                <?php
                    $p      = new Paging;
                    $batas  = 8;
                    $posisi = $p->cariPosisi($batas);

                    $results=mysqli_query($connect,"SELECT * FROM room LIMIT $posisi,$batas");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM room"));
                    if(mysqli_num_rows($results) === 0) {
                    ?>

                    <?php } else {
                    $no = $posisi+1;
                    while ($room=mysqli_fetch_array($results)) {
                    ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="block-flat">
                        <div class="img">
                            <a href="admin/assets/images/room/<?php echo $room['room_photo'] ?>" target="_blank">
                                <img src="admin/assets/images/room/<?php echo $room['room_photo'] ?>">
                            </a>
                            </div>
                            <div style="margin-top: 10px"><b>
                            No Kamar:
                            <?php echo $room['room_no'] ?></b></div>
                           Untuk
                            <?php echo $room['room_people'] ?> Orang
                            <br> Price: Rp
                            <?php echo format_rupiah($room['room_price']) ?>,00 <br>
                            <?php 
                                                    $roomtypes = mysqli_query($connect, "SELECT * FROM roomtype WHERE roomtype_id='$room[roomtype_id]'");
                                                    $roomtype      = mysqli_fetch_array($roomtypes);
                                                    ?> Tipe Kamar:
                            <?php echo $roomtype['roomtype_name']; ?>
                            <br>
                            <?php 
                                                    $classtypes = mysqli_query($connect, "SELECT * FROM classtype WHERE classtype_id='$room[classtype_id]'");
                                                    $classtype      = mysqli_fetch_array($classtypes);
                                                    ?> Tipe Kelas:
                            <?php echo $classtype['classtype_name']; ?>
                            <div style="margin-top: 10px;">
  <a class="btn btn-success btn-block" href="?module=room&act=detail&id=<?php echo $room['room_no'] ?>"><i class="fa fa-eye"></i> <span>Booking</span></a>
                        </div>
                        </div>
                    </div>
                    <?php $no++;
                    ?>
                    <?php }
                      $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM room"));
                      $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                      $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                    }?>

                    <div class="col-md-12">
                        <div class="block-flat">
                            <div id='pagination' style="margin-top: -15px;">
                                <div class='pagination-left'>Total :
                                    <?php echo $jmldata ?>
                                </div>
                                <div class='pagination-right'>
                                    <ul class="pagination">
                                        <?php echo $linkHalaman ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- ========== End Table ========== -->
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
    <?php break;
    
  case "add": ?>


  <?php
  break;
  case "detail":
  $results =mysqli_query($connect,"SELECT * FROM room WHERE room_no='$_GET[id]'");
  $room      = mysqli_fetch_array($results);
  ?>
  

    <div class="cl-mcont">
        <div class="row">
            <div class="content">
                    <div class="col-sm-6 col-md-6">
                    <div class="img">
                            <a href="admin/assets/images/room/<?php echo $room['room_photo'] ?>" target="_blank">
                                <img src="admin/assets/images/room/<?php echo $room['room_photo'] ?>">
                            </a>
                            </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="block-flat">
                            <div style="margin: 10px 0px 20px 0px; font-size: 24px;"><b>
                            No Kamar:
                            <?php echo $room['room_no'] ?></b></div>
                           Untuk
                            <?php echo $room['room_people'] ?> Orang
                            <div style="font-size: 18px; color: green; margin: 10px 0px;"> Harga/Hari: Rp
                            <?php echo format_rupiah($room['room_price']) ?>,00 </div>
                            <div style="font-size: 18px; color: green; margin: 10px 0px;"> Harga Booking: Rp
                            <?php echo format_rupiah($room['room_price']* (20/100)) ?>,00 </div>
                            <?php 
                                                    $roomtypes = mysqli_query($connect, "SELECT * FROM roomtype WHERE roomtype_id='$room[roomtype_id]'");
                                                    $roomtype      = mysqli_fetch_array($roomtypes);
                                                    ?> Tipe Kamar:
                            <?php echo $roomtype['roomtype_name']; ?>
                            <br>
                            <?php 
                                                    $classtypes = mysqli_query($connect, "SELECT * FROM classtype WHERE classtype_id='$room[classtype_id]'");
                                                    $classtype      = mysqli_fetch_array($classtypes);
                                                    ?> Tipe Kelas:
                            <?php echo $classtype['classtype_name']; ?>

<div style="margin: 10px 0px">
                          Fasilitas:<br>  <?php 
$multiple_names = $room['facility_id'];  
$multiple_names_array = explode(',',$multiple_names);

foreach($multiple_names_array as $resultfacility)
{
  $facilitys = mysqli_query($connect, "SELECT * FROM facility WHERE facility_id='$resultfacility'");
  $facility      = mysqli_fetch_array($facilitys);
  echo "- ".$facility['facility_name']."<br>"; 
}
?>
</div>
<div style="margin: 10px 0px">
Makanan:<br>
<?php 
$multiple_names = $room['eat_id'];  
$multiple_names_array = explode(',',$multiple_names);

foreach($multiple_names_array as $resulteat)
{
  $eats = mysqli_query($connect, "SELECT * FROM eat WHERE eat_id='$resulteat'");
  $eat      = mysqli_fetch_array($eats);
  echo "- ".$eat['eat_name']."<br>"; 
}
?>
</div>
<form action="modul/mod_cart/add.php" method="post" enctype="multipart/form-data" id="exampleStandardForm" autocomplete="off">
<input type="hidden" class="form-control input-sm" id="room_id" name="room_id" value="<?php echo $room['room_no'] ?>" />
Checkin:
<input name="transaction_checkin" onkeydown="return false" required class="form-control input-sm" id="transaction_checkin" placeholder="Masukan Tanggal Checkin"/>
<div style="margin-top: 10px;"></div>
Checkout:
<input name="transaction_checkout" onkeydown="return false" required class="form-control input-sm" id="transaction_checkout" placeholder="Masukan Tanggal Checkout"/>
<div style="margin-top: 10px;">
  <input type="submit" value="Booking Kamar" class="btn btn-success btn-block" href="?module=room&act=add">
                        </div>
</form>

                          
                        </div>
                    </div>
                    <?php 
                    ?>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <?php
    break; }
    ?>


    <style>
.img img {
width: 100%;
}

</style>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">

var array = [];
<?php 

$results=mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status='booking' OR transaction_status='done'");
if(mysqli_num_rows($results) > 0) {
while ($transaction=mysqli_fetch_array($results)) { 

    if ($transaction['room_id'] == $_GET['id']) {
        
			$tanggal = (substr($transaction['transaction_checkin'],8,2));
			$bulan = substr($transaction['transaction_checkin'],5,2);
            $tahun = substr($transaction['transaction_checkin'],0,4);
            ?>
            var tanggal = <?php echo $tanggal; ?>-1;
            var bulan = <?php echo $bulan; ?>;
            var tahun = <?php echo $tahun; ?>;
            for(i = 1;i <= <?php echo $transaction['transaction_day']; ?>; i++) {
                tanggal += 1;
                
                countDay = new Date(2018, 7, 0).getDate();
                if (tanggal > countDay) {
                    tanggal = 1;
                    bulan = bulan+1;
                }
    var checkin = tanggal + '-' + bulan + '-' + <?php echo $tahun; ?>;
    array.push(checkin);
    i++;
}
    <?php } ?>
    if (array.length > 0) {
    var unavailableDates = array;
} else {
var unavailableDates = ["01-01-2001"];
}
<?php }
} else {?>
var unavailableDates = ["01-01-2001"];
<?php } ?>
    function unavailable(date) {
        dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
        if ($.inArray(dmy, unavailableDates) == -1) {
            return [true, ""];
        } else {
            return [false, "", "Unavailable"];
        }
    }

    $(function() {
        $("#transaction_checkout").datepicker({
            dateFormat: 'yy-mm-dd',
            beforeShowDay: unavailable,
            minDate: 0
        });

    });
    $(function() {
        $("#transaction_checkin").datepicker({
            dateFormat: 'yy-mm-dd',
            beforeShowDay: unavailable,
            minDate: 0
        });

    });
</script>