<?php
//BUAT PRODUK//////////////////////////////////////////////
function UploadImage($fupload_name){
  $vdir_upload = "../../assets/images/website/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 129;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "small_" . $fupload_name);
      }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
///////////////////////////////////////////////


//BUAT PRODUK//////////////////////////////////////////////
function UploadImageSlide($fupload_name){
  $vdir_upload = "../../assets/images/slide/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 129;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "small_" . $fupload_name);
      }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
///////////////////////////////////////////////


function UploadImageRoom($fupload_name){
  $vdir_upload = "../../assets/images/room/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 129;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "small_" . $fupload_name);
      }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
///////////////

function UploadImageInvoice($fupload_name){
  $vdir_upload = "../../admin/assets/images/invoice/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 129;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "small_" . $fupload_name);
      }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
///////////////

//BUAT blog//////////////////////////////////////////////
function Uploadblog($fupload_name){
  $vdir_upload = "../../../foto_blog/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 129;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "small_" . $fupload_name);
      }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
////////////////////////////////////////////////



//BUAT HEADER//////////////////////////////////////////////
function UploadHeader($fupload_name){
  //direktori Header
  $vdir_upload = "../../../header/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
////////////////////////////////////////////////


//BUAT BANNER//////////////////////////////////////////////
function UploadBanner($fupload_name){
  //direktori banner
  $vdir_upload = "../../../foto_banner/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
////////////////////////////////////////////////


//BUAT DOWNLOAD//////////////////////////////////////////////
function UploadFile($fupload_name){
  //direktori file
  $vdir_upload = "../../../files/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
////////////////////////////////////////////////


//BUAT ALBUM//////////////////////////////////////////////
function UploadAlbum($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../img_album/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 120 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 120;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "kecil_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "kecil_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "kecil_" . $fupload_name);
      }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
////////////////////////////////////////////////


//BUAT PRODUK//////////////////////////////////////////////
function UploadImageGallery($fupload_name){
  $vdir_upload = "../../assets/images/gallery/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 129;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "small_" . $fupload_name);
      }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
///////////////////////////////////////////////



//BUAT INFO//////////////////////////////////////////////
function UploadInfo($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../foto_info/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 54 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 54;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "kecil_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "kecil_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "kecil_" . $fupload_name);
      }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
///////////////////////////////////////////////


//BUAT LOGO//////////////////////////////////////////////
function UploadLogo($fupload_name){
  //direktori Logo
  $vdir_upload = "../../../logo/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
////////////////////////////////////////////////


?>
