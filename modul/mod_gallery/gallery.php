<?php

include "config/fungsi_indotgl.php";
include "config/fungsi_rupiah.php";
include "config/class_paging.php";

$aksi="modul/mod_gallery/gallery_aksi.php";

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

                    $results=mysqli_query($connect,"SELECT * FROM gallery LIMIT $posisi,$batas");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM gallery"));
                    if(mysqli_num_rows($results) === 0) {
                    ?>

                    <?php } else {
                    $no = $posisi+1;
                    while ($gallery=mysqli_fetch_array($results)) {
                    ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="block-flat" style="padding: 5px !important">
                        <div class="img">
                            <a href="admin/assets/images/gallery/<?php echo $gallery['gallery_photo'] ?>" target="_blank">
                                <img src="admin/assets/images/gallery/<?php echo $gallery['gallery_photo'] ?>">
                            </a>
                            </div>
                        </div>
                    </div>
                    <?php $no++;
                    ?>
                    <?php }
                      $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM gallery"));
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


    <style>
.img img {
width: 100%;
height: 200px;
}
</style>