<?php

include "config/fungsi_indotgl.php";
include "config/fungsi_rupiah.php";
include "config/class_paging.php";

$aksi="modul/mod_bank/bank_aksi.php";

$date = date("Y-m-d");
$checkin = $date;

if (!empty($_SESSION['guest_username']) AND !empty($_SESSION['guest_password'])){ ?>

    <!-- Content -->
    <div class="cl-mcont" style="min-height: 400px;">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="block-flat">
                    <div class="content">
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
                                        $totalItem = 0;
                                        foreach ($_SESSION["cart"] as $cart):
                                        $result = mysqli_query($connect, "SELECT * FROM room WHERE room_no='$cart[room_id]'");
                                        $room      = mysqli_fetch_array($result);

                                        $tanggal=tgl_indo($room['room_created']);
                                        $room_price=format_rupiah($room['room_price']);
                                        $room_totalprice=$cart['qty']*$room['room_price'];
                                        $room_totalitem=$cart['qty'];
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
                                        <?php $no++;  ?>
                                        <?php $total += $room_totalprice  ?>
                                            <?php $totalItem += $room_totalitem  ?>
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
                <?php 
                
                if(!empty($_SESSION["cart"]) OR isset($_SESSION["cart"])) { ?>
                <div class="block-flat" style="text-align: center">
                    <div class="header">
                        <h4>Konfirmasi Reservasi (Bayar dalam waktu 1x24 Jam)
                            <br>Pesanan otomatis di cancel jika melebihi batas waktu</h4>
                            <form action="modul/mod_checkout/aksi_checkout.php" method="post" enctype="multipart/form-data" id="exampleStandardForm">
                      
                            <input type="hidden" name="guest_username" value="<?php echo $_SESSION['guest_username'] ?>" />
                            <input type="hidden" name="invoice_price" value="<?php echo $total ?>" />
                            <input type="hidden" name="invoice_qty" value="<?php echo $totalItem ?>" />
                            <select  required class="form-control"  name="invoice_payment">
                            <!--<option value="">-- Jenis Pembayaran --</option>-->
                            <option value="Booking">Booking</option>
                            <!--<option value="Full Pembayaran">Full Pembayaran</option>-->
                            </select>   
                            <textarea style="margin-top: 10px;" placeholder="Masukan pesan" required class="form-control" name="invoice_pesan"></textarea>                     <input style="margin-top: 10px" type="submit" class="btn btn-success" value="Konfirmasi">
                    
                        </form>
                    </div>
                </div>
                <?php } else { ?>
                    <div class="block-flat" style="text-align: center">
                    <div class="header">
                        <h4>Keranjang belanja anda kosong</h4>
                        <a  href="?module=room" class="btn btn-success">Cari Kamar</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } else { ?>

    <div class="cl-mcont" style="min-height: 400px;">
        <div class="row" <div class="block-flat" style="text-align: center">
            <div class="header">
                <h4>Silahkan Masuk terlebih dahulu sebelum Checkout Reservasi Anda</h4>

                <a class="btn btn-success" href="?module=signin">
                    Masuk
                </a>
            </div>
        </div>
        </div>

        <?php } ?>