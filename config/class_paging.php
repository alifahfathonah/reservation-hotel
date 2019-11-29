<?php
// class paging untuk halaman administrator
class Paging{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (Awal) dan sebelumnya (Kembali)
if($halaman_aktif > 1){
	$Kembali = $halaman_aktif-1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=1><i class='fa fa-angle-double-left'></i></a></li>
                    <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$Kembali><i class='fa fa-angle-left'></i></a></li>";
}
else{
	$link_halaman .= "<li class='disabled'><a><i class='fa fa-angle-double-left'></i></a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a></li>";
  }
	  $angka .= "<li class='active'><a>$halaman_aktif</a></li>";

    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir)
if($halaman_aktif < $jmlhalaman){
	$Lanjut = $halaman_aktif+1;
	$link_halaman .= " <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$Lanjut><i class='fa fa-angle-right'></i></a></li>
                     <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman><i class='fa fa-angle-double-right'></i></a></li> ";
}
else{
	$link_halaman .= "  <li class='disabled'><a><i class='fa fa-angle-right'></i></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman berita (menampilkan semua berita)
class Paging2{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halproduk'])){
	$posisi=0;
	$_GET['halproduk']=1;
}
else{
	$posisi = ($_GET['halproduk']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (Awal) dan sebelumnya (Kembali)
if($halaman_aktif > 1){
	$Kembali = $halaman_aktif-1;
	$link_halaman .= "<a href=halproduk-1.html><< Awal</a> |
                    <a href=halproduk-$Kembali.html>< Kembali</a> | ";
}
else{
	$link_halaman .= "<< Awal | < Kembali | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=halproduk-$i.html>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";

    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=halproduk-$i.html>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=halproduk-$jmlhalaman.html>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir)
if($halaman_aktif < $jmlhalaman){
	$Lanjut = $halaman_aktif+1;
	$link_halaman .= " <a href=halproduk-$Lanjut.html>Lanjut ></a> |
                     <a href=halproduk-$jmlhalaman.html>Akhir >></a> ";
}
else{
	$link_halaman .= " Lanjut > | Akhir >>";
}
return $link_halaman;
}
}


// class paging untuk halaman kategoriblog (menampilkan berita per kategoriblog)
class Paging3{
function cariPosisi($batas){
if(empty($_GET['halkategoriblog'])){
	$posisi=0;
	$_GET['halkategoriblog']=1;
}
else{
	$posisi = ($_GET['halkategoriblog']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (Awal) dan sebelumnya (Kembali)
if($halaman_aktif > 1){
	$Kembali = $halaman_aktif-1;
	$link_halaman .= "<a href=halkategoriblog-$_GET[id]-1.html><< Awal</a> |
                    <a href=halkategoriblog-$_GET[id]-$Kembali.html>< Kembali</a> | ";
}
else{
	$link_halaman .= "<< Awal | < Kembali | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=halkategoriblog-$_GET[id]-$i.html>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";

    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=halkategoriblog-$_GET[id]-$i.html>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=halkategoriblog-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir)
if($halaman_aktif < $jmlhalaman){
	$Lanjut = $halaman_aktif+1;
	$link_halaman .= " <a href=halkategoriblog-$_GET[id]-$Lanjut.html>Lanjut ></a> |
                     <a href=halkategoriblog-$_GET[id]-$jmlhalaman.html>Akhir >></a> ";
}
else{
	$link_halaman .= " Lanjut > | Akhir >>";
}
return $link_halaman;
}
}

// =========================================================================

// class paging untuk halaman agenda (menampilkan semua agenda)
class Paging4{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halagenda'])){
	$posisi=0;
	$_GET['halagenda']=1;
}
else{
	$posisi = ($_GET['halagenda']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (Awal) dan sebelumnya (Kembali)
if($halaman_aktif > 1){
	$Kembali = $halaman_aktif-1;
	$link_halaman .= "<a href=halagenda-1.html><< Awal</a> |
                    <a href=halagenda-$Kembali.html>< Kembali</a> | ";
}
else{
	$link_halaman .= "<< Awal | < Kembali | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=halagenda-$i.html>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";

    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=halagenda-$i.html>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=halagenda-$jmlhalaman.html>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir)
if($halaman_aktif < $jmlhalaman){
	$Lanjut = $halaman_aktif+1;
	$link_halaman .= " <a href=halagenda-$Lanjut.html>Lanjut ></a> |
                     <a href=halagenda-$jmlhalaman.html>Akhir >></a> ";
}
else{
	$link_halaman .= " Lanjut > | Akhir >>";
}
return $link_halaman;
}
}

// =========================================================================

// class paging untuk halaman download (menampilkan semua download)
class Paging5{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['haldownload'])){
	$posisi=0;
	$_GET['haldownload']=1;
}
else{
	$posisi = ($_GET['haldownload']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (Awal) dan sebelumnya (Kembali)
if($halaman_aktif > 1){
	$Kembali = $halaman_aktif-1;
	$link_halaman .= "<a href=haldownload-1.html><< Awal</a> |
                    <a href=haldownload-$Kembali.html>< Kembali</a> | ";
}
else{
	$link_halaman .= "<< Awal | < Kembali | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=haldownload-$i.html>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";

    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=haldownload-$i.html>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=haldownload-$jmlhalaman.html>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir)
if($halaman_aktif < $jmlhalaman){
	$Lanjut = $halaman_aktif+1;
	$link_halaman .= " <a href=haldownload-$Lanjut.html>Lanjut ></a> |
                     <a href=haldownload-$jmlhalaman.html>Akhir >></a> ";
}
else{
	$link_halaman .= " Lanjut > | Akhir >>";
}
return $link_halaman;
}
}

// =========================================================================

// class paging untuk halaman galeri foto
class Paging6{
function cariPosisi($batas){
if(empty($_GET['halgaleri'])){
	$posisi=0;
	$_GET['halgaleri']=1;
}
else{
	$posisi = ($_GET['halgaleri']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (Awal) dan sebelumnya (Kembali)
if($halaman_aktif > 1){
	$Kembali = $halaman_aktif-1;
	$link_halaman .= "<a href=halgaleri-$_GET[id]-1.html><< Awal</a> |
                    <a href=halgaleri-$_GET[id]-$Kembali.html>< Kembali</a> | ";
}
else{
	$link_halaman .= "<< Awal | < Kembali | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=halgaleri-$_GET[id]-$i.html>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";

    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=halgaleri-$_GET[id]-$i.html>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=halgaleri-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir)
if($halaman_aktif < $jmlhalaman){
	$Lanjut = $halaman_aktif+1;
	$link_halaman .= " <a href=halgaleri-$_GET[id]-$Lanjut.html>Lanjut ></a> |
                     <a href=halgaleri-$_GET[id]-$jmlhalaman.html>Akhir >></a> ";
}
else{
	$link_halaman .= " Lanjut > | Akhir >>";
}
return $link_halaman;
}
}


// =========================================================================

// class paging untuk halaman komentar
class Paging7{
function cariPosisi($batas){
if(empty($_GET['halkomentar'])){
	$posisi=0;
	$_GET['halkomentar']=1;
}
else{
	$posisi = ($_GET['halkomentar']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (Awal) dan sebelumnya (Kembali)
if($halaman_aktif > 1){
	$Kembali = $halaman_aktif-1;
	$link_halaman .= "<a href=halkomentar-$_GET[id]-1.html><< Awal</a> |
                    <a href=halkomentar-$_GET[id]-$Kembali.html>< Kembali</a> | ";
}
else{
	$link_halaman .= "<< Awal | < Kembali | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=halkomentar-$_GET[id]-$i.html>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";

    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=halkomentar-$_GET[id]-$i.html>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=halkomentar-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir)
if($halaman_aktif < $jmlhalaman){
	$Lanjut = $halaman_aktif+1;
	$link_halaman .= " <a href=halkomentar-$_GET[id]-$Lanjut.html>Lanjut ></a> |
                     <a href=halkomentar-$_GET[id]-$jmlhalaman.html>Akhir >></a> ";
}
else{
	$link_halaman .= " Lanjut > | Akhir >>";
}
return $link_halaman;
}
}


class Paging8{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halblog'])){
	$posisi=0;
	$_GET['halblog']=1;
}
else{
	$posisi = ($_GET['halblog']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=halblog-1.html><< Awal</a> |
                    <a href=halblog-$prev.html>< Kembali</a> | ";
}
else{
	$link_halaman .= "<< Awal | < Kembali | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=halblog-$i.html>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";

    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=halblog-$i.html>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=halblog-$jmlhalaman.html>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir)
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=halblog-$next.html>Lanjut ></a> |
                     <a href=halblog-$jmlhalaman.html>Akhir >></a> ";
}
else{
	$link_halaman .= " Lanjut > | Akhir >>";
}
return $link_halaman;
}
}
?>
