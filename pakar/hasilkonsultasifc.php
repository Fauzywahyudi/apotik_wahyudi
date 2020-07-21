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


$ul=0;
$proses=1;
while ($ul==0) {

  //echo "<hr> iterasi $proses";
  $sql_jum_fak=mysqli_query($kon,"select * from fakta_baru");
  $jum_fak=mysqli_num_rows($sql_jum_fak);

  $sql_rule=mysqli_query($kon,"select * from penyakit");
  while ($rule=mysqli_fetch_array($sql_rule)) {
    //echo "<br><h1>$rule[nama] </h1><br>";

    $sql_cek_rule=mysqli_query($kon,"select * from rule where id_penyakit='$rule[nama]'");
    $no=0;
    while ($cek_rule=mysqli_fetch_array($sql_cek_rule)) {
      //echo "<li>$no $cek_rule[id_gejala]</li>";

      $sql_cek_fakta=mysqli_query($kon,"select * from fakta_baru where id='$cek_rule[id_gejala]'");
      $cek_fak=mysqli_num_rows($sql_cek_fakta);

      if ($cek_fak>0) {
        $r[$no]=$cek_rule['id_gejala'];
        //echo "$r[$no] <b>ada</b> didalam fakta";
        $r1[$no]="Y";
        //echo " $r1[$no]";
      }else {
        //echo "<b>tidak ada</b> didalam fakta";
        $r1[$no]="T";
        //echo " $r1[$no]";
      }
      $a=0;
      $ada="";
      $cek_ada="";
      while ($a <=$no) {
        if ($r1[$a]=="Y") {
          $ada="$ada ada";
        }else {
          $ada="$ada tidak";
        }
        $cek_ada="$cek_ada ada";
        $a++;
      }
      //echo "<br>kondisi =$ada";
      //echo "<br>harus memenuhi kondisi =$cek_ada";

      $no++;
    }
    //echo "<h3>persamaan if nya $ada = $cek_ada </h3> ";
    if ($ada==$cek_ada) {
      //echo "<br><b>rule jalan</b>";

       $cek_sudah_ada=mysqli_query($kon,"select * from fakta_baru where id='$rule[nama]'");
       $sudah_ada=mysqli_num_rows($cek_sudah_ada);
       if ($sudah_ada>0) {
         //echo " ";
       }else {
         $sql_ket=mysqli_query($kon, "select * from indeks where id='$rule[nama]'");
         $ket=mysqli_fetch_array($sql_ket);

         mysqli_query($kon,"insert into fakta_baru (id,nama,jenis,ket) values('$ket[id]','$ket[nama]','$ket[jenis]','$ket[ket]')");
         //echo "<b>$ket[id] masuk fakta baru</b>";

         $sql_jum_kit=mysqli_query($kon,"select * from fakta_baru where jenis='Penyakit'");
         $jum_kit=mysqli_num_rows($sql_jum_kit);
         if ($jum_kit>0) {
           $nm_kit=mysqli_fetch_array($sql_jum_kit);

           echo "<br> <font size='5px'>$nama,Anda <b>Terdiagnosa</b> Penyakit <b>$nm_kit[nama]</b> </font>";
           echo "<br><h2>Solusi dari kami : </h2><br>";
           echo "$nm_kit[ket]";
           $ul++;
           break;
         }
       }


    }else {
      //echo "<br>rule <b>tidak</b> jalan";
    }
  }

  $sql_jum_fak1=mysqli_query($kon,"select * from fakta_baru");
  $jum_fak1=mysqli_num_rows($sql_jum_fak1);

  if ($jum_fak==$jum_fak1) {
    //echo "<br>Proses terhenti karena tidak ada lagi Rule yang jalan";

    echo "<br> <font size='5px'>$nama,Anda  <b>Tidak Terdiagnosa</b> Penyakit  </font>";
    $sql_jum_kit=mysqli_query($kon,"select * from fakta_baru where jenis='Penyakit'");
    $jum_kit=mysqli_num_rows($sql_jum_kit);
    if ($jum_kit>0) {
      $nm_kit=mysqli_fetch_array($sql_jum_kit);

      echo "<br> <font size='5px'>$nama,Anda <b>Terdiagnosa</b> Penyakit <b>$nm_kit[nama]</b> </font>";
      echo "<br><h2>Solusi dari kami : </h2><br>";
      echo "$nm_kit[ket]";

    }
    $ul++;
    break;
  }




$proses++;
}

?>
