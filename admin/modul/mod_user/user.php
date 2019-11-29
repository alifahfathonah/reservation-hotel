<?php

include "../config/fungsi_indotgl.php";
include "../config/class_paging.php";

$aksi="modul/mod_user/user_aksi.php";

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
            <form method="get" action='<?php echo '?module=user&'.$_SERVER['PHP_SELF'] ?>'>
              <div class='btn-navigation'>
                <?php if ($_SESSION['level']=='admin') { ?>
                <div class='pull-right'>
                  <a class="btn btn-primary" href="?module=user&act=tambah"><i class="fa fa-plus-circle"></i> Tambah User</a>
                </div>
                <?php } ?>
                <div class='pull-right'>
                  <a class="btn btn-primary" href="?module=user"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
                </div>
              </div>
              <div class='row'>
                <div class='btn-search'>Cari Berdasarkan Nama :</div>
                  <div class='col-md-3 col-sm-12'>
                    <div class="input-group">
                      <input type=hidden name=module value=user>
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
                      <th width="200">Nama</th>
                      <th width="150">Username</th>
                      <th width="100">Password</th>
                      <th width="100">Level</th>
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

                    $result=mysqli_query($connect,"SELECT * FROM admin WHERE admin_level='user' LIMIT $posisi,$batas");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM admin WHERE admin_level='user'"));
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
                      <td><?php echo $r['admin_name'] ?></td>
                      <td><?php echo $r['admin_username'] ?></td>
                      <td>*****</td>
                      <td class="center"><?php echo $r['admin_level'] ?></td>
                      <td class="center"><?php echo tgl_indo($r['admin_updated']) ?></td>
                      <?php if ($_SESSION['level']=='admin') { ?>
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
                              <a href="?module=user&act=edit&id=<?php echo $r['admin_username'] ?>" title="Edit <?php echo $r['admin_name'] ?>"><i class='fa fa-pencil'></i> Edit</a>
                            </li>
                            <li>
                              <a href="?module=user&act=detail&id=<?php echo $r['admin_username'] ?>" title="Detail <?php echo $r['admin_name'] ?>"><i class='fa fa-eye'></i> Detail</a>
                            </li>
                            <li>
                              <a href="javascript:;" data-id="<?php echo $r['admin_username'] ?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $r['admin_name'] ?>"><i class='fa fa-trash-o'></i> Hapus</a>
                            </li>
                          </ul>
                        </div>
                        <!-- ========== End EDIT DETAIL HAPUS ========== -->
                      </td>
                      <?php $no++;
                    } ?>
                    </tr>
                    <?php }
                      $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM admin WHERE admin_level='user'"));
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

                  $result=mysqli_query($connect,"SELECT * FROM admin WHERE admin_name LIKE '%$search%' AND admin_level='user' LIMIT $posisi,$batas");
                  if(mysqli_num_rows($result) === 0) {
                  $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM admin WHERE admin_name LIKE '%$search%' AND admin_level='user'"));
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
                    <td><?php echo $r['admin_name'] ?></td>
                    <td><?php echo $r['admin_username'] ?></td>
                    <td>*****</td>
                    <td class="center"><?php echo $r['admin_level'] ?></td>
                      <td class="center"><?php echo tgl_indo($r['admin_updated']) ?></td>
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
                            <a href="?module=user&act=edit&id=<?php echo $r['admin_username'] ?>" title="Edit <?php echo $r['admin_name'] ?>"><i class='fa fa-pencil'></i> Edit</a>
                          </li>
                          <li>
                            <a href="?module=user&act=detail&id=<?php echo $r['admin_username'] ?>" title="Detail <?php echo $r['admin_name'] ?>"><i class='fa fa-eye'></i> Detail</a>
                          </li>
                          <li>
                            <a href="javascript:;" data-id="<?php echo $r['admin_username'] ?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $r['admin_name'] ?>"><i class='fa fa-trash-o'></i> Hapus</a>
                          </li>
                        </ul>
                      </div>
                      <!-- ========== End EDIT DETAIL HAPUS ========== -->
                    </td>
                  </tr>
                  <?php
                      $no++;
                    }
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM admin WHERE admin_name LIKE '%$search%' AND admin_level='user'"));
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
            <a href="javascript:;" class="btn btn-danger" id="hapus-user">Ya</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>
    <!-- ========== End Modal Konfirmasi ========== -->
  <?php
  break;

  // Form Tambah
  case "tambah":
  if ($_SESSION['level']=='admin') { ?>
  <div class="cl-mcont">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=user&act=tambah" method="post" enctype="multipart/form-data" parsley-validate novalidate>
              <h3 class="title">Tambah Pengguna</h3>
              <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                    <tr>
                      <td>
                        <label for="admin_username" class="control-label" >Username <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="admin_username" type="text" required class="form-control input-sm" id="admin_username" placeholder="Masukan Username"/>
                      </td>
                    </tr>
                    <tr>
                      <td width="230">
                        <label for="admin_password" class="control-label" >Password <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="admin_password" type="password" required class="form-control input-sm" id="admin_password" placeholder="Masukan Password"/>
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="admin_name" class="control-label">Nama Lengkap <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="admin_name" type="text" id="admin_name" required class="form-control input-sm" size="30" maxlength="30" placeholder="Masukan Nama Lengkap"/>
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="admin_level" class="control-label">Level <span class="required">*</span></label>
                      </td>
                      <td>
                        <select name="admin_level" class="form-control input-sm" id="admin_level" required>
                          <option value="">--- Pilih Level ---</option>
                          <option value="admin">Admin</option>
                          <option value="user">User</option>
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
            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='?module=user'"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  } else {
    header("location: admin/media.php?module=user");
  }
  break;

  // Form Edit
  case "edit":
  if ($_SESSION['level']=='admin') {
  $result =mysqli_query($connect,"SELECT * FROM admin WHERE admin_username='$_GET[id]'");
  $r      = mysqli_fetch_array($result);
  ?>
  <div class="cl-mcont">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=user&act=edit" method="post" enctype="multipart/form-data" parsley-validate novalidate>
              <h3 class="title">Ubah Pengguna</h3>
              <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                    <tr>
                      <td>
                        <label for="admin_username" class="control-label" >Username <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="admin_username" readonly type="text" readonly class="form-control input-sm" id="admin_username" placeholder="Masukan Username" value='<?php echo $r['admin_username'] ?>'/>
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="admin_name" class="control-label">Nama Lengkap <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="admin_name" type="text" id="admin_name" required class="form-control input-sm" size="30" maxlength="30" placeholder="Masukan Nama Lengkap" value='<?php echo $r['admin_name'] ?>'/>
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="admin_level" class="control-label">Level <span class="required">*</span></label>
                      </td>
                      <td>
                        <select name="admin_level" class="form-control input-sm" id="admin_level" required value='<?php echo $r['admin_level'] ?>'>
                          <?php if ($r['admin_level'] === 'admin') { ?>
                          <option value="admin" selected>Admin</option>
                          <option value="user">User</option>
                          <?php } else { ?>
                          <option value="admin">Admin</option>
                          <option value="user" selected>User</option>
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
            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='?module=user'"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  } else {
    header("location: admin/media.php?module=user");
  }
  break;

  // Form Detail
  case "detail":
  if ($_SESSION['level']=='admin') {
  $result =mysqli_query($connect,"SELECT * FROM admin WHERE admin_username='$_GET[id]'");
  $r      = mysqli_fetch_array($result);
  $tanggal=tgl_indo($r['admin_created']);
  ?>
  <div class="cl-mcont">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="?module=user&act=edit&id=<?php echo $r['admin_username'] ?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
              <h3 class="title">Detail Pengguna</h3>
              <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                    <tr>
                      <td width="130">
                        <label class="control-label">Nama Lengkap</label>
                      </td>
                      <td class="detail"><?php echo $r['admin_name'] ?></td>
                    </tr>
                    <tr>
                      <td>
                        <label class="control-label" >Username</label>
                      </td>
                      <td class="detail"><?php echo $r['admin_username'] ?></td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="admin_level" class="control-label">Password</label>
                      </td>
                      <td class="detail">*****</td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Level</label>
                      </td>
                      <td class="detail"><?php echo $r['admin_level'] ?></td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label class="control-label">Dibuat</label>
                      </td>
                      <td class="detail"><?php echo $tanggal ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div
            </form>
          </div>
          <div class='center'>
            <input class="btn btn-primary" type="submit" name="simpan" value="Edit Data">
            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='?module=user'"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  } else {
    header("location: admin/media.php?module=user");
  }
  break;
} ?>
