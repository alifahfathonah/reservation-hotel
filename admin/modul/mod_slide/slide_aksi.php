<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Hapus
if ($module=='slide' AND $act=='hapus'){
  $result =mysqli_query($connect,"SELECT * FROM slide WHERE slide_id='$_GET[id]'");
  $r      = mysqli_fetch_array($result);

  unlink('../../assets/images/slide/'.$r['slide_photo']);
  unlink('../../assets/images/slide/small_'.$r['slide_photo']);

  $sql = "DELETE FROM slide
          WHERE slide_id = '$_GET[id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}


// Tambah
elseif ($module=='slide' AND $act=='tambah'){

  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;
  
  UploadImageSlide($nama_file_unik);

  $sql = "INSERT INTO slide (
            slide_name,
            slide_photo)
          VALUES (
            '$_POST[slide_name]',
            '$nama_file_unik')";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Ubah
elseif ($module=='slide' AND $act=='edit'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;


  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
  $sql = "UPDATE slide SET
            slide_name  = '$_POST[slide_name]'
          WHERE slide_id = '$_POST[slide_id]'";
  } else {
    UploadImageSlide($nama_file_unik);
    unlink('../../assets/images/slide/'.$_POST['slide_photo']);
    unlink('../../assets/images/slide/small_'.$_POST['slide_photo']);

    
  $sql = "UPDATE slide SET
  slide_name  = '$_POST[slide_name]',
  slide_photo  = '$nama_file_unik'
WHERE slide_id = '$_POST[slide_id]'";
  }

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}
?>
