<?php

include "../config/fungsi_indotgl.php";
include "../config/fungsi_rupiah.php";
include "../config/class_paging.php";

$aksi="modul/mod_invoicedone/invoicedone_aksi.php";

switch($_GET['act']) {
  // Tampil
  default:
  ?>
  <!-- Content -->
  <div class="cl-mcont">
    <div class="row">
      <div class="col-sm-12 col-md-12">
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
                      <th width="100">Pembayaran</th>
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

                    $result=mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_status='done' LIMIT $posisi,$batas");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_status='done'"));
                    if(mysqli_num_rows($result) === 0) {
                    ?>
                    <tr>
                      <td class="center" colspan="10">Data kosong...</td>
                    </tr>
                    <?php } else {
                    $no = $posisi+1;
                    while ($r=mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    <td class="center" rowspan="4"><?php echo $r['invoice_id'] ?></td>
                                                <td>
                                                <?php if ($r['invoice_photo']) { ?>
                                                    <a href="assets/images/invoice/<?php echo $r['invoice_photo'] ?>" target="_blank">
                                                        <img style="width: 100px" src="assets/images/invoice/<?php echo $r['invoice_photo'] ?>">
                                                    </a>
                                                <?php } else { ?>
                                                    Tamu belum membayar
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                    $guests = mysqli_query($connect, "SELECT * FROM guest WHERE guest_username='$r[guest_username]'");
                                                    $guest      = mysqli_fetch_array($guests); ?>
                      <a href="?module=guest&act=detail&id=<?php echo $r['guest_username'] ?>">
                      Nama: <?php echo $guest['guest_name'] ?></a><br>
                      Alamat <?php echo $guest['guest_address'] ?><br> 
                      No Telp: <?php echo $guest['guest_notelp'] ?>
                    </td><td>
                    Total Kamar: <?php echo $r['invoice_qty'] ?><br>
                    Total Harga: Rp<?php echo format_rupiah($r['invoice_price']) ?>,00<br>
                    Booking Harga: Rp<?php echo format_rupiah($r['invoice_price'] * (20/100)) ?>,00<br><br>
                                        Total Sisa: Rp<?php echo format_rupiah($r['invoice_price'] - ($invoice['invoice_price'] * (20/100))) ?>,00 <br>
                    </td>
                    <td class="text-center"><?php echo $r['invoice_payment'] ?>
                    </td>
                    <td><?php echo tgl_indo($r['invoice_created']) ?>
                    </td>
                      <td align="center">
                        <!-- ========== EDIT DETAIL HAPUS ========== -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-xs">Actions</button>
                          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                              <a href="?module=invoicedone&act=detail&id=<?php echo $r['invoice_id'] ?>" title="Detail <?php echo $r['invoice_id'] ?>"><i class='fa fa-eye'></i> Detail</a>
                            </li>
                          </ul>
                        </div>
                        <!-- ========== End EDIT DETAIL HAPUS ========== -->
                      </td>
                      <?php $no++;
                    ?>
                     <tr>
                    <tr>
                          <td>Pesan: </td>
                          <td colspan="5"><?php echo $invoice['invoice_pesan'] ?></td>
                    </tr>
                                                  <td colspan="1">Status Checkin: </td>
                                                  <?php if($r['invoice_checkin'] === 'Belum Checkin') { ?> 
                                                  <td colspan="1"><?php echo $r['invoice_checkin'] ?> </td>
                                                  <td colspan="1"><a type="button" class="btn btn-primary btn-block" href="<?php echo $aksi ?>?module=invoicedone&act=checkin&id=<?php echo $r['invoice_id'] ?>">Checkin</a></td>
                                                  <?php } else { ?>
                                                    <td colspan="2"><?php echo $r['invoice_checkin'] ?> </td>
                                                  <?php } ?>
                                                  <td colspan="1">Status Checkout: </td>
                                                  <?php if($r['invoice_checkout'] === 'Belum Checkout') { ?> 
                                                    <td colspan="1"><?php echo $r['invoice_checkout'] ?></td>
                                                    <td colspan="1"><a type="button" class="btn btn-primary btn-block" href="<?php echo $aksi ?>?module=invoicedone&act=checkout&id=<?php echo $r['invoice_id'] ?>">Checkout</a></td>
                                                  <?php } else { ?>
                                                    <td colspan="2"><?php echo $r['invoice_checkout'] ?></td>
                                                  <?php } ?>
                    </tr>
                    <?php }
                      $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_status='done'"));
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
                  while ($r=mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                  <td class="center" rowspan="4"><?php echo $r['invoice_id'] ?></td>
                  <td>
                  <?php if ($r['invoice_photo']) { ?>
                      <a href="assets/images/invoice/<?php echo $r['invoice_photo'] ?>" target="_blank">
                          <img style="width: 100px" src="assets/images/invoice/<?php echo $r['invoice_photo'] ?>">
                      </a>
                  <?php } else { ?>
                      Tamu belum membayar
                  <?php } ?>
                  </td>
                  <td>
                  <?php
                      $guests = mysqli_query($connect, "SELECT * FROM guest WHERE guest_username='$r[guest_username]'");
                      $guest      = mysqli_fetch_array($guests); ?>
<a href="?module=guest&act=detail&id=<?php echo $r['guest_username'] ?>">
Nama: <?php echo $guest['guest_name'] ?></a><br>
Alamat <?php echo $guest['guest_address'] ?><br> 
No Telp: <?php echo $guest['guest_notelp'] ?>
</td><td>
Total Kamar: <?php echo $r['invoice_qty'] ?><br>
Total Harga: Rp<?php echo format_rupiah($r['invoice_price']) ?>,00<br>
Booking Harga: Rp<?php echo format_rupiah($r['invoice_price'] * (20/100)) ?>,00<br><br>
                    Total Sisa: Rp<?php echo format_rupiah($r['invoice_price'] - ($invoice['invoice_price'] * (20/100))) ?>,00 <br>
</td>
<td class="text-center"><?php echo $r['invoice_payment'] ?>
</td>
<td>
 <?php echo tgl_indo($r['invoice_created']) ?>
</td>
<td align="center">
<!-- ========== EDIT DETAIL HAPUS ========== -->
<div class="btn-group">
  <button type="button" class="btn btn-default btn-xs">Actions</button>
  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu pull-right" role="menu">
    <li>
      <a href="?module=invoicedone&act=detail&id=<?php echo $r['invoice_id'] ?>" title="Detail <?php echo $r['invoice_id'] ?>"><i class='fa fa-eye'></i> Detail</a>
    </li>
  </ul>
</div>
<!-- ========== End EDIT DETAIL HAPUS ========== -->
</td>
                  </tr>
                    <tr>
                          <td>Pesan: </td>
                          <td colspan="5"><?php echo $invoice['invoice_pesan'] ?></td>
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

  // Form Cancel
  case "cancel":
  $result =mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_id='$_GET[id]'");
  $r      = mysqli_fetch_array($result);
  ?>
  <div class="cl-mcont">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=invoicedone&act=cancel" method="post" enctype="multipart/form-data" parsley-validate novalidate>
              <input name="invoice_id" hidden type="text" value='<?php echo $r['invoice_id'] ?>'/>
              <h3 class="title">Ubah Booking</h3>
              <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                   
                  <tr>
                  <td width=150>
                    <label for="invoice_id" class="control-label" >No Booking <span class="required">*</span></label>
                  </td>
                  <td>
                    <input name="invoice_id" type="text" required readonly class="form-control input-sm" id="invoice_id" placeholder="Masukan No Booking" value="<?php echo $r['invoice_id'] ?>"/>
                  </td>
                </tr> <tr>
                  <td width=150>
                    <label for="invoice_cancel" class="control-label" >Alasan Cancel <span class="required">*</span></label>
                  </td>
                  <td>
                    <input name="invoice_cancel" type="text" required class="form-control input-sm" id="invoice_cancel" placeholder="Masukan Alasan Cancel" value=""/>
                  </td>
                </tr>
                  </tbody>
                </table>
              </div>
          </div>
          <div class='center'>
            <input class="btn btn-primary" type="submit" name="simpan" value="Cancel Reservasi">
            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='?module=invoicedone'"/>
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  break;

  // Form Detail
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
                    $result=mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_status='done' AND invoice_id='$_GET[id]'");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM invoice WHERE invoice_status='done' AND invoice_id='$_GET[id]'"));
                    if(mysqli_num_rows($result) === 0) {
                    ?>
                    <tr>
                      <td class="center" colspan="10">Data kosong...</td>
                    </tr>
                    <?php } else {
                    $no = $posisi+1;
                    while ($r=mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    <td class="center"><?php echo $r['invoice_id'] ?></td>
                                                <td>
                                                <?php if ($r['invoice_photo']) { ?>
                                                    <a href="assets/images/invoice/<?php echo $r['invoice_photo'] ?>" target="_blank">
                                                        <img style="width: 100px" src="assets/images/invoice/<?php echo $r['invoice_photo'] ?>">
                                                    </a>
                                                </td>
                                                <?php } else { ?>
                                                    Tamu belum membayar
                                                <?php } ?>
                                                <td>
                                                <?php
                                                    $guests = mysqli_query($connect, "SELECT * FROM guest WHERE guest_username='$r[guest_username]'");
                                                    $guest      = mysqli_fetch_array($guests); ?>
                      <a href="?module=guest&act=detail&id=<?php echo $r['guest_username'] ?>">
                      Nama: <?php echo $guest['guest_name'] ?></a><br>
                      Alamat: <?php echo $guest['guest_address'] ?><br> 
                      No Telp: <?php echo $guest['guest_notelp'] ?>
                    </td>
                    <td>
                    Total Kamar: <?php echo $r['invoice_qty'] ?><br>
                    Rp<?php echo format_rupiah($r['invoice_price']) ?>,00
                    </td>
                    <td>
                    <?php echo tgl_indo($r['invoice_created']) ?>
                    </td>
                      <?php $no++;
                    ?>
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
                      <th width="150">QTY</th>
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
                    while ($r=mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    <td class='text-center'><?php echo $no ?></td>
                    <td class='text-center'>  <a href="?module=room&act=detail&id=<?php echo $r['room_id'] ?>"><?php echo $r['room_id'] ?></a></td>
                    <td class='text-center'><?php echo $r['transaction_qty'] ?> Kamar</td>
                    <td class='text-center'>Rp<?php echo format_rupiah($r['transaction_price']) ?>,00</td>
                    <td class='text-center'>Rp<?php echo format_rupiah($r['transaction_totalprice']) ?>,00</td>
                    <td>
                    
                   Dibuat: <?php echo tgl_indo($r['transaction_created']) ?><br>
                   Check In: <?php echo tgl_indo($r['transaction_checkin']) ?><br>
                   Check Out: <?php echo tgl_indo($r['transaction_checkout']) ?><br>
<?php echo tgl_indo($r['transaction_day']) ?> Hari</td>
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
} ?>
