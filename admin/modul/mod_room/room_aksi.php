<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

$date = date("Y-m-d H:i:s");

// Hapus
if ($module=='room' AND $act=='hapus'){
  $result =mysqli_query($connect,"SELECT * FROM room WHERE room_id='$_GET[id]'");
  $r      = mysqli_fetch_array($result);

  unlink('../../assets/images/room/'.$r['room_photo']);
  unlink('../../assets/images/room/small_'.$r['room_photo']);

  $sql = "DELETE FROM room
          WHERE room_id = '$_GET[id]'";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Tambah
elseif ($module=='room' AND $act=='tambah'){

  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;

  $facilitys = $_POST['facility_id'];
  $facility = implode(',',$facilitys);

  $eats = $_POST['eat_id'];
  $eat = implode(',',$eats);

  UploadImageRoom($nama_file_unik);
  $sql = "INSERT INTO room (
            room_no,
            roomtype_id,
            classtype_id,
            facility_id,
            eat_id,
            room_people,
            room_price,
            room_photo)
          VALUES (
            '$_POST[room_no]',
            '$_POST[roomtype_id]',
            '$_POST[classtype_id]',
            '$facility',
            '$eat',
            '$_POST[room_people]',
            '$_POST[room_price]',
            '$nama_file_unik')";

  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}

// Ubah
elseif ($module=='room' AND $act=='edit'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;

  $facilitys = $_POST['facility_id'];
  $facility = implode(',',$facilitys);

  $eats = $_POST['eat_id'];
  $eat = implode(',',$eats);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){

  $sql = "UPDATE room SET
            room_no  = '$_POST[room_no]',
            roomtype_id  = '$_POST[roomtype_id]',
            classtype_id  = '$_POST[classtype_id]',
            facility_id  = '$facility',
            eat_id  = '$eat',
            room_people  = '$_POST[room_people]',
            room_price  = '$_POST[room_price]'
          WHERE room_id = '$_POST[room_id]'";
  } else {
    UploadImageRoom($nama_file_unik);
    unlink('../../assets/images/room/'.$_POST['room_photo']);
    unlink('../../assets/images/room/small_'.$_POST['room_photo']);
    $sql = "UPDATE room SET
    room_no  = '$_POST[room_no]',
    roomtype_id  = '$_POST[roomtype_id]',
    classtype_id  = '$_POST[classtype_id]',
    facility_id  = '$facility',
    eat_id  = '$eat',
    room_people  = '$_POST[room_people]',
    room_price  = '$_POST[room_price]',
    room_photo = '$nama_file_unik'
  WHERE room_id = '$_POST[room_id]'";
  }
  if (mysqli_query($connect, $sql)) {
    header('location:../../media.php?module='.$module);
  }
}
?>
