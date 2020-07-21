<?php
include 'koneksi.php';

$sql=mysqli_query($kon,"select * from tbl_obat where kd_obat='$_GET[kd]'");
$rm=mysqli_fetch_array($sql);
if(!empty($rm["foto"])){
	$foto = "obat/$rm[foto]";
}else{
	$foto = "obat/obat.png";
}

 ?>

 <script type="text/javascript">
 function total() {
   var total = parseInt(document.getElementById('harga').value) * parseInt(document.getElementById('jumlah_beli').value);
   document.getElementById('total').value = "Rp."+total+",00";
   document.getElementById('total_bayar').value = total;
	 var jml = parseInt(document.getElementById('jumlah_beli').value);
	 document.getElementById('jml').value = jml;
 }


 </script>
<div class="profil dh12">
  <center><h2>Tambahkan <?php echo "$rm[nm_obat]"; ?></h2></center>
  <br>
  <div class="dh4 card">
    <img src="<?php echo "$foto"; ?>" style="width:100%; height:100%;">
  </div>
  <div class="dh8 card">

      <table>
        <tr>
          <td><b>Nama Obat</b> </td>
          <td><input type="text" name="nama_obat" id="nama_obat" value="<?php echo "$rm[nm_obat]"; ?>" readonly> </td>

				</tr>
        <tr>
          <td><b>Harga</b> </td>
          <td><input type="text" name="harga" id="harga" value="<?php echo "$rm[harga]"; ?>" readonly > </td>
        </tr>
        <tr>
          <td><b>Stok</b> </td>
          <td><input type="text" name="stok" id="stok" value="<?php echo "$rm[stok]"; ?>" readonly> </td>
        </tr>
        <tr>
          <td><b>Jumlah Pesan</b> </td>
          <td><input type="number" name="jumlah_beli"  id="jumlah_beli" value="0" onchange="total()"> </td>
        </tr>
        <tr>
          <td><b>Jumlah Bayar</b> </td>
          <td><input type="text" name="total" id="total" value="" readonly> </td>
					<form class="" action="" method="post">
          <input type="hidden" name="total_bayar" id="total_bayar" value="">
					<input type="hidden" name="jml" id="jml" value="">
					<input type="hidden" name="namo" value="<?php echo "$rm[nm_obat]"; ?>">
        </tr>
        <tr>

        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="tambahkan" value="Tambahkan" class="btn btn-edit">
<a href='<?php echo "index.php?p=lihat_obat"; ?>'><button type='button' class="btn btn-back">Kembali</button></a>
<p></p>
          </td>
          </form>
        </tr>
      </table>
			<div class="dh3" align=left>

		  </div>

			<?php

			if (isset($_POST['tambahkan'])) {
				$stok=$rm['stok'];
				$jml_beli=$_POST['jml'];

				if ($jml_beli>$stok) {
					echo "Maaf Stok tidak Cukup";
				}else {
					$sqlcek=mysqli_query($kon,"SELECT * FROM keranjang WHERE kd_obat='$_GET[kd]' AND username='$_SESSION[user]' and status='Belum'");
					$cek=mysqli_num_rows($sqlcek);
					if ($cek==0) {
						$keran=mysqli_query($kon,"INSERT INTO keranjang values ('$_SESSION[user]','$_GET[kd]','$_POST[jml]','$_POST[total_bayar]','Belum',null)");
						echo "<script>
						alert('Berhasil Ditambahkan');
						</script>
						";
							echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=keranjang'>";
					}else {
						echo "<b>Anda Sudah Menambahkan $_POST[namo] ke dalam Keranjang</b>";
					}


				}




			}

			 ?>


  </div>
</div>
