<?php include 'koneksi.php';

 ?>
 <div class="dh12">
   <div class="card">
     <center><h1>Dokter Apotek Wahyudi</h1></center>

     
     <br>
     <table style="border: 2px solid #5271FF" width="100%">
          <tr>
            <td colspan="8" align="center"><h2>Daftar Dokter</h2> </td>
          </tr>
          <tr>
            <td colspan="8"><hr color="#5271FF"> </td>
          </tr>
       <tr>
         <th>Username</th>
         <td> <b>Nama Lengkap </b></td>
         <td><b>Spesialis </b></td>
         <th>No HP</th>
         <th>Status</th>
         <th>Aksi</th>
       </tr>
       <tr>
            <td colspan="8"><hr color="#5271FF"> </td>
          </tr>
       <?php
       $sql=mysqli_query($kon,"select * from tbl_dokter");
       while ($rm=mysqli_fetch_array($sql)) {
       	if ($rm['status']==1) {
       		$stat="<font style='color: green'>Online </font>";
       	}else{
       		$stat="<font style='color: gray'>Offline </font>";
       	}
         echo "<tr>
         <th>$rm[username]</th>
         <td><b>$rm[nama]</b></td>
         <td><b>$rm[pekerjaan]</b></td>
         <th>$rm[nohp]</th>
         <th>$stat</th>
         <th><a href='index.php?p=waldokser&user=$rm[username]'><button type='button' class='btn btn-edit'>Lihat Jadwal</button></a>

         </th>
         </tr>";
         echo "<tr>
            <td colspan='8'><hr color='#5271FF'> </td>
          </tr>";
       }
        ?>
     </table>
     <br>
   </div>
 </div>
 
