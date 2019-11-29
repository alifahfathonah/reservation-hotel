<?php
session_start();
ob_start();
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/fungsi_rupiah.php";

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Transaksi</title>
</head>
<body>
<?php 
       $results = mysqli_query($connect, "SELECT * FROM invoice WHERE invoice_id='$_GET[id]'");
       $invoice      = mysqli_fetch_array($results);
       $result2 = mysqli_query($connect, "SELECT * FROM guest WHERE guest_username='$invoice[guest_username]'");
       $guest      = mysqli_fetch_array($result2);
       ?>

			<div class="title">Detail Pemesanan #<?php echo $_GET['id'] ?></div>
                                    <small>
                                        Username : <?php echo $guest['guest_username']; ?>
                                        <br> Nama : <?php echo $guest['guest_name']; ?>
                                        <br> Alamat : <?php echo $guest['guest_address']; ?>
                                        <br> No Telp : <?php echo $guest['guest_notelp']; ?>
                                        <br> <br>Pembayaran : <?php echo $invoice['invoice_status']; ?>
                                    </small>
				<div class="center">
								<table class="border">
									<thead>
										<tr>
                                        <th>ID</th>
                                        <th>Kamar</th>
                                        <th>Lama Hari</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Dibuat</th>
										</tr>
									</thead>
									<tbody>
									<?php
                                            $result=mysqli_query($connect,"SELECT * FROM transaction WHERE invoice_id='$_GET[id]'");
                                            $jmldata = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM transaction WHERE invoice_id='$_GET[id]'"));
										if(mysqli_num_rows($result) === 0) {
										?>
										<tr>
											<td  style="text-align:center" colspan="6">Data kosong...</td>
										</tr>
										<?php } else {
										 $no = 1;
										 while ($r=mysqli_fetch_array($result)) {
										 $tanggal=tgl_indo($r['transaction_created']);
										 $transaction_price=format_rupiah($r['transaction_price']);
										 $transaction_totalprice=format_rupiah($r['transaction_totalprice']);
										 ?>
									 <tr>
										 <td>
											 <?php echo $r['transaction_id'];?>
										 </td>
										 <td>
											 <?php echo $r['room_id'];?>
										 </td>
										 <td>
											 <?php echo $r['transaction_qty'];?> Hari
										 </td>
										 <td>
											 Rp<?php echo $transaction_price;?>,00
										 </td>
										 <td>
											 Harga: Rp<?php echo $transaction_totalprice;?>,00 <br>
											 Booking: Rp<?php echo $transaction_totalprice * (20/100);?>,00
										 </td>
										 <td>Dibuat: <?php echo tgl_indo($r['transaction_created']) ?><br>
										Check In: <?php echo tgl_indo($r['transaction_checkin']) ?><br>
										Check Out: <?php echo tgl_indo($r['transaction_checkout']) ?></td>
										 <?php $no++; } ?>
										</tr>
										<?php } ?>
									</tbody>
									<tbody>
										<tr>
											<?php
												$result = mysqli_query($connect, "SELECT SUM(transaction_totalprice) AS transaction_totalprice FROM transaction  WHERE invoice_id='$_GET[id]'");
												$row = mysqli_fetch_assoc($result);  
												$sum = $row['transaction_totalprice'];
											?>
											<td colspan="5">Total Harga</td>
											<td colspan="1">Rp<?php echo format_rupiah($sum); ?>,00</td>
										</tr>
									</tbody>
								</table>


								</div>
</body>
</html>
<?php
$filename="Transaksi-".$_GET['id'].".pdf"; 
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
$content .= "<style>\n " . file_get_contents('pdf.css') . "</style>";

 require_once(dirname(__FILE__).'../../../config/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(15, 10, 15, 10));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>
