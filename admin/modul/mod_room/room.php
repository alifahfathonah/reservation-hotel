<?php

include "../config/fungsi_indotgl.php";
include "../config/fungsi_rupiah.php";
include "../config/class_paging.php";

$aksi="modul/mod_room/room_aksi.php";

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
            <form method="get" action='<?php echo '?module=room&'.$_SERVER['PHP_SELF'] ?>'>
              <div class='btn-navigation'>
                <div class='pull-right'>
                  <a class="btn btn-primary" href="?module=room&act=tambah"><i class="fa fa-plus-circle"></i> Tambah Kamar</a>
                </div>
                <div class='pull-right'>
                  <a class="btn btn-primary" href="?module=room"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
                </div>
              </div>
              <div class='row'>
                <div class='btn-search'>Cari Berdasarkan No Kamar :</div>
                  <div class='col-md-3 col-sm-12'>
                    <div class="input-group">
                      <input type=hidden name=module value=room>
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
                      <th width="30">#</th>
                      <th width="100">Foto</th>
                      <th width="150">Kamar</th>
                      <th width="120">Tipe</th>
                      <th width="150">Fasilitas</th>
                      <th width="150">Makanan</th>
                      <th width="80">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (empty(isset($_GET['kata']))) {
                    $p      = new Paging;
                    $batas  = 10;
                    $posisi = $p->cariPosisi($batas);

                    $result=mysqli_query($connect,"SELECT * FROM room LIMIT $posisi,$batas");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM room"));
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
                    <td class="center"><?php echo $no ?></td>
                                                <td>
                                                    <a href="assets/images/room/<?php echo $r['room_photo'] ?>" target="_blank">
                                                        <img style="width: 100px" src="assets/images/room/<?php echo $r['room_photo'] ?>">
                                                    </a>
                                                </td>
                    <td>
                      No Kamar: <?php echo $r['room_no'] ?><br>
                      Untuk <?php echo $r['room_people'] ?> Orang<br> 
                      Price: Rp<?php echo format_rupiah($r['room_price']) ?>,00
                    </td>
                      <td>
                      <?php 
                                                    $roomtypes = mysqli_query($connect, "SELECT * FROM roomtype WHERE roomtype_id='$r[roomtype_id]'");
                                                    $roomtype      = mysqli_fetch_array($roomtypes);
                                                    ?> Tipe Kamar: 
                                                    <?php echo $roomtype['roomtype_name']; ?>
                                                    <br>
                                                    <?php 
                                                    $classtypes = mysqli_query($connect, "SELECT * FROM classtype WHERE classtype_id='$r[classtype_id]'");
                                                    $classtype      = mysqli_fetch_array($classtypes);
                                                    ?> Tipe Kelas: 
                                                    <?php echo $classtype['classtype_name']; ?>
                          </td>
                          <td>
<?php 
$multiple_names = $r['facility_id'];  
$multiple_names_array = explode(',',$multiple_names);

foreach($multiple_names_array as $resultfacility)
{
  $facilitys = mysqli_query($connect, "SELECT * FROM facility WHERE facility_id='$resultfacility'");
  $facility      = mysqli_fetch_array($facilitys);
  echo "- ".$facility['facility_name']."<br>"; 
}
?>
                          </td>
                          <td>
<?php 
$multiple_names = $r['eat_id'];  
$multiple_names_array = explode(',',$multiple_names);

foreach($multiple_names_array as $resulteat)
{
  $eats = mysqli_query($connect, "SELECT * FROM eat WHERE eat_id='$resulteat'");
  $eat      = mysqli_fetch_array($eats);
  echo "- ".$eat['eat_name']."<br>"; 
}
?>
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
                              <a href="?module=room&act=edit&id=<?php echo $r['room_id'] ?>" title="Edit <?php echo $r['room_no'] ?>"><i class='fa fa-pencil'></i> Edit</a>
                            </li>
                            <li>
                              <a href="?module=room&act=detail&id=<?php echo $r['room_no'] ?>" title="Detail <?php echo $r['room_no'] ?>"><i class='fa fa-eye'></i> Detail</a>
                            </li>
                            <li>
                              <a href="javascript:;" data-id="<?php echo $r['room_id'] ?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $r['room_no'] ?>"><i class='fa fa-trash-o'></i> Hapus</a>
                            </li>
                          </ul>
                        </div>
                        <!-- ========== End EDIT DETAIL HAPUS ========== -->
                      </td>
                      <?php $no++;
                    ?>
                    </tr>
                    <?php }
                      $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM room"));
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

                  $result=mysqli_query($connect,"SELECT * FROM room WHERE room_no LIKE '%$search%' LIMIT $posisi,$batas");
                  if(mysqli_num_rows($result) === 0) {
                  $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM room WHERE room_no LIKE '%$search%'"));
                  ?>
                  <tr>
                    <td class="center" colspan="10">Data kosong...</td>
                  </tr>
                  <?php } else {
                  $no = $posisi+1;
                  while ($r=mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                  <td class="center"><?php echo $no ?></td>
                  <td>
                      <a href="assets/images/room/<?php echo $r['room_photo'] ?>" target="_blank">
                          <img style="width: 100px" src="assets/images/room/<?php echo $r['room_photo'] ?>">
                      </a>
                  </td>
<td>
No Kamar: <?php echo $r['room_no'] ?><br>
Untuk <?php echo $r['room_people'] ?> Orang<br> 
Price: Rp<?php echo format_rupiah($r['room_price']) ?>,00
</td>
<td>
<?php 
                      $roomtypes = mysqli_query($connect, "SELECT * FROM roomtype WHERE roomtype_id='$r[roomtype_id]'");
                      $roomtype      = mysqli_fetch_array($roomtypes);
                      ?> Tipe Kamar: 
                      <?php echo $roomtype['roomtype_name']; ?>
                      <br>
                      <?php 
                      $classtypes = mysqli_query($connect, "SELECT * FROM classtype WHERE classtype_id='$r[classtype_id]'");
                      $classtype      = mysqli_fetch_array($classtypes);
                      ?> Tipe Kelas: 
                      <?php echo $classtype['classtype_name']; ?>
                      <?php echo $r['facility_id']; ?>
</td>
<td>
<?php 
$multiple_names = $r['facility_id'];  
$multiple_names_array = explode(',',$multiple_names);

foreach($multiple_names_array as $resultfacility)
{
$facilitys = mysqli_query($connect, "SELECT * FROM facility WHERE facility_id='$resultfacility'");
$facility      = mysqli_fetch_array($facilitys);
echo "- ".$facility['facility_name']."<br>"; 
}
?>
</td>
<td>
<?php 
$multiple_names = $r['eat_id'];  
$multiple_names_array = explode(',',$multiple_names);

foreach($multiple_names_array as $resulteat)
{
$eats = mysqli_query($connect, "SELECT * FROM eat WHERE eat_id='$resulteat'");
$eat      = mysqli_fetch_array($eats);
echo "- ".$eat['eat_name']."<br>"; 
}
?>
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
                            <a href="?module=room&act=edit&id=<?php echo $r['room_id'] ?>" title="Edit <?php echo $r['room_no'] ?>"><i class='fa fa-pencil'></i> Edit</a>
                          </li>
                          <li>
                            <a href="?module=room&act=detail&id=<?php echo $r['room_no'] ?>" title="Detail <?php echo $r['room_no'] ?>"><i class='fa fa-eye'></i> Detail</a>
                          </li>
                          <li>
                            <a href="javascript:;" data-id="<?php echo $r['room_id'] ?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $r['room_no'] ?>"><i class='fa fa-trash-o'></i> Hapus</a>
                          </li>
                        </ul>
                      </div>
                      <!-- ========== End EDIT DETAIL HAPUS ========== -->
                    </td>
                  </tr>
                  <?php
                      $no++;
                    }
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM room WHERE room_no LIKE '%$search%'"));
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
          <div class="modal-body" style="background:#d9534f;color:#fff">
            Apakah Anda yakin ingin menghapus data ini?
          </div>
          <div class="modal-footer">
            <a href="javascript:;" class="btn btn-danger" id="hapus-room">Ya</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>
    <!-- ========== End Modal Konfirmasi ========== -->
  <?php
  break;

  // Form Tambah
  case "tambah": ?>
  <div class="cl-mcont">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=room&act=tambah" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                <h3 class="title">Tambah Kamar</h3>
                <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                    <tr>
                      <td width=150>
                        <label for="room_no" class="control-label" >No Kamar <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="room_no" type="text" required class="form-control input-sm" id="room_no" placeholder="Masukan No Kamar"/>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="roomtype_id" class="control-label">Tipe Kamar <span class="required">*</span></label>
                      </td>
                      <td>
                        <select name="roomtype_id" class="form-control input-sm" id="roomtype_id" required>
                          <option value="">--- Pilih Tipe Kamar ---</option>
                          <?php
                          $result=mysqli_query($connect, "SELECT * FROM roomtype");
                            while ($r=mysqli_fetch_array($result)) { ?>
                              <option value='<?php echo $r['roomtype_id'] ?>'><?php echo $r['roomtype_name'] ?></option>;
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="classtype_id" class="control-label">Tipe Kelas <span class="required">*</span></label>
                      </td>
                      <td>
                        <select name="classtype_id" class="form-control input-sm" id="classtype_id" required>
                          <option value="">--- Pilih Tipe Kelas ---</option>
                          <?php
                          $result=mysqli_query($connect, "SELECT * FROM classtype");
                            while ($r=mysqli_fetch_array($result)) { ?>
                              <option value='<?php echo $r['classtype_id'] ?>'><?php echo $r['classtype_name'] ?></option>;
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="facility_id" class="control-label">Fasilitas <span class="required">*</span></label>
                      </td>
                      <td>
                          <?php
                          $facilitys=mysqli_query($connect, "SELECT * FROM facility");
                            while ($facility=mysqli_fetch_array($facilitys)) { ?>
                            <input required type="checkbox" class="" name="facility_id[]" value="<?php echo $facility['facility_id'] ?>"> <?php echo $facility['facility_name'] ?><br>
                          <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="eat_id" class="control-label">Makanan <span class="required">*</span></label>
                      </td>
                      <td>
                          <?php
                          $eats=mysqli_query($connect, "SELECT * FROM eat");
                            while ($eat=mysqli_fetch_array($eats)) { ?>
                            <input required type="checkbox" class="" name="eat_id[]" value="<?php echo $eat['eat_id'] ?>"> <?php echo $eat['eat_name'] ?><br>
                          <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td width=150>
                        <label for="room_people" class="control-label" >Orang <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="room_people" type="text" required class="form-control input-sm" id="room_people" placeholder="Masukan Orang"/>
                      </td>
                    </tr>
                    <tr>
                      <td width=150>
                        <label for="room_price" class="control-label" >Harga/Hari <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="room_price" type="number" required class="form-control input-sm" id="room_price" placeholder="Masukan Harga/Hari"/>
                      </td>
                    </tr>
                    <tr>
                      <td width=200>
                        <label for="fupload" class="control-label">Foto Kamar <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="fupload" type="file" class="form-control" required id="fupload"/>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
          </div>
          <div class='center'>
            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='?module=room'"/>
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  break;

  // Form Edit
  case "edit":
  $result =mysqli_query($connect,"SELECT * FROM room WHERE room_id='$_GET[id]'");
  $r      = mysqli_fetch_array($result);
  ?>
  <div class="cl-mcont">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=room&act=edit" method="post" enctype="multipart/form-data" parsley-validate novalidate>
              <input name="room_id" hidden type="text" value='<?php echo $r['room_id'] ?>'/>
              <h3 class="title">Ubah Kamar</h3>
              <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                   
                  <tr>
                  <td width=150>
                    <label for="room_no" class="control-label" >No Kamar <span class="required">*</span></label>
                  </td>
                  <td>
                    <input name="room_no" type="text" required class="form-control input-sm" id="room_no" placeholder="Masukan No Kamar" value="<?php echo $r['room_no'] ?>"/>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="roomtype_id" class="control-label">Tipe Kamar <span class="required">*</span></label>
                  </td>
                  <td>
                    <select name="roomtype_id" class="form-control input-sm" id="roomtype_id" required>
                      <?php
                      $roomtypes=mysqli_query($connect, "SELECT * FROM roomtype WHERE roomtype_id='$r[roomtype_id]'");
                      while ($roomtype=mysqli_fetch_array($roomtypes)) { ?>
                         <option value='<?php echo $roomtype['roomtype_id'] ?>'><?php echo $roomtype['roomtype_name'] ?></option>;
                      <?php } ?>
                      <option value="">--- Pilih Tipe Kamar ---</option>
                      <?php
                      $roomtypes2=mysqli_query($connect, "SELECT * FROM roomtype");
                        while ($roomtype2=mysqli_fetch_array($roomtypes2)) { ?>
                          <option value='<?php echo $roomtype2['roomtype_id'] ?>'><?php echo $roomtype2['roomtype_name'] ?></option>;
                      <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="classtype_id" class="control-label">Tipe Kelas <span class="required">*</span></label>
                  </td>
                  <td>
                    <select name="classtype_id" class="form-control input-sm" id="classtype_id" required>
                      <?php
                      $classtypes=mysqli_query($connect, "SELECT * FROM classtype WHERE classtype_id='$r[classtype_id]'");
                      while ($classtype=mysqli_fetch_array($classtypes)) { ?>
                         <option value='<?php echo $classtype['classtype_id'] ?>'><?php echo $classtype['classtype_name'] ?></option>;
                      <?php } ?>
                      <option value="">--- Pilih Tipe Kelas ---</option>
                      <?php
                      $classtypes2=mysqli_query($connect, "SELECT * FROM classtype");
                        while ($classtype2=mysqli_fetch_array($classtypes2)) { ?>
                          <option value='<?php echo $classtype2['classtype_id'] ?>'><?php echo $classtype2['classtype_name'] ?></option>;
                      <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="facility_id" class="control-label">Fasilitas <span class="required">*</span></label>
                  </td>
                  <td>
                      <?php
                      $multiple_names = $r['facility_id'];  
                      $multiple_names_array = explode(',',$multiple_names);
                      
                      $facilitys=mysqli_query($connect, "SELECT * FROM facility");
                        while ($facility=mysqli_fetch_array($facilitys)) { 
                          {?>
                        <input required type="checkbox" class="" name="facility_id[]" value="<?php echo $facility['facility_id'] ?>"
                        <?php if (isset($multiple_names_array) && in_array($facility[facility_id], $multiple_names_array)) {?>
checked="checked" <?php }?>
> <?php echo $facility['facility_name'] ?><br>
                      <?php }
                      }?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="eat_id" class="control-label">Makanan <span class="required">*</span></label>
                  </td>
                  <td>
                      <?php
                      $multiple_names = $r['eat_id'];  
                      $multiple_names_array = explode(',',$multiple_names);

                      $eats=mysqli_query($connect, "SELECT * FROM eat");
                        while ($eat=mysqli_fetch_array($eats)) { ?>
                        <input required type="checkbox" class="" name="eat_id[]" value="<?php echo $eat['eat_id'] ?>"
                        <?php if (isset($multiple_names_array) && in_array($eat[eat_id], $multiple_names_array)) {?>
checked="checked" <?php }?>> <?php echo $eat['eat_name'] ?><br>
                      <?php } ?>
                  </td>
                </tr>
                <tr>
                  <td width=150>
                    <label for="room_people" class="control-label" >Orang <span class="required">*</span></label>
                  </td>
                  <td>
                    <input name="room_people" type="text" required class="form-control input-sm" id="room_people" value="<?php echo $r['room_people'] ?>" placeholder="Masukan Orang"/>
                  </td>
                </tr>
                <tr>
                  <td width=150>
                    <label for="room_price" class="control-label" >Harga/Hari <span class="required">*</span></label>
                  </td>
                  <td>
                    <input name="room_price" type="number" required class="form-control input-sm" id="room_price" value="<?php echo $r['room_price'] ?>" placeholder="Masukan Harga/Hari"/>
                  </td>
                </tr>
                <tr>
                  <td width=280>
                    <label for="fupload" class="control-label">Foto Kamar <span class="required"> *Kosongkan jika tidak diubah</span></label>
                  </td>
                  <td>
                    <input name="fupload" type="file" class="form-control" id="fupload"/>
                  </td>
                </tr>
                  </tbody>
                </table>
              </div>
          </div>
          <div class='center'>
            <input class="btn btn-primary" type="submit" name="simpan" value="Ubah Data">
            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='?module=room'"/>
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
  $result =mysqli_query($connect,"SELECT * FROM room WHERE room_no='$_GET[id]'");
  $r      = mysqli_fetch_array($result);
  
  ?>
  <div class="cl-mcont">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="?module=room&act=edit&id=<?php echo $r['room_id'] ?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
              <h3 class="title">Detail Kamar</h3>
              <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                    <tr>
                      <td width="130">
                        <label class="control-label">ID</label>
                      </td>
                      <td class="detail"><?php echo $r['room_id'] ?></td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Foto Kamar</label>
                      </td>
                      <td class="detail">
                      <a href="assets/images/room/<?php echo $r['room_photo'] ?>" target="_blank">
                                                        <img style="width: 100px" src="assets/images/room/<?php echo $r['room_photo'] ?>">
                                                    </a>
                                                    </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">No Kamar</label>
                      </td>
                      <td class="detail"><?php echo $r['room_no'] ?></td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Tipe Kamar</label>
                      </td>
                      <td class="detail">
                      <?php
                      $roomtypes=mysqli_query($connect, "SELECT * FROM roomtype WHERE roomtype_id='$r[roomtype_id]'");
                      while ($roomtype=mysqli_fetch_array($roomtypes)) { ?>
                        <?php echo $roomtype['roomtype_name'] ?>
                      <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Tipe Kelas</label>
                       
                      </td>
                      <td class="detail"> <?php
                      $classtypes=mysqli_query($connect, "SELECT * FROM classtype WHERE classtype_id='$r[classtype_id]'");
                      while ($classtype=mysqli_fetch_array($classtypes)) { ?>
                       <?php echo $classtype['classtype_name'] ?>
                      <?php } ?></td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Orang</label>
                      </td>
                      <td class="detail"><?php echo $r['room_people'] ?></td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Harga/Hari</label>
                      </td>
                      <td class="detail"><?php echo format_rupiah($r['room_price']) ?></td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Fasilitas</label>
                      </td>
                      <td class="detail">
                      <?php 
$multiple_names = $r['facility_id'];  
$multiple_names_array = explode(',',$multiple_names);

foreach($multiple_names_array as $resultfacility)
{
  $facilitys = mysqli_query($connect, "SELECT * FROM facility WHERE facility_id='$resultfacility'");
  $facility      = mysqli_fetch_array($facilitys);
  echo "- ".$facility['facility_name']."<br>"; 
}
?>
</td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Makanan</label>
                      </td>
                      <td class="detail">
                      
<?php 
$multiple_names = $r['eat_id'];  
$multiple_names_array = explode(',',$multiple_names);

foreach($multiple_names_array as $resulteat)
{
  $eats = mysqli_query($connect, "SELECT * FROM eat WHERE eat_id='$resulteat'");
  $eat      = mysqli_fetch_array($eats);
  echo "- ".$eat['eat_name']."<br>"; 
}
?>
</td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Dibuat</label>
                      </td>
                      <td class="detail"><?php echo tgl_indo($r['room_created']); ?></td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Dibuat</label>
                      </td>
                      <td class="detail"><?php echo tgl_indo($r['room_updated']); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div
            </form>
          </div>
          <div class='center'>
            <input class="btn btn-primary" type="submit" name="simpan" value="Edit Data">
            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='?module=room'"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  break;
} ?>
