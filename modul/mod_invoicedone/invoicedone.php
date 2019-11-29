<?php

include "config/fungsi_indotgl.php";
include "config/fungsi_rupiah.php";
include "config/class_paging.php";

$aksi="modul/mod_invoicedone/invoicedone_aksi.php";
if (empty($_SESSION['guest_username']) AND empty($_SESSION['guest_password'])){
  echo "<script>location='media.php?module=home';</script>";
} else { 
switch($_GET['act']) {
  // Tampil
  default:
  ?>
  <!-- Content -->
  <div class="cl-mcont">
    <div class="row">
    <div class="col-sm-12 col-md-3">

    <div class="block-flat">
    <ul class="list">
                        <li class="list-item ">
                            <a href="?module=invoicebooking" class="animsition-link">
                               Pemesanan - Booking
                            </a>
                        </li>
                        <li class="list-item active">
                            <a href="?module=invoicedone" class="animsition-link">
                                Pemesanan - Selesai
                            </a>
                        </li>
                        <li class="list-item">
                            <a href="?module=invoicecancel" class="animsition-link">
                                Pemesanan - Cancel
                            </a>
                        </li>
                    </ul>
                    </div>
    </div>
    <div class="col-sm-12 col-md-9">
        <div class="block-flat">
          <div class="content">
            <!-- ========== Button ========== -->
            <form method="get" action='<?php echo '?module=invoicedone&'.$_SERVER['PHP_SELF'] ?>'>
              <div class='btn-navigation'>
                <div class='pull-right'>
                  <a class="btn btn-primary" href="?module=invoicedone"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
                </div>
              </div>
              <div class='row'>
                <div class='btn-search'>Cari Berdasarkan Order ID :</div>
                  <div class='col-md-3 col-sm-12'>
                    <div class="input-group">
                      <input type=hidden name=module value=invoicedone>
                      <input type="text" name="kata" class="form-control" value=""/>
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary" type="button">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                  <div class='col-md-3 col-sm-12'>

                  </div>
                </div>
              </form>
              <!-- ========== End Button ========== -->
              <!-- ========== Table ========== -->
              <div class="table-responsive">
                <table class="hover">
                  <thead class="primary-emphasis">
                    <tr>
                      <th width="70">Order ID</th>
                      <th width="100">Bukti Pembayaran</th>
                      <th width="120">Tamu</th>
                      <th width="100">Harga</th>
                      <th width="90">Pembayaran</th>
                      <th width="100">Tanggal</th>
                      <th width="80">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (empty(isset($_GET['kata']))) {
                    $p      = new Paging;
                    $batas  = 10;
                    $posisi = $p->cariPosisi($batas);

                    $result=mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_status='done' AND guest_username='$_SESSION[guest_username]' LIMIT $posisi,$batas");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_status='done' AND guest_username='$_SESSION[guest_username]'"));
                    if(mysqli_num_rows($result) === 0) {
                    ?>
                    <tr>
                      <td class="center" colspan="10">Data kosong...</td>
                    </tr>
                    <?php } else {
                    $no = $posisi+1;
                    while ($invoice=mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    <td rowspan="3" class="center"><?php echo $invoice['invoice_id'] ?></td>
                                                <td class="center"> 
                                                <?php if ($invoice['invoice_photo']) { ?>
                                                  <a href="admin/assets/images/invoice/<?php echo $invoice['invoice_photo'] ?>" target="_blank">
                                                        <img style="width: 100px" src="admin/assets/images/invoice/<?php echo $invoice['invoice_photo'] ?>">
                                                    </a>
                                                <?php } else { ?>
                                                    Anda belum upload bukti Pembayaran
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                    $guests = mysqli_query($connect, "SELECT * FROM guest WHERE guest_username='$invoice[guest_username]'");
                                                    $guest      = mysqli_fetch_array($guests); ?>
                      <a href="?module=profile">
                      Nama: <?php echo $guest['guest_name'] ?></a><br>
                      Alamat <?php echo $guest['guest_address'] ?><br> 
                      No Telp: <?php echo $guest['guest_notelp'] ?>
                    </td>
                    <td>
                    Total Harga: Rp<?php echo format_rupiah($invoice['invoice_price']) ?>,00<br>
                    Booking Harga: Rp<?php echo format_rupiah($invoice['invoice_price'] * (20/100)) ?>,00<br><br>
                    Total Sisa: Rp<?php echo format_rupiah($invoice['invoice_price'] - ($invoice['invoice_price'] * (20/100))) ?>,00 <br>
                    </td>
                    <td class="text-center"><?php echo $invoice['invoice_payment'] ?></td>
                    <td><?php echo tgl_indo($invoice['invoice_created']) ?>
                    </td>
                      <td align="center">
                        <!-- ========== EDIT DETAIL HAPUS ========== -->
                        <div class="btn-group">
                          <div style="margin-bottom: 10px;"><a type="button" href="modul/mod_invoicedone/invoicedone_pdf.php?id=<?php echo $invoice['invoice_id'];?>" class="btn btn-default btn-xs">Print PDF</a></div>
                          <button type="button" class="btn btn-default btn-xs">Actions</button>
                          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                              <a href="?module=invoicedone&act=detail&id=<?php echo $invoice['invoice_id'] ?>" title="Detail <?php echo $invoice['invoice_id'] ?>"><i class='fa fa-eye'></i> Detail</a>
                            </li>
                          </ul>
                        </div>
                        <!-- ========== End EDIT DETAIL HAPUS ========== -->
                      </td>
                      <?php $no++;
                    ?>
                    </tr>
                    <tr>
                          <td>Pesan: </td>
                          <td colspan="6"><?php echo $invoice['invoice_pesan'] ?></td>
                    </tr>
                    <tr>
                                                  <td colspan="1">Status Checkin: </td>
                                                  <td colspan="2"><?php echo $invoice['invoice_checkin'] ?> </td>
                                                  <td colspan="1">Status Checkout: </td>
                                                  <td colspan="2"><?php echo $invoice['invoice_checkout'] ?></td>
                    </tr>
                    <?php }
                      $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_status='done' AND guest_username='$_SESSION[guest_username]'"));
                      $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                      $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                    }?>
                  </tbody>
                </table>
                <div id='pagination'>
                       <div class='pagination-left'>Total : <?php echo $jmldata ?></div>
                       <div class='pagination-right'>
                           <ul class="pagination">
                               <?php echo $linkHalaman ?>
                           </ul>
                       </div>
                   </div>
                <?php } else {
                  $p      = new Paging;
                  $batas  = 10;
                  $posisi = $p->cariPosisi($batas);
                  $search = $_GET['kata'];

                  $result=mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_id LIKE '%$search%' AND invoice_status='done' LIMIT $posisi,$batas");
                  if(mysqli_num_rows($result) === 0) {
                  $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_id LIKE '%$search%' AND invoice_status='done'"));
                  ?>
                  <tr>
                    <td class="center" colspan="10">Data kosong...</td>
                  </tr>
                  <?php } else {
                  $no = $posisi+1;
                  while ($invoice=mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                  <td rowspan="3" class="center"><?php echo $invoice['invoice_id'] ?></td>
                  <td>
                  <?php if ($invoice['invoice_photo']) { ?>
                    <a href="admin/assets/images/invoice/<?php echo $invoice['invoice_photo'] ?>" target="_blank">
                                                        <img style="width: 100px" src="admin/assets/images/invoice/<?php echo $invoice['invoice_photo'] ?>">
                                                    </a>
                  <?php } else { ?>
                      Anda belum upload bukti Pembayaran
                  <?php } ?>
                  </td>
                  <td>
                  <?php
                      $guests = mysqli_query($connect, "SELECT * FROM guest WHERE guest_username='$invoice[guest_username]'");
                      $guest      = mysqli_fetch_array($guests); ?>
<a href="?module=guest&act=detail&id=<?php echo $invoice['guest_username'] ?>">
Nama: <?php echo $guest['guest_name'] ?></a><br>
Alamat <?php echo $guest['guest_address'] ?><br> 
No Telp: <?php echo $guest['guest_notelp'] ?>
</td>
<td>
Total Harga: Rp<?php echo format_rupiah($invoice['invoice_price']) ?>,00<br>
Booking Harga: Rp<?php echo format_rupiah($invoice['invoice_price'] * (20/100)) ?>,00<br><br>
                    Total Sisa: Rp<?php echo format_rupiah($invoice['invoice_price'] - ($invoice['invoice_price'] * (20/100))) ?>,00 <br>
</td>
<td class="text-center"><?php echo $invoice['invoice_payment'] ?></td>
<td>
 <?php echo tgl_indo($invoice['invoice_created']) ?>
</td>
<td align="center">
<!-- ========== EDIT DETAIL HAPUS ========== -->
<div class="btn-group">
                          <div style="margin-bottom: 10px;"><a type="button" href="modul/mod_invoicedone/invoicedone_pdf.php?id=<?php echo $invoice['invoice_id'];?>" class="btn btn-default btn-xs">Print PDF</a></div>
  <button type="button" class="btn btn-default btn-xs">Actions</button>
  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu pull-right" role="menu">
    <li>
      <a href="?module=invoicedone&act=detail&id=<?php echo $invoice['invoice_id'] ?>" title="Detail <?php echo $invoice['invoice_id'] ?>"><i class='fa fa-eye'></i> Detail</a>
    </li>
  </ul>
</div>
<!-- ========== End EDIT DETAIL HAPUS ========== -->
</td>
                  </tr> 
                    <tr>
                          <td>Pesan: </td>
                          <td colspan="6"><?php echo $invoice['invoice_pesan'] ?></td>
                    </tr>
                  <tr>
                                                  <td colspan="1">Status Checkin: </td>
                                                  <td colspan="2"><?php echo $invoice['invoice_checkin'] ?> </td>
                                                  <td colspan="1">Status Checkout: </td>
                                                  <td colspan="2"><?php echo $invoice['invoice_checkout'] ?></td>
                    </tr>
                  <?php
                      $no++;
                    }
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_id LIKE '%$search%' AND invoice_status='done'"));
                    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                  }?> 
                </tbody>
              </table>
              <div id='pagination'>
                     <div class='pagination-left'>Total : <?php echo $jmldata ?></div>
                     <div class='pagination-right'>
                         <ul class="pagination">
                             <?php echo $linkHalaman ?>
                         </ul>
                     </div>
                 </div>
              <?php } ?>
              <!-- ========== End Table ========== -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Content -->

    <!-- ========== Modal Konfirmasi ========== -->
    <div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Konfirmasi</h4>
          </div>
          <div class="modal-body" style="background:green;color:#fff">
            Apakah Anda yakin ingin menghapus data ini?
          </div>
          <div class="modal-footer">
            <a href="javascript:;" class="btn btn-danger" id="accept-invoice">Ya</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>
    <!-- ========== End Modal Konfirmasi ========== -->
  <?php
  break;
  case "detail":  
  ?>


  <!-- Content -->
  <div class="cl-mcont">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="block-flat">
          <div class="content">
              <!-- ========== Table ========== -->
              <div class="table-responsive">
                <table class="hover">
                  <thead class="primary-emphasis">
                    <tr>
                      <th width="70">Order ID</th>
                      <th width="120">Bukti Pembayaran</th>
                      <th width="150">Tamu</th>
                      <th width="100">Harga</th>
                      <th width="130">Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $result=mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_status='done' AND guest_username='$_SESSION[guest_username]' AND invoice_id='$_GET[id]'");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_status='done' AND guest_username='$_SESSION[guest_username]' AND invoice_id='$_GET[id]'"));
                    if(mysqli_num_rows($result) === 0) {
                    ?>
                    <tr>
                      <td class="center" colspan="10">Data kosong...</td>
                    </tr>
                    <?php } else {
                    $no = $posisi+1;
                    while ($invoice=mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    <td class="center" rowspan="2" ><?php echo $invoice['invoice_id'] ?></td>
                                                <td class="center:">
                                                <?php if ($invoice['invoice_photo']) { ?>
                                                  <a href="admin/assets/images/invoice/<?php echo $invoice['invoice_photo'] ?>" target="_blank">
                                                        <img style="width: 100px" src="admin/assets/images/invoice/<?php echo $invoice['invoice_photo'] ?>">
                                                    </a>
                                                </td>
                                                <?php } else { ?>
                                                    Anda belum upload bukti Pembayaran
                                                <?php } ?>
                                                <td>
                                                <?php
                                                    $guests = mysqli_query($connect, "SELECT * FROM guest WHERE guest_username='$invoice[guest_username]'");
                                                    $guest      = mysqli_fetch_array($guests); ?>
                      <a href="?module=guest&act=detail&id=<?php echo $invoice['guest_username'] ?>">
                      Nama: <?php echo $guest['guest_name'] ?></a><br>
                      Alamat: <?php echo $guest['guest_address'] ?><br> 
                      No Telp: <?php echo $guest['guest_notelp'] ?>
                    </td>
                    <td>
                    Rp<?php echo format_rupiah($invoice['invoice_price']) ?>,00<br>
Booking Harga: Rp<?php echo format_rupiah($invoice['invoice_price'] * (20/100)) ?>,00<br><br>
                    Total Sisa: Rp<?php echo format_rupiah($invoice['invoice_price'] - ($invoice['invoice_price'] * (20/100))) ?>,00 <br>
                    </td>
                    <td>
                    <?php echo tgl_indo($invoice['invoice_created']) ?>
                    </td>
                      <?php $no++;
                    ?>
                    </tr>
                    <tr>
                                                  <td colspan="1">Status Checkin: </td>
                                                  <td colspan="1"><?php echo $invoice['invoice_checkin'] ?> </td>
                                                  <td colspan="1">Status Checkout: </td>
                                                  <td colspan="1"><?php echo $invoice['invoice_checkout'] ?></td>
                    </tr>
                    <?php }
                    }?>
                  </tbody>
                </table>
              <!-- ========== End Table ========== -->
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="block-flat">
          <div class="content">
              <!-- ========== Table ========== -->
              <h3 class="title">Detail</h3>
              <div class="table-responsive">
                <table class="hover">
                  <thead class="primary-emphasis">
                    <tr>
                      <th width="70">ID</th>
                      <th width="120">No Kamar</th>
                      <th width="150">Lama Hari</th>
                      <th width="150">Harga</th>
                      <th width="100">Total Harga</th>
                      <th width="130">Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $p      = new Paging;
                    $batas  = 10;
                    $posisi = $p->cariPosisi($batas);

                    $result=mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status='done' AND invoice_id='$_GET[id]' LIMIT $posisi,$batas");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status='done' AND invoice_id='$_GET[id]'"));
                    if(mysqli_num_rows($result) === 0) {
                    ?>
                    <tr>
                      <td class="center" colspan="10">Data kosong...</td>
                    </tr>
                    <?php } else {
                    $no = $posisi+1;
                    while ($invoice=mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    <td class='text-center'><?php echo $no ?></td>
                    <td class='text-center'>  <a href="?module=room&act=detail&id=<?php echo $invoice['room_id'] ?>"><?php echo $invoice['room_id'] ?></a></td>
                    <td class='text-center'><?php echo $invoice['transaction_qty'] ?> Hari</td>
                    <td class='text-center'>Rp<?php echo format_rupiah($invoice['transaction_price']) ?>,00</td>
                    <td class='text-center'>Rp<?php echo format_rupiah($invoice['transaction_totalprice']) ?>,00</td>
                    <td>
                    
                   Dibuat: <?php echo tgl_indo($invoice['transaction_created']) ?><br>
                   Check In: <?php echo tgl_indo($invoice['transaction_checkin']) ?><br>
                   Check Out: <?php echo tgl_indo($invoice['transaction_checkout']) ?></td>
                      <?php $no++;
                    ?>
                    </tr>
                    <?php }
                      $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status='done' AND invoice_id='$_GET[id]'"));
                      $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                      $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                    }?>
                  </tbody>
                </table>
                <div id='pagination'>
                       <div class='pagination-left'>Total : <?php echo $jmldata ?></div>
                       <div class='pagination-right'>
                           <ul class="pagination">
                               <?php echo $linkHalaman ?>
                           </ul>
                       </div>
                   </div>
              <!-- ========== End Table ========== -->
              </div>
              <input class="btn btn-default" type="reset" name="batal" value="Kembali" onclick="location.href='?module=invoicedone'"/>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Content -->
  <?php
  break;
}} ?>
