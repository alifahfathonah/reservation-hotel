<?php

include "config/fungsi_indotgl.php";
include "config/class_paging.php";

$aksi="modul/mod_profile/profile_aksi.php";

if (empty($_SESSION['guest_username']) AND empty($_SESSION['guest_password'])){
  echo "<script>location='media.php?module=home';</script>";
} else { 
switch($_GET['act']) {
  // Tampil
  default:
  ?>
  <!-- Content -->
  <div class="cl-mcont" style="min-height: 400px">
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
                      <th width="100">Alamat</th>
                      <th width="100">No Telp</th>
                      <th width="100">Terakhir diubah</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $result=mysqli_query($connect,"SELECT * FROM guest WHERE guest_username='$_SESSION[guest_username]'");
                    $jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM guest WHERE guest_username='$_SESSION[guest_username]'"));
                    if(mysqli_num_rows($result) === 0) {
                    ?>
                    <tr>
                      <td class="center" colspan="10">Data kosong...</td>
                    </tr>
                    <?php } else {
                    $no = $posisi+1;
                    while ($guest=mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                      <td class="center"><?php echo $no ?></td>
                      <td><?php echo $guest['guest_name'] ?></td>
                      <td><?php echo $guest['guest_username'] ?></td>
                      <td>*****</td>
                      <td><?php echo $guest['guest_address'] ?></td>
                      <td><?php echo $guest['guest_notelp'] ?></td>
                      <td class="center"><?php echo tgl_indo($guest['guest_updated']) ?></td>
                      <?php if ($_SESSION['level']=='guest') { ?>
                      <?php $no++;
                    } }  }?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="center">
            <a style="margin-top: 30px ;width: 200px;" class="btn btn-primary" href="?module=profile&act=edit&id=<?php echo $_SESSION['guest_username'] ?>" title="Edit <?php echo $guest['guest_name'] ?>"><i class='fa fa-pencil'></i> Edit</a>
            <a style="margin-top: 30px ;width: 200px;" class="btn btn-primary" href="?module=profile&act=editpwd&id=<?php echo $_SESSION['guest_username'] ?>" title="Edit <?php echo $guest['guest_name'] ?>"><i class='fa fa-lock'></i> Ganti Password</a>
            </div></div>
        </div>
      </div>
    </div>
    <!-- End Content -->
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
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=profile&act=edit" method="post" enctype="multipart/form-data" parsley-validate novalidate>
              <h3 class="title">Ubah Profile</h3>
              <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                    <tr>
                      <td>
                        <label for="guest_username" class="control-label" >Username <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_username" readonly type="text" readonly class="form-control input-sm" id="guest_username" placeholder="Masukan Username" value='<?php echo $guest['guest_username'] ?>'/>
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="guest_name" class="control-label">Nama Lengkap <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_name" type="text" id="guest_name" required class="form-control input-sm" size="30" maxlength="30" placeholder="Masukan Nama Lengkap" value='<?php echo $guest['guest_name'] ?>'/>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="guest_address" class="control-label" >Alamat <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_address" type="text" required class="form-control input-sm" id="guest_address" placeholder="Masukan Alamat" value='<?php echo $guest['guest_address'] ?>'/>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="guest_notelp" class="control-label" >No Telp <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_notelp" type="text" required class="form-control input-sm" id="guest_notelp" placeholder="Masukan No Telp" value='<?php echo $guest['guest_notelp'] ?>'/>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="guest_age" class="control-label" >Umur <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_age" type="text" required class="form-control input-sm" id="guest_age" placeholder="Masukan Umur" value='<?php echo $guest['guest_age'] ?>'/>
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="guest_gender" class="control-label">Jenis Kelamin <span class="required">*</span></label>
                      </td>
                      <td>
                        <select name="guest_gender" class="form-control input-sm" id="guest_gender" required value='<?php echo $guest['guest_gender'] ?>'>
                          <?php if ($guest['guest_gender'] === 'Pria') { ?>
                          <option value="Pria" selected>Pria</option>
                          <option value="Wanita">Wanita</option>
                          <?php } else { ?>
                          <option value="Pria">Pria</option>
                          <option value="Wanita" selected>Wanita</option>
                          <?php } ?>
                        </select>
                      </td>
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
  </div>
  <?php
  break;

  // Form Edit Password
  case "editpwd":
  $result =mysqli_query($connect,"SELECT * FROM guest WHERE guest_username='$_GET[id]'");
  $r      = mysqli_fetch_array($result);
  ?>
  <div class="cl-mcont">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=profile&act=editpwd" method="post" enctype="multipart/form-data" parsley-validate novalidate>
              <h3 class="title">Ubah Password</h3>
              <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                    <tr>
                      <td>
                        <label for="guest_username" class="control-label" >Username <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_username" readonly type="text" readonly class="form-control input-sm" id="guest_username" placeholder="Masukan Username" value='<?php echo $guest['guest_username'] ?>'/>
                      </td>
                    </tr>
                    <tr>
                      <td width="170">
                        <label for="guest_password" class="control-label">Password Baru <span class="required">*</span></label>
                      </td>
                      <td>
                        <input name="guest_password" type="password" id="guest_password" required class="form-control input-sm" size="30" minlength="6" maxlength="30" placeholder="Masukan Password Baru"/>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
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
  </div>
  <?php
  break;
} }?>
