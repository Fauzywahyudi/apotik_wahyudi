<?php

include 'koneksi.php';

$sqluser=mysqli_query($kon,"Select * from tbl_dokter where username='$_SESSION[user]'");
$rmuser=mysqli_fetch_array($sqluser);

 ?>
<center><h1>Atur Antrian</h1></center>

<div class="profil grid">
  <div class="dh4 ">
    <center><h2>Daftar Antrian</h2></center>
    <?php
    $sqlant=mysqli_query($kon,"select * from antrian where jenis='$rmuser[pekerjaan]' and status='Menunggu'");

    $ant=mysqli_num_rows($sqlant);


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
         $nmrow=mysqli_num_rows($sqlnm);
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
         <th colspan='4'> <b>Antrian Sudah Habis</b>
         </th></tr>";
       }

        ?>
</table>
<p></p>
     <form class="" action="" method="post">
       <center><input type="submit" name="next" value="Antrian Selanjutnya" class="btn btn-edit"></center>
     </form>
<p></p>
<?php

if (isset($_POST['next'])) {


$sqlj=mysqli_query($kon,"select * from antrian where jenis='$rmuser[pekerjaan]' and status='Berjalan'");
$rbj=mysqli_fetch_array($sqlj);
$rowj=mysqli_num_rows($sqlj);
$sql=mysqli_query($kon,"select * from antrian where jenis='$rmuser[pekerjaan]' and status='Menunggu' order by substring(kode,4,3) asc");
$rb=mysqli_fetch_array($sql);
$row=mysqli_num_rows($sql);
if ($rowj>0) {

  if ($row==0) {
    echo "<h2>Antrian Sudah Habis</h2>";

  }else {
    $antawal=substr($rbj['kode'],3,3);
    $kodeant=substr($rbj['kode'],0,2);
    $antjal=$antawal+1;
    if (strlen($antjal)==1) {
      $antbaru="$kodeant-00$antjal";
    }else if (strlen($antjal)==2) {
      $antbaru="$kodeant-0$antjal";
    }else if (strlen($antjal)==3) {
      $antbaru="$kodeant-$antjal";
    }


    echo "antrian Selanjutnya adalah $antbaru";
    echo "<p>";

    mysqli_query($kon,"update antrian set status='Berjalan' where kode='$antbaru'");

  }

  mysqli_query($kon,"update antrian set status='Selesai' where kode='$rbj[kode]'");

}else {

  if ($row==0) {
    echo "<h2>Antrian Sudah Habis</h2>";
  }else {
    $antjal=$rb['kode'];
    echo "Antrian Sekarang $antjal";
    mysqli_query($kon,"update antrian set status='Berjalan' where kode='$antjal'");



  }

  //echo "<h2>Antrian Sudah Habis</h2>";
}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=dok.php?p=atur_antri'>";
}
 ?>
  </div>
  <div class="dh8 ">
    <center><h2>Informasi Pasien</h2></center>
    <?php
    $sqldata= mysqli_query($kon,"select * from antrian where jenis='$rmuser[pekerjaan]' and status='Berjalan'");
    $data=mysqli_fetch_array($sqldata);
    $cek=mysqli_num_rows($sqldata);

    if ($cek==1) {
      $datauser=mysqli_query($kon,"select * from tbl_user where username='$data[username]'");
      $duser=mysqli_fetch_array($datauser); ?>
      <div class="dh4">
        <?php
        if(!empty($duser["foto"])){
        	$foto = "foto/$duser[foto]";
        }else{
        	$foto = "foto/avatar.png";
        }
        ?>
        <img src="<?php echo "$foto"; ?>" alt="Avatar" style="width:100%">
        <p></p>
      </div>
      <div class="dh8">
        <?php
        echo "<table>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td>$duser[nama]</td>
        </tr>
        <tr>
          <td>Pekerjaan</td>
          <td>:</td>
          <td>$duser[pekerjaan]</td>
        </tr>
        <tr>
          <td>Panggilan</td>
          <td>:</td>
          <td>$duser[panggilan]</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td>$duser[alamat]</td>
        </tr>
        <tr>
          <td>Nomor HP</td>
          <td>:</td>
          <td>$duser[nohp]</td>
        </tr>

        </table>";

    }else {
      echo "<b><center>Belum Ada Informasi Pasien</center></b>";
    }

       ?>
    </div>

    <?php




     ?>



  </div>

</div>
