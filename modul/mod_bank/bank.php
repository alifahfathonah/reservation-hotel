<?php

include "config/fungsi_indotgl.php";
include "config/fungsi_rupiah.php";
include "config/class_paging.php";

$aksi="modul/mod_bank/bank_aksi.php";

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
                    $batas  = 10;
                    $posisi = $p->cariPosisi($batas);

                    $results=mysqli_query($connect,"SELECT * FROM bank LIMIT $posisi,$batas");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM bank"));
                    if(mysqli_num_rows($results) === 0) {
                    ?>

                    <?php } else {
                    $no = $posisi+1;
                    while ($bank=mysqli_fetch_array($results)) {
                    ?>
                    <div class="col-sm-4 col-md-3">
                        <div class="block-flat">
                            <div style="margin-top: 10px;font-size: 24px;text-align: center;">
                                <b>
                                Bank
                                    <?php echo $bank['bank_name'] ?>
                                </b>
                            </div>
                            <div style="margin-top: 20px;">
                                Atas Nama: <?php echo $bank['bank_owner'] ?>
                            </div>
                            <div style="margin-top: 0px; color: red;">
                                No Rek: <?php echo $bank['bank_noaccount'] ?>
                            </div>
                        </div>
                    </div>
                    <?php $no++;
                    ?>
                    <?php }
                      $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM bank"));
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
}
    ?>