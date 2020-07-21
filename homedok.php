<?php
include 'koneksi.php';

$sqluser=mysqli_query($kon,"Select * from tbl_dokter where username='$_SESSION[user]'");
$rmuser=mysqli_fetch_array($sqluser);
echo "<center><h1><b>Selamat Datang $rmuser[nama]</b></h1></center>";

 ?>
<div class="profil">

  <?php
  $sqlant=mysqli_query($kon,"select * from antrian where jenis='$rmuser[pekerjaan]' and status='Menunggu'");
  $ant=mysqli_num_rows($sqlant);
  if ($ant==0) {
    $antri="Tidak Ada";
    echo "<h3>Hari ini $antri pasien yang mengambil nomor antrian untuk berkonsultasi dengan Anda</h3>";
  }else{
    $antri=$ant;
    echo "<h3>Hari ini Ada $antri pasien yang sudah mengambil nomor antrian untuk berkonsultasi dengan Anda</h3>";
  }

  

   ?>
   <table border="1"style="border:2px solid blue">
     <tr>
       <th>NO</th>
       <th>KODE ANTRIAN</th>
       <th>NAMA PASIEN</th>
       <th>JENIS KELAMIN</th>
     </tr>
     <?php

     $no=1;
     while ($rant=mysqli_fetch_array($sqlant)) {

       $sqlnm=mysqli_query($kon,"select * from tbl_user where username='$rant[username]'");
       $nm=mysqli_fetch_array($sqlnm);
       if ($nm['jk']=="L") {
         $jk="Laki-laki";
       }else {
         $jk="Perempuan";
       }
       echo "<tr>
       <th>$no</th>
       <th>$rant[kode]</th>
       <th>$nm[nama]</th>
       <th>$jk</th>
       </tr>
       ";

       $no++;
     }
     if ($ant==0) {
       echo "<tr>
       <th colspan='4'> <b>Antrian Tidak Ada</b>
       </th></tr>";
     }

      ?>
   </table>


</div>
