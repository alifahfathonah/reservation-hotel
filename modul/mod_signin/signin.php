<?php

include "config/fungsi_indotgl.php";
include "config/class_paging.php";

$aksi="modul/mod_signin/signin_aksi.php";
if (!empty($_SESSION['guest_username']) AND !empty($_SESSION['guest_password'])){
  echo "<script>location='media.php?module=home';</script>";
} else { 
?>
  <div class="cl-mcont" style="min-height: 400px">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=signin" method="post" enctype="multipart/form-data"
              parsley-validate novalidate>
              <div class="table-responsive">
                <table class="table no-border hover">
                  <tbody class="no-border-y">
                    <tr>
                      <td>
                        <label for="guest_username" class="control-label">Username
                          <span class="required">*</span>
                        </label>
                      </td>
                      <td>
                        <input name="guest_username" type="text" required class="form-control input-sm" id="guest_username" placeholder="Masukan Username"
                        />
                      </td>
                    </tr>
                    <tr>
                      <td width="230">
                        <label for="guest_password" class="control-label">Password
                          <span class="required">*</span>
                        </label>
                      </td>
                      <td>
                        <input name="guest_password" type="password" required class="form-control input-sm" id="guest_password" placeholder="Masukan Password"
                        />
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div </form>
              </div>
              <div class='center'>
                <input class="btn btn-primary" type="submit" name="simpan" value="Masuk">
                <input class="btn btn-default" type="reset" name="batal" value="Belum punya akun? Daftar" onclick="location.href='?module=signup'" />
              </div>
          </div>
        </div>
      </div>
    </div>
    </div>
<?php } ?>