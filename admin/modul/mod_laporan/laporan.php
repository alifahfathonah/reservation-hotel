<?php

include "../config/fungsi_indotgl.php";
include "../config/fungsi_rupiah.php";
include "../config/class_paging.php";

$aksi="modul/mod_laporan/laporan_aksi.php";

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
            <form method="get" action='<?php echo '?module=laporan&'.$_SERVER['PHP_SELF'] ?>'>
              <div class='btn-navigation'>
                <div class='pull-right'>
                  <a class="btn btn-primary" href="?module=laporan"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
                </div><div class='pull-right'>
                <?php
                                        if (empty(isset($_GET['filter'])) AND empty(isset($_GET['filter2']))) { 
                                            $result=mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status='done'");
                                            if(mysqli_num_rows($result) > 0) {?>
                                            <a class="btn btn-success" href="modul/mod_laporan/laporan_pdf.php">
                                                <i class="fa fa-print"></i> Print PDF</a>
                                            <?php } ?>
                                            <?php } else { 
                                                $result=mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status='done' AND transaction_created
                                                BETWEEN '$_GET[filter] 00:00:00' AND '$_GET[filter2] 00:00:00'");
                                            if(mysqli_num_rows($result) > 0) {?>
                                            <a class="btn btn-success" href="modul/mod_laporan/laporan_pdf.php?filter=<?php echo $_GET[filter]."&filter2=".$_GET[filter2] ?>">
                                                <i class="fa fa-print"></i> Print PDF</a>
                                            <?php }} ?>
                                            </div>
                <div class='pull-right'>
                  <button class="btn btn-primary" type="submit" ><i class="fa fa-search"></i> Cari</button>
                </div>
              </div>
              <div class='row'>
                <div class='btn-search'>Cari dari Tanggal:</div>
                  <div class='col-md-2 col-sm-12'>
                    <div class="input-group">
                      <input type=hidden name=module value=laporan>
                      <input type="date" name="filter" class="form-control" value=""/>
                    </div>
                  </div>
                  <div class='col-md-2 col-sm-12'>
                  <input type="date" name="filter2" class="form-control" value=""/>
                  </div>
                </div>
              </form>
              <!-- ========== End Button ========== -->
              <!-- ========== Table ========== -->
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
                                        if (empty(isset($_GET['filter'])) AND empty(isset($_GET['filter2']))) {
                    $p      = new Paging;
                    $batas  = 10000;
                    $posisi = $p->cariPosisi($batas);

                    $result=mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status='done' LIMIT $posisi,$batas");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status='done'"));
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
                    <td class='text-center'><?php echo $r['room_id'] ?></td>
                    <td class='text-center'><?php echo $r['transaction_qty'] ?> Hari</td>
                    <td class='text-center'>Rp<?php echo format_rupiah($r['transaction_price']) ?>,00</td>
                    <td>Rp<?php echo format_rupiah($r['transaction_totalprice']) ?>,00</td>
                    <td>Dibuat: <?php echo tgl_indo($r['transaction_created']) ?><br>
                    Checkin: <?php echo tgl_indo($r['transaction_checkin']) ?><br>
                    Checkout: <?php echo tgl_indo($r['transaction_checkout']) ?><br>
                    <?php echo tgl_indo($r['transaction_day']) ?> Hari</td>
                      <?php $no++; }
                    ?>
                    </tr>

                    <?php }  }else {
                      $p      = new Paging;
                    $batas  = 10000;
                    $posisi = $p->cariPosisi($batas);

                    $result=mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status='done' AND transaction_created
                    BETWEEN '$_GET[filter] 00:00:00' AND '$_GET[filter2] 00:00:00' LIMIT $posisi,$batas");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status='done' AND transaction_created
                    BETWEEN '$_GET[filter] 00:00:00' AND '$_GET[filter2] 00:00:00'"));
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
                    <td class='text-center'><?php echo $r['room_id'] ?></td>
                    <td class='text-center'><?php echo $r['transaction_qty'] ?> Kamar</td>
                    <td class='text-center'>Rp<?php echo format_rupiah($r['transaction_price']) ?>,00</td>
                    <td>Rp<?php echo format_rupiah($r['transaction_totalprice']) ?>,00</td>
                    <td>Dibuat: <?php echo tgl_indo($r['transaction_created']) ?><br>
                    Checkin: <?php echo tgl_indo($r['transaction_checkin']) ?><br>
                    Checkout: <?php echo tgl_indo($r['transaction_checkout']) ?><br>
                    <?php echo tgl_indo($r['transaction_day']) ?> Hari</td>
                      <?php $no++; }
                    ?>
                    </tr>
                    <?php } } ?>
                    <?php 
                    ?>
                  </tbody> <tbody>
                                        <tr>
                                            <?php
                                        if (empty(isset($_GET['filter'])) AND empty(isset($_GET['filter2']))) {
                                                $result = mysqli_query($connect, "SELECT SUM(transaction_totalprice) AS transaction_totalprice FROM transaction WHERE transaction_status = 'done'"); 
                                        } else {
                                            $result=mysqli_query($connect,"SELECT SUM(transaction_totalprice) AS transaction_totalprice FROM transaction WHERE transaction_status='done' AND transaction_created
                                            BETWEEN '$_GET[filter] 00:00:00' AND '$_GET[filter2] 00:00:00'");
                                        }
												$row = mysqli_fetch_assoc($result);  
												$sum = $row['transaction_totalprice'];
											?>
                                                <td colspan="4">Total Pendapatan</td>
                                                <td colspan="2" style="color:red">Rp
                                                    <?php echo format_rupiah($sum); ?>,00</td>
                                        </tr>
                                    </tbody>
                </table>
              <!-- ========== End Table ========== -->
              </div>
            </div>
          </div>
        </div>
      </div>
  <div id="zz" style="height: 400px; padding: 50px; margin-top: -100px;"></div>
<script>
	Highcharts.chart('zz', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Reservasi Kamar'
    },
    subtitle: {
        text: 'Statistik Reservasi Kamar'
    },
    xAxis: {
        categories: [
			<?php 
        $result=mysqli_query($connect,"SELECT * FROM room");
        while ($r=mysqli_fetch_array($result)) { ?>
									'No Kamar: <?php echo $r['room_no'];?>',
			<?php } ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Reservasi Kamar'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} pcs</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Reservasi Kamar',
        data: [
					<?php 
        $result=mysqli_query($connect,"SELECT * FROM room");
        while ($r=mysqli_fetch_array($result)) {
          $counts = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM transaction WHERE room_id='$r[room_no]'"));
          if ($counts === 0) {
            $counts = 0;
          }
      ?>
									<?php echo $counts;?>,
			<?php } ?>
		]

    }]
});
</script>
    <!-- End Content -->
  <?php
  break;
} ?>
