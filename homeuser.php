<?php
include 'koneksi.php';

$sqluser=mysqli_query($kon,"Select * from tbl_user where username='$_SESSION[user]'");
$rmuser=mysqli_fetch_array($sqluser);
echo "<center><h1><b>Selamat Datang $rmuser[nama]</b></h1></center>";

 ?>
<div class="profil grid">



<?php 
  $sqlan=mysqli_query($kon,"SELECT * from antrian where username='$_SESSION[user]' and status='Menunggu'") ;
  $rowan=mysqli_num_rows($sqlan);

  if ($rowan==0) {
  	echo "<h2>Anda Belum Mengambil Nomor Antrian</h2>";
  	echo "<h3>Silahkan Ambil Antrian Anda Disini <a href='index.php?p=antrian'><button class='btn btn-edit'>Ambil</button></a></h3>";
  }else{
  	echo "<h2>Nomor Antrian Anda</h2>";
  }

  while ($ran=mysqli_fetch_array($sqlan)) {
  	if ($ran['jenis']=="Umum") {
  		$bgcolor="gray";
  		$color="black";
  	}else if($ran['jenis']=="THT"){
  		$bgcolor="pink";
  		$color="red";
  	}else if($ran['jenis']=="Mata"){
  		$bgcolor="skyblue";
  		$color="blue";
  	}else{
  		$bgcolor="yellow";
  		$color="black";
  	}
  	
  	echo "<div class='dh3 card' style='background-color: $bgcolor ; color: $color;padding: 10px'>

  		<center><h2>$ran[jenis]</h2></center>
  		<center>
  		<h1>$ran[kode]</h1>
  		</center>

  	</div>";
  }

  ?>

</div>
<div class="profil grid">
  <h2>*Fitur Terbaru Kami (Sistem Pakar)</h2>
  <p><b>Sistem Pakar Diagnosa Penyakit Kulit Pada Wajah (Acne Vulgaris).</b></p>
  <p><b>Penasaran?? Langsung Saja Klik Tombol  <a href="?p=konsul"><button class="btn btn-edit">>> Ini <<</button></a></b></p>

</div>
