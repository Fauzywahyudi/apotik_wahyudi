<?php 
include 'koneksi.php';

$sqljum=mysqli_query($kon, "SELECT id_pesanan from pesanan order by id_pesanan desc limit 1");
$jum=mysqli_fetch_array($sqljum);
$rjum=mysqli_num_rows($sqljum);
if ($rjum==0) {
	$id=1;
}else{
	$id=$jum['id_pesanan']+1;
}

$sqlcek=mysqli_query($kon,"SELECT * from pesanan where username='$_SESSION[user]' and status_pesanan='Belum Diambil'");
$cek=mysqli_num_rows($sqlcek);
if ($cek>0) {
	?>
<script type="text/javascript">
	alert('Sebelumnya Anda Sudah Memesan, dan Belum Diambil');
	window.location="?p=pesanan";
</script>

<?php
}else{

	$sql=mysqli_query($kon, "SELECT * from keranjang a inner join tbl_obat b on a.kd_obat=b.kd_obat where username='$_SESSION[user]' and status='Belum'");

$isi_pesan="";
while ($rm=mysqli_fetch_array($sql)) {
	
	$sisa=$rm['stok']-$rm['jumlah'];
	$isi_pesan="$isi_pesan <br>$rm[nm_obat] x $rm[jumlah]";
	mysqli_query($kon,"UPDATE tbl_obat set stok='$sisa' where kd_obat='$rm[kd_obat]'");
}
$sqlm=mysqli_query($kon, "SELECT SUM(jumlah_bayar) as total_bayar from keranjang where username='$_SESSION[user]' and status='Belum'");
$rmm=mysqli_fetch_array($sqlm);
mysqli_query($kon,"INSERT into pesanan (id_pesanan,username,isi_pesanan,total_bayar,status_pesanan,tgl_pesanan) values ('$id','$_SESSION[user]','$isi_pesan','$rmm[total_bayar]','Belum Diambil',NOW())");

mysqli_query($kon, "UPDATE  keranjang set status='Sudah', id_pesanan=$id where username='$_SESSION[user]' and status='Belum'");

echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=notice'>";

}



 ?>