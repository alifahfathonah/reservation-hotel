<?php

include "../config/fungsi_indotgl.php";
include "../config/class_paging.php";

$aksi="modul/mod_guest/guest_aksi.php";

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
            <form method="get" action='<?php echo '?module=guest&'.$_SERVER['PHP_SELF'] ?>'>
              <div class='btn-navigation'>
                <div class='pull-right'>
                  <a class="btn btn-primary" href="?module=guest&act=tambah"><i class="fa fa-plus-circle"></i> Tambah Guest</a>
                </div>
                <div class='pull-right'>
                  <a class="btn btn-primary" href="?module=guest"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
                </div>
              </div>
              <div class='row'>
                <div class='btn-search'>Cari Berdasarkan Nama :</div>
                  <div class='col-md-3 col-sm-12'>
                    <div class="input-group">
                      <input type=hidden name=module value=guest>
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
                      <th width="150">Username</th>
                      <th width="200">Nama</th>
                      <th width="100">Alamat</th>
                      <th width="150">No Telp</th>
                      <th width="100">Terakhir diubah</th>
                      <?php if ($_SESSION['level']=='admin') { ?> <th width="80">Aksi</th> <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (empty(isset($_GET['kata']))) {
                    $p      = new Paging;
                    $batas  = 10;
                    $posisi = $p->cariPosisi($batas);

                    $result=mysqli_query($connect,"SELECT * FROM guest LIMIT $posisi,$batas");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM guest"));
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
                      <td><?php echo $r['guest_username'] ?></td>
                      <td><?php echo $r['guest_name'] ?></td>
                      <td><?php echo $r['guest_address'] ?></td>
                      <td><?php echo $r['guest_notelp'] ?></td>
                      <td class="center"><?php echo tgl_indo($r['guest_updated']) ?></td>
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
                              <a href="?module=guest&act=edit&id=<?php echo $r['guest_username'] ?>" title="Edit <?php echo $r['guest_name'] ?>"><i class='fa fa-pencil'></i> Edit</a>
                            </li>
                            <li>
                              <a href="?module=guest&act=detail&id=<?php echo $r['guest_username'] ?>" title="Detail <?php echo $r['guest_name'] ?>"><i class='fa fa-eye'></i> Detail</a>
                            </li>
                            <li>
                              <a href="javascript:;" data-id="<?php echo $r['guest_username'] ?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $r['guest_name'] ?>"><i class='fa fa-trash-o'></i> Hapus</a>
                            </li>
                          </ul>
                        </div>
                        <!-- ========== End EDIT DETAIL HAPUS ========== -->
                      </td>
                      <?php $no++;
                   ?>
                    </tr>
                    <?php }
                      $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM guest"));
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

                  $result=mysqli_query($connect,"SELECT * FROM guest WHERE guest_name LIKE '%$search%' LIMIT $posisi,$batas");
                  if(mysqli_num_rows($result) === 0) {
                  $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM guest WHERE guest_name LIKE '%$search%'"));
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
                    <td><?php echo $r['guest_username'] ?></td>
                    <td><?php echo $r['guest_name'] ?></td>
                    <td><?php echo $r['guest_address'] ?></td>
                    <td><?php echo $r['guest_notelp'] ?></td>
                    <td class="center"><?php echo tgl_indo($r['guest_updated']) ?></td>
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
                            <a href="?module=guest&act=edit&id=<?php echo $r['guest_username'] ?>" title="Edit <?php echo $r['guest_name'] ?>"><i class='fa fa-pencil'></i> Edit</a>
                          </li>
                          <li>
                            <a href="?module=guest&act=detail&id=<?php echo $r['guest_username'] ?>" title="Detail <?php echo $r['guest_name'] ?>"><i class='fa fa-eye'></i> Detail</a>
                          </li>
                          <li>
                            <a href="javascript:;" data-id="<?php echo $r['guest_username'] ?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $r['guest_name'] ?>"><i class='fa fa-trash-o'></i> Hapus</a>
                          </li>
                        </ul>
                      </div>
                      <!-- ========== End EDIT DETAIL HAPUS ========== -->
                    </td>
                  </tr>
                  <?php
                      $no++;
                    }
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM guest WHERE guest_name LIKE '%$search%'"));
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
            <a href="javascript:;" class="btn btn-danger" id="hapus-guest">Ya</a>
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
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=guest&act=tambah" method="post" enctype="multipart/form-data" parsley-validate novalidate>
              <h3 class="title">Tambah Guest</h3>
              <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                    <tr>
                      <td>
                        <label for="guest_username" class="control-label" >Username <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_username" type="text" required class="form-control input-sm" id="guest_username" placeholder="Masukan Username"/>
                      </td>
                    </tr>
                    <tr>
                      <td width="230">
                        <label for="guest_password" class="control-label" >Password <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_password" type="password" required class="form-control input-sm" id="guest_password" placeholder="Masukan Password"/>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="guest_name" class="control-label" >Nama <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_name" type="text" required class="form-control input-sm" id="guest_name" placeholder="Masukan Nama"/>
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="guest_address" class="control-label">Alamat <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_address" type="text" id="guest_address" required class="form-control input-sm" size="255" maxlength="255" placeholder="Masukan Alamat"/>
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="guest_notelp" class="control-label">No Telp <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_notelp" type="text" id="guest_notelp" required class="form-control input-sm" size="12" maxlength="12" placeholder="Masukan No Telp"/>
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="guest_age" class="control-label">Umur <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_age" type="number" id="guest_age" required class="form-control input-sm" size="12" maxlength="12" placeholder="Masukan Umur"/>
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="guest_gender" class="control-label">Jenis Kelamin <span class="required">*</span></label>
                      </td>
                      <td>
                        <select name="guest_gender" class="form-control input-sm" id="guest_gender" required>
                          <option value="">--- Pilih Jenis Kelamin ---</option>
                          <option value="Pria">Pria</option>
                          <option value="Wanita">Wanita</option>
                        </select>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div
            </form>
          </div>
          <div class='center'>
            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='?module=guest'"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  break;

  // Form Edit
  case "edit":
  $result =mysqli_query($connect,"SELECT * FROM guest WHERE guest_username='$_GET[id]'");
  $r      = mysqli_fetch_array($result);
  ?>
  <div class="cl-mcont">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=guest&act=edit" method="post" enctype="multipart/form-data" parsley-validate novalidate>
              <input name="guest_username" hidden type="text" value='<?php echo $r['guest_username'] ?>'/>
              <h3 class="title">Ubah Guest</h3>
              <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                    <tr>
                      <td>
                        <label for="guest_username" class="control-label" >Username <span class="required">*</span></label>
                      </td>
                      <td>
                        <input readonly name="guest_username" type="text" required class="form-control input-sm" value="<?php echo $r['guest_username'] ?>" id="guest_username" placeholder="Masukan Username"/>
                      </td>
                    </tr>
                    <tr>
                      <td width="230">
                        <label for="guest_password" class="control-label" >Password</label>
                      </td>
                      <td>
                        <input name="guest_password" type="password" class="form-control input-sm" id="guest_password" placeholder="Masukan Password"/>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="guest_name" class="control-label" >Nama <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_name" type="text" required class="form-control input-sm" id="guest_name" placeholder="Masukan Nama" value='<?php echo $r['guest_name'] ?>'/>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="guest_address" class="control-label" >Alamat <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_address" type="text" required class="form-control input-sm" id="guest_address" placeholder="Masukan Alamat" value='<?php echo $r['guest_address'] ?>'/>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="guest_notelp" class="control-label" >No Telp <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_notelp" type="text" required class="form-control input-sm" id="guest_notelp" placeholder="Masukan No Telp" value='<?php echo $r['guest_notelp'] ?>'/>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="guest_age" class="control-label" >Umur <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_age" type="text" required class="form-control input-sm" id="guest_age" placeholder="Masukan Umur" value='<?php echo $r['guest_age'] ?>'/>
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="guest_gender" class="control-label">Jenis Kelamin <span class="required">*</span></label>
                      </td>
                      <td>
                        <select name="guest_gender" class="form-control input-sm" id="guest_gender" required value='<?php echo $r['guest_gender'] ?>'>
                          <?php if ($r['guest_gender'] === 'Pria') { ?>
                          <option value="Pria" selected>Pria</option>
                          <option value="Wanita">Wanita</option>
                          <?php } else { ?>
                          <option value="Pria">Pria</option>
                          <option value="Wanita" selected>Wanita</option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div
            </form>
          </div>
          <div class='center'>
            <input class="btn btn-primary" type="submit" name="simpan" value="Ubah Data">
            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='?module=guest'"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  break;

  // Form Detail
  case "detail":
  $result =mysqli_query($connect,"SELECT * FROM guest WHERE guest_username='$_GET[id]'");
  $r      = mysqli_fetch_array($result);
  ?>
  <div class="cl-mcont">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="?module=guest&act=edit&id=<?php echo $r['guest_username'] ?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
              <h3 class="title">Detail Guest</h3>
              <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                    <tr>
                      <td width="130">
                        <label class="control-label">Username</label>
                      </td>
                      <td class="detail"><?php echo $r['guest_username'] ?></td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Nama</label>
                      </td>
                      <td class="detail"><?php echo $r['guest_name'] ?></td>
                    </tr>
                    <tr>
                      <td>
                        <label class="control-label" >Alamat</label>
                      </td>
                      <td class="detail"><?php echo $r['guest_address'] ?></td>
                    </tr>
                    <tr>
                      <td>
                        <label class="control-label" >No Telp</label>
                      </td>
                      <td class="detail"><?php echo $r['guest_notelp'] ?></td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Umur</label>
                      </td>
                      <td class="detail"><?php echo $r['guest_age'] ?></td>
                    </tr>
                    <tr>
                      <td>
                        <label class="control-label" >Jenis Kelamin</label>
                      </td>
                      <td class="detail"><?php echo $r['guest_gender'] ?></td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Dibuat</label>
                      </td>
                      <td class="detail"><?php echo tgl_indo($r['guest_created']); ?></td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Updated</label>
                      </td>
                      <td class="detail"><?php echo tgl_indo($r['guest_updated']); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div
            </form>
          </div>
          <div class='center'>
            <input class="btn btn-primary" type="submit" name="simpan" value="Edit Data">
            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='?module=guest'"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  break;
} ?>
