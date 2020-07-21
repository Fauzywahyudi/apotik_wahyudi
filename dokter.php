<?php include 'koneksi.php';

 ?>
 <div class="dh9">
   <div class="card">
     <center><h1>Kelola Dokter</h1></center>

     <a href="<?php echo "?p=inp_dokter"; ?>"><button type="button" name="tambah" class="btn btn-edit">Tambah Data</button></a><p></p>
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
         <th>Aksi</th>
       </tr>
       <tr>
            <td colspan="8"><hr color="#5271FF"> </td>
          </tr>
       <?php
       $sql=mysqli_query($kon,"select * from tbl_dokter");
       while ($rm=mysqli_fetch_array($sql)) {
         echo "<tr>
         <th>$rm[username]</th>
         <td><b>$rm[nama]</b></td>
         <td><b>$rm[pekerjaan]</b></td>
         <th>$rm[nohp]</th>
         <th><a href='damin.php?p=profildokmin&user=$rm[username]'><button type='button' class='btn btn-edit'>Detail</button></a>

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
 <div class="dh3">
   <?php include "dokteronline.php"; ?>
 </div>
