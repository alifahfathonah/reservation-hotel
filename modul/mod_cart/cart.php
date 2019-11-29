<?php

include "config/fungsi_indotgl.php";
include "config/fungsi_rupiah.php";
include "config/class_paging.php";

$aksi="modul/mod_bank/bank_aksi.php";

$date = date("Y-m-d");
$checkin = $date;
?>
    <!-- Content -->
    <div class="cl-mcont" style="min-height: 400px;">
        <div class="row">
      <div class="col-sm-12 col-md-12">
            <div class="block-flat">
                <div class="content">
                    <!-- ========== Button ========== -->
                    <div class='btn-navigation'>
                        <div class='pull-right'>
                            <?php 
                                    if(!empty($_SESSION["cart"]) OR isset($_SESSION["cart"])) {
                            ?>
                            <div class="navigation-btn">
                                <div class='text-right margin-bottom' style="padding-bottom: 20px;">
                                    <a class="btn btn-danger" href="modul/mod_cart/deleteall.php">
                                        Hapus Semua
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="table-responsive">
                    <table class="hover">
                      <thead class="primary-emphasis">
                                <th width=50>No</th>
                                <th width=400>Kamar</th>
                                <th>Harga</th>
                                <th width=100>Lama Hari</th>
                                <th>Total Harga</th>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th class="text-center">Aksi</th>
                            </thead>
                            <tbody>
                                <?php 
                                    if(empty($_SESSION["cart"]) OR !isset($_SESSION["cart"])) {
                            ?>
                                <tr>
                                    <td class="text-center" colspan="10">Data kosong...</td>
                                </tr>
                                <?php } else {
                                        $no = 1;
                                        $total = 0;
                                        foreach ($_SESSION["cart"] as $cart):
                                        $result = mysqli_query($connect, "SELECT * FROM room WHERE room_no='$cart[room_id]'");
                                        $room      = mysqli_fetch_array($result);

                                        $tanggal=tgl_indo($room['room_created']);
                                        $room_price=format_rupiah($room['room_price']);
                                        $room_totalprice=$cart['qty']*$room['room_price'];
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo $no;?>
                                        </td>
                                        <td>
                                            No <?php echo $room['room_no'];?>
                                        </td>
                                        <td>
                                            Rp
                                            <?php echo $room_price;?>
                                        </td>
                                        <td>
                                           
                                        <?php echo $cart['qty'];?> Hari
                                        </td>
                                        <td>
                                            Rp
                                            <?php echo $room_totalprice;?>
                                        </td>
                                        <td>
                                        <?php echo $cart['transaction_checkin']; ?>
                                        </td>
                                        <td>
                                        <?php echo $cart['transaction_checkout']; ?>
                                        </td>
                                        <td class="text-center action">
                                            <a class="btn-detail btn btn-danger" href="modul/mod_cart/delete.php?id=<?php echo $room['room_no'];?>">
                                            Hapus
                                            </a>
                                        </td>
                                        <?php $no++;  ?>
                                        <?php $total += $room_totalprice  ?>
                                        <?php endforeach ?>
                                    </tr>
                                    <?php } 
                                     
                                            ?>
                            </tbody>
                            <?php 
                                    if(!empty($_SESSION["cart"]) OR isset($_SESSION["cart"])) {
                            ?>
                            <tbody>
                                <tr>
                                    <td colspan="4">Total Harga</td>
                                    <td colspan="4">Rp
                                        <?php echo format_rupiah($total) ?>
                                    </td>
                                </tr>
                                    <tr>
                                        <td colspan="4">Total Harga Booking</td>
                                        <td colspan="4">Rp
                                            <?php echo format_rupiah($total * (20/100)) ?>
                                        </td>
                                    </tr>
                            </tbody>
                            <?php  } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>