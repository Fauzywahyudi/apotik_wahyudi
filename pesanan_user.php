<?php 
include 'koneksi.php';

$sql=mysqli_query($kon,"SELECT * from pesanan order by tgl_pesanan desc");


 ?>

 <div class="dh12 center">
	<h1><center>Daftar Pesanan User</center></h1>
      <table width="100%" >
        <thead>
        	<tr>
            <td colspan="9"><hr color="#5271FF"> </td>
          </tr>
          <tr class="bawah">
            <th  class="kepala">No</th>
            <th  class="kepala" align='center'>Nama User</th>
            <th  class="kepala" align='center'>ID Pesanan</th>
            <th  class="kepala" align='center'>Status</th>
            <th  class="kepala" align='center'>Tanggal Pesan</th>
            <th  class="kepala" align='center'>Aksi</th>
            <th></th>
          </tr>
          <tr>
            <td colspan="9"><hr color="#5271FF"> </td>
          </tr>
        </thead>
        <tbody>
        	<?php 
        	$sql=mysqli_query($kon,"SELECT * from pesanan order by tgl_pesanan desc");
        	$no=1;
        	while ($rm=mysqli_fetch_array($sql)) {
        		$sqlnm=mysqli_query($kon,"select * from tbl_user where username='$rm[username]'");
        		$rmm=mysqli_fetch_array($sqlnm);
                $d=substr($rm['tgl_pesanan'], 8);
                $m=substr($rm['tgl_pesanan'], 5,2);
                $y=substr($rm['tgl_pesanan'], 0,4);
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
        		

        		echo "<tr>
        		<td align='center'>$b1 $no $b2</td>
        		<td align='center'>$b1 $rmm[nama] $b2</td>
        		<td align='center'>$b1 $rm[id_pesanan] $b2</td>
        		<td align='center'>$b1 $rm[status_pesanan] $b2</td>
        		<td align='center'>$b1 $d-$m-$y $b2</td>
        		<td align='center'>
        		<a href='?p=detpesanan&id=$rm[id_pesanan]'><button class='btn btn-edit'>Detail </button></a>
        		</td>
        		</tr>

        		";

        		$no++;
        	}
        	?>
            <tr>
            <td colspan="9"><hr color="#5271FF"> </td>
          </tr>

          
        </tbody>
      </table>
    </div>