<?php include 'koneksi.php'; 

$sql=mysqli_query($kon, "SELECT * from pesanan where username='$_SESSION[user]' order by id_pesanan desc limit 1");
$rm=mysqli_fetch_array($sql);
$sqlnm=mysqli_query($kon,"SELECT * from tbl_user where username='$_SESSION[user]'");
$nm=mysqli_fetch_array($sqlnm);
?>

<div class="dh12">
	<center>
		<div class="dh12" style="background-color: lightgreen; padding: 10px; text-align: center; color: green;">
			<h2>Pesanan Sudah di Konfirmasi </h2> <br> 
			<p>Anda  <b>Berhasil</b> Memesan Obat. <br> <br>
			 Cara Pengambilannya : Cukup Sebutkan <b>ID Pesanan</b> dan <b>Nama Anda</b> kepada Apoteker.</p>
			<center>
			<table>
				<tr>
					<td><b>ID Pesanan</b></td>
					<td>:</td>
					<td ><b><?php echo "$rm[id_pesanan]"; ?></b></td>
				</tr>
				<tr>
					<td><b>Nama Pemesan</b></td>
					<td>:</td>
					<td><b><?php echo "$nm[nama]"; ?></b></td>
				</tr>
			</table>
			</center>

	</div></center>
	
</div>