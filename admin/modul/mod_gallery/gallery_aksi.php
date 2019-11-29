<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Hapus
if ($module=='gallery' AND $act=='hapus'){
  $result =mysqli_query($connect,"SELECT * FROM gallery WHERE gallery_id='$_GET[id]'");
  $r      = mysqli_fetch_array($result);

  unlink('../../assets/images/gallery/'.$r['gallery_photo']);
  unlink('../../assets/images/gallery/small_'.$r['gallery_photo']);

  $sql = "DELETE FROM gallery
          WHERE gallery_id = '$_GET[id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}


// Tambah
elseif ($module=='gallery' AND $act=='tambah'){

  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;
  
  UploadImageGallery($nama_file_unik);

  $sql = "INSERT INTO gallery (
            gallery_name,
            gallery_photo)
          VALUES (
            '$_POST[gallery_name]',
            '$nama_file_unik')";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Ubah
elseif ($module=='gallery' AND $act=='edit'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;


  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
  $sql = "UPDATE gallery SET
            gallery_name  = '$_POST[gallery_name]'
          WHERE gallery_id = '$_POST[gallery_id]'";
  } else {
    UploadImageGallery($nama_file_unik);
    unlink('../../assets/images/gallery/'.$_POST['gallery_photo']);
    unlink('../../assets/images/gallery/small_'.$_POST['gallery_photo']);

    
  $sql = "UPDATE gallery SET
  gallery_name  = '$_POST[gallery_name]',
  gallery_photo  = '$nama_file_unik'
WHERE gallery_id = '$_POST[gallery_id]'";
  }

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}
?>
