<?php
  include 'koneksi.php';
  $user=$_SESSION["user"];
  $data=mysqli_query($kon,"select * from tbl_user where username='$user'");
  $dat=mysqli_fetch_array($data);
  $nama=$dat['nama'];
?>

 <h1 align="center">Hasil Konsultasi</h1>
 <?php

include 'koneksi.php';

$sql_stak=mysqli_query($kon,"select * from stack order by urut desc limit 1");
$a=mysqli_fetch_array($sql_stak);

$sakit=$a[1];
echo "<b>Penyakit yang Anda Pilih : $sakit </b>";

$ul=0;
$proses=1;
while ($ul==0) {

  //echo "<hr> sekarang iterasi $proses";
  $sql_stak=mysqli_query($kon,"select * from stack order by urut desc limit 1");
  $a=mysqli_fetch_array($sql_stak);
  $kode=substr($a[0],0,1);

  if ($kode=="P" && $proses>1) {
    $dicari=$a[0];
    $sql_rule=mysqli_query($kon,"select * from rule where id_penyakit='$a[0]'");

    while ($a_rule=mysqli_fetch_array($sql_rule)) { //rule
      $gejala=$a_rule[2]; //kode gejala

      $sql_fakta=mysqli_query($kon,"select * from fakta_baru where id='$gejala'");
      $num_fakta=mysqli_num_rows($sql_fakta);
      if ($num_fakta>0) { //jika ada
        //echo "<br>$gejala ada didalam fakta baru <br>";

      }

    }
    $sql_fin=mysqli_query($kon,"select * from indeks where nama='$sakit'");
    $fin=mysqli_fetch_array($sql_fin);
    mysqli_query($kon,"insert into fakta_baru values ('$fin[id]','$fin[nama]','$fin[jenis]','$fin[ket]')");
    mysqli_query($kon,"delete from stack where nama='$sakit'");
    echo "<br> <font size='5px'>$nama,Anda <b>Akan Mengalami</b> Gejala Baru, Seperti : <br></font>";
    $gej_baru=mysqli_query($kon,"select * from fakta_baru where ket='Khusus'");
    while ($ge_baru=mysqli_fetch_array($gej_baru)) {
      echo "<li><b> $ge_baru[nama] </b></li>

      ";
    }

    //echo " Anda <b>Terdiagnosa </b> Penyakit $sakit";
    break;
    $ul=$ul++;
  }else {
    $dicari=$a[0];
    $sql_rule=mysqli_query($kon,"select * from rule where id_penyakit='$a[0]'");

    while ($a_rule=mysqli_fetch_array($sql_rule)) { //rule
      $gejala=$a_rule[2]; //kode gejala

      $sql_fakta=mysqli_query($kon,"select * from fakta_baru where id='$gejala'");
      $num_fakta=mysqli_num_rows($sql_fakta);
      if ($num_fakta>0) { //jika ada
        //echo "<br>$gejala ada didalam fakta baru <br>";

        $sql_ket=mysqli_query($kon,"select * from indeks where id='$dicari'");
        $a_ket=mysqli_fetch_array($sql_ket);
        if ($a_ket[3]=="Khusus") {
          $sql_ket1=mysqli_query($kon,"select * from indeks where id='$dicari'");
          $a_ket1=mysqli_fetch_array($sql_ket1);
          $cek_ins=mysqli_query($kon,"select * from fakta_baru where id='$dicari'");
          $c_ins=mysqli_num_rows($cek_ins);
          if ($c_ins>0) {
            echo " ";
          }else {
            $suk_fakta=mysqli_query($kon,"insert into fakta_baru values ('$dicari','$a_ket[1]','Gejala','Khusus')");
          }


          $pus_stak=mysqli_query($kon,"delete from stack where id='$dicari'");

        }


      }else { //jika tidak ada
        $sql_ket=mysqli_query($kon,"select * from indeks where id='$gejala'");
        $a_ket=mysqli_fetch_array($sql_ket);
        if ($a_ket[3]=="Khusus") {
          $sql_stak=mysqli_query($kon,"select * from stack order by urut desc limit 1");
          $a=mysqli_fetch_array($sql_stak);
          $urut=$a['urut']+1;

          $suk_stak=mysqli_query($kon,"insert into stack values ('$gejala','$a_ket[1]','Gejala','Khusus','$urut')");

        }else {


          $gej_baru=mysqli_query($kon,"select * from fakta_baru where ket='Khusus'");
          $gebaru_row=mysqli_num_rows($gej_baru);
          if ($gebaru_row>0) {
            echo "<br> <font size='5px'>$nama,Anda <b>Akan Mengalami</b> Gejala Baru, Seperti : <br></font>";
            while ($ge_baru=mysqli_fetch_array($gej_baru)) {
              echo "<li><b> $ge_baru[nama] </b></li>  ";
            }
          }else {
              echo "<br> <font size='5px'>$nama,Anda <b>Tidak Akan Mengalami</b> Gejala Baru </font>";
          }


          //echo "<br>proses berhenti karena $gejala tidak ada di dalam fakta <br>";
          //echo "<br> <font size='5px'>$nama,Anda <b>Tidak Akan Mengalami</b> Gejala Baru </font>";
          //echo "<br>Anda <b>Tidak Terdiagnosa</b> penyakit $sakit <br>";
          $ul++;
          break;
        }

      }

    }
  }


$proses++;
}

?>
