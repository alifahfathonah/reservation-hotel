<?php

include "../config/fungsi_indotgl.php";
include "../config/class_paging.php";

$aksi="modul/mod_profile/profile_aksi.php";

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
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $result=mysqli_query($connect,"SELECT * FROM admin WHERE admin_username='$_SESSION[username]'");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM admin WHERE admin_username='$_SESSION[username]'"));
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
                      <?php $no++;
                    } }  }?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="center">
            <a style="margin-top: 30px ;width: 200px;" class="btn btn-primary" href="?module=profile&act=edit&id=<?php echo $_SESSION['username'] ?>" title="Edit <?php echo $r['admin_name'] ?>"><i class='fa fa-pencil'></i> Edit Nama</a>
            <a style="margin-top: 30px ;width: 200px;" class="btn btn-primary" href="?module=profile&act=editpwd&id=<?php echo $_SESSION['username'] ?>" title="Edit <?php echo $r['admin_name'] ?>"><i class='fa fa-lock'></i> Ganti Password</a>
            </div></div>
        </div>
      </div>
    </div>
    <!-- End Content -->
  <?php
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
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=profile&act=edit" method="post" enctype="multipart/form-data" parsley-validate novalidate>
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
                  </tbody>
                </table>
              </div>
              <div
            </form>
          </div>
          <div class='center'>
            <input class="btn btn-primary" type="submit" name="simpan" value="Ubah Data">
            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='?module=profile'"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  } else {
    header("location: admin/media.php?module=profile");
  }
  break;

  // Form Edit Password
  case "editpwd":
  if ($_SESSION['level']=='admin') {
  $result =mysqli_query($connect,"SELECT * FROM admin WHERE admin_username='$_GET[id]'");
  $r      = mysqli_fetch_array($result);
  ?>
  <div class="cl-mcont">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=profile&act=editpwd" method="post" enctype="multipart/form-data" parsley-validate novalidate>
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
                      <td width="170">
                        <label for="admin_password" class="control-label">Nama Password Baru <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="admin_password" type="password" id="admin_password" required class="form-control input-sm" size="30" minlength="6" maxlength="30" placeholder="Masukan Password Baru"/>
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
            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='?module=profile'"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  } else {
    header("location: admin/media.php?module=profile");
  }
  break;
} ?>
