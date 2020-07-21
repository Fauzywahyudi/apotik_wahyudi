<?php include 'koneksi.php'; 
$user=mysqli_query($kon,"SELECT * from tbl_user where username='$_SESSION[user]'");
$us=mysqli_fetch_array($user);
?>
<div class="dh12 center">
	<h1><center>History Pesanan Anda</center></h1>
      <table width="100%" >
        <thead>
        	<tr>
            <td colspan="7"><hr color="#5271FF"> </td>
          </tr>
          <tr class="bawah">
            <th  class="kepala">No</th>
            <th  class="kepala" align='center'>ID Pesanan</th>
            <th  class="kepala" align='center'>Isi Pesanan</th>
            <th  class="kepala" align='center'>Total Bayar</th>
            <th  class="kepala" align='center'>Status</th>
            <th  class="kepala" align='center'>Tanggal Pesan</th>
            <th  class="kepala" align='center'>Tanggal Diambil</th>
            <th></th>
          </tr>
          <tr>
            <td colspan="7"><hr color="#5271FF"> </td>
          </tr>
        </thead>
        <tbody>
        	<?php $sql=mysqli_query($kon,"SELECT * from pesanan where username='$_SESSION[user]' order by tgl_pesanan desc");
        	$rowp=mysqli_num_rows($sql);
        	$no=1; 
        	while ($rm=mysqli_fetch_array($sql)) {
        		if ($rm['tgl_diambil']==null) {
        			$tglambil="-";
        		}else{
            $dd=substr($rm['tgl_diambil'], 8);
            $mm=substr($rm['tgl_diambil'], 5,2);
            $yy=substr($rm['tgl_diambil'], 0,4);
        			$tglambil="$dd-$mm-$yy";
        		}

        		if ($rm['status_pesanan']=="Belum Diambil") {
                    $b1="<b>";
                    $b2="</b>";
                }else if($rm['status_pesanan']=="Dibatalkan"){
                    $b1="<font color='red'>";
                    $b2="</font>";
                }
                else{
                    $b1="<font color='green'>";
                    $b2="</font>";
                }
            $d=substr($rm['tgl_pesanan'], 8);
            $m=substr($rm['tgl_pesanan'], 5,2);
            $y=substr($rm['tgl_pesanan'], 0,4);

        		$isi=substr($rm['isi_pesanan'], 5);
        		$tot=number_format($rm['total_bayar'], 0, ".", ".");


        		echo "<tr>
        		<td align='center'>$b1 $no $b2</td>
        		<td align='center'>$b1 $rm[id_pesanan] $b2</td>
        		<td align='center'>$b1 $isi $b2</td>
        		<td align='center'>$b1 Rp. $tot  $b2</td>
        		<td align='center'>$b1 $rm[status_pesanan] $b2</td>
        		<td align='center'>$b1 $d-$m-$y $b2</td>
        		<td align='center'>$b1 $tglambil $b2</td>
        		</tr>";
        		echo " <tr>
            <td colspan=7><hr color='#5271FF'> </td>
          </tr>";
        		$no++;
        	}

        	if ($rowp==0) {
        		echo " <tr>
            <td colspan=7 align='center'> <b>Anda Belum Pernah Memesan Obat </b></td>
          </tr>";
          echo " <tr>
            <td colspan=7><hr color='#5271FF'> </td>
          </tr>";
        	}
        	?>

          
        </tbody>
      </table>

      <?php $sqlcekp=mysqli_query($kon,"SELECT * from pesanan where username='$_SESSION[user]' and status_pesanan='Belum Diambil'") ;
      $cekp=mysqli_num_rows($sqlcekp);

      if ($cekp>0) {
      	echo " <div class='dh12' style='background-color: lightgreen; color: green; text-align: left; margin: 10px;'>
      	
      	<p><b>Terima Kasih $us[nama]. Sudah Memesan Obat serta Mempercayakannya Kepada Kami.</b><br></p>
      	
      </div>
      <div class='dh12' style='background-color: pink; color: red; text-align: left; margin: 10px;'>
      	
      	<p><b>Jika</b> Anda <b>Tidak Mengambil Pesanan</b> yang <b>Sudah di Pesan</b>. <br></p>
      	<p><b>Maka</b> Untuk <b>Selanjutnya</b> Anda <b>Tidak Dapat Memesan</b> Obat Lagi. <br></p>
      	<p><b>Jika</b> Anda <b>Ingin Membatalkan Pesanan</b>, Anda <b> Harus Konfirmasi Langsung</b> Kepada <b>Apoteker</b>.<br></p>
      	<p>Kami <b>Menerapkan Sistem</b> Seperti ini <b>Supaya :</b>  <br></p>  
      	<b>*Meminimalkan Kemungkin Seseorang Memesan dengan Asal-asalan dan Tidak Bertanggung Jawab.</b><br>
      	<p>

      </div>";
      }
      ?>
     
    </div>