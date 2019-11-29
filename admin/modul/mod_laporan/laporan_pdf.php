<?php
session_start();
ob_start();
include_once("../../../config/koneksi.php");
include "../../../config/fungsi_indotgl.php";
include "../../../config/fungsi_rupiah.php";

?>
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Laporan Transaksi</title>
	</head>

	<body>
		<div class="title">Laporan Transaksi</div>
		<?php
           if (empty(isset($_GET['filter'])) AND empty(isset($_GET['filter2']))) {  ?>
			<div class="subtitle">Keseluruhan</div>
			<?php } else { ?>
				<div class="subtitle">
					Transaksi dari <?php echo tgl_indo($_GET['filter']." 00:00:00") ?> sampai	<?php echo tgl_indo($_GET['filter2']." 00:00:00") ?>
				</div>
			<?php } ?>
				<div class="center">
					<table class="border">
						<thead>
							<tr>
								<th>ID</th>
								<th>Menu</th>
								<th>QTY</th>
								<th>Harga</th>
								<th>Total Harga</th>
								<th>Dibuat</th>
								<th>Checkin</th>
								<th>Checkout</th>
								<th>Hari</th>
							</tr>
						</thead>
						<tbody>
							<?php
                                        if (empty(isset($_GET['filter'])) AND empty(isset($_GET['filter2']))) { 
						$result=mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status = 'done'");
						$jmldata = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status = 'done'"));
										} else {
											$result=mysqli_query($connect,"SELECT * FROM transaction WHERE transaction_status='done' AND transaction_created
											BETWEEN '$_GET[filter] 00:00:00' AND '$_GET[filter2] 00:00:00'");
										$jmldata = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM transaction WHERE transaction_status='done' AND transaction_created
										BETWEEN '$_GET[filter] 00:00:00' AND '$_GET[filter2] 00:00:00'"));
										}
						if(mysqli_num_rows($result) === 0) {
						?>
								<tr>
									<td style="text-align:center" colspan="9">Data kosong...</td>
								</tr>
								<?php } else {
										 $no = 1;
										 while ($r=mysqli_fetch_array($result)) {
										 $tanggal=tgl_indo($r['transaction_created']);
										 $transaction_price=format_rupiah($r['transaction_price']);
										 $transaction_totalprice=format_rupiah($r['transaction_totalprice']);
										 ?>
								<tr>
									<td><?php echo $r['transaction_id'];?></td>
									<td><?php echo $r['room_id'];?></td>
									<td><?php echo $r['transaction_qty'];?> Kamar</td>
									<td>Rp<?php echo $transaction_price;?>,00</td>
									<td>Rp<?php echo $transaction_totalprice;?>,00</td>
									<td><?php echo $tanggal?></td>
                                    <td><?php echo tgl_indo($r['transaction_checkin']) ?></td>
                                    <td><?php echo tgl_indo($r['transaction_checkout']) ?></td>
									<td><?php echo $r['transaction_day'];?> Hari</td>
								</tr>
								<?php $no++; } ?>
								<?php } ?>
						</tbody>
						<tbody>
							<tr>
								<?php
                                        if (empty(isset($_GET['filter'])) AND empty(isset($_GET['filter2']))) { 
												$result = mysqli_query($connect, "SELECT SUM(transaction_totalprice) AS transaction_totalprice FROM transaction WHERE transaction_status = 'done'"); 
										} else {
											$result=mysqli_query($connect,"SELECT SUM(transaction_totalprice) AS transaction_totalprice FROM transaction WHERE transaction_status='done' AND transaction_created
                                            BETWEEN '$_GET[filter] 00:00:00' AND '$_GET[filter2] 00:00:00'");
										}
												$row = mysqli_fetch_assoc($result);  
												$sum = $row['transaction_totalprice'];
											?>
									<td colspan="4">Total Pendapatan</td>
									<td colspan="5">Rp <?php echo format_rupiah($sum); ?>,00</td>
							</tr>
						</tbody>
					</table>
				</div>
	</body>

	</html>
	<?php
$filename="Laporan.pdf"; 
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
$content .= "<style>\n " . file_get_contents('pdf.css') . "</style>";

 require_once(dirname(__FILE__).'../../../../config/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(15, 10, 15, 10));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>