<?php

include "config/fungsi_indotgl.php";
include "config/class_paging.php";

$aksi="modul/mod_signup/signup_aksi.php";
if (!empty($_SESSION['guest_username']) AND !empty($_SESSION['guest_password'])){
  echo "<script>location='media.php?module=home';</script>";
} else { 
?>
  <div class="cl-mcont">
    <div class="row">
      <div class="col-md-12">
        <div class="block-flat">
          <div class="content">
            <form role="form" class="form-horizontal" action="<?php echo $aksi ?>?module=signup" method="post" enctype="multipart/form-data"
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
                    <tr>
                      <td>
                        <label for="guest_name" class="control-label">Nama
                          <span class="required">*</span>
                        </label>
                      </td>
                      <td>
                        <input name="guest_name" type="text" required class="form-control input-sm" id="guest_name" placeholder="Masukan Nama" />
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="guest_address" class="control-label">Alamat
                          <span class="required">*</span>
                        </label>
                      </td>
                      <td>
                        <input name="guest_address" type="text" id="guest_address" required class="form-control input-sm" size="255" maxlength="255"
                          placeholder="Masukan Alamat" />
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="guest_notelp" class="control-label">No Telp
                          <span class="required">*</span>
                        </label>
                      </td>
                      <td>
                        <input name="guest_notelp" type="text" id="guest_notelp" required class="form-control input-sm" size="12" maxlength="12"
                          placeholder="Masukan No Telp" />
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="guest_age" class="control-label">Umur
                          <span class="required">*</span>
                        </label>
                      </td>
                      <td>
                        <input name="guest_age" type="number" id="guest_age" required class="form-control input-sm" size="12" maxlength="12" placeholder="Masukan Umur"
                        />
                      </td>
                    </tr>
                    <tr>
                      <td width="130">
                        <label for="guest_gender" class="control-label">Jenis Kelamin
                          <span class="required">*</span>
                        </label>
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
              <div </form>
              </div>
              <div class='center'>
                <input class="btn btn-primary" type="submit" name="simpan" value="Daftar">
                <input class="btn btn-default" type="reset" name="batal" value="Coba Masuk" onclick="location.href='?module=signin'" />
              </div>
          </div>
        </div>
      </div>
    </div>
    </div>
<?php } ?>