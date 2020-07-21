<div class="grid">
  <div class="card">
    <Center><h1>Halaman Antrian</h1></center>

    <table>
      <tr>
        <td><b>Pilih Dokter Spesialis</b></td>
        <td><b>:</b> </td>
        <td><b><form class="" action="" method="post">
          <select class="" name="spesialis">
            <option value="">-Pilih Spesialis-</option>
            <option value="Umum">Umum</option>
            <option value="THT">THT</option>
            <option value="Mata">Mata</option>
            <option value="Gigi">Gigi</option>
          </select>
         </b> </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><p><input type="submit" name="ambil" value="Ambil Antrian" class="btn btn-edit"> </td>
      </tr>
      </form>
    </table>
    <?php

    if (isset($_POST['ambil'])) {
      include 'koneksi.php';
      $jenis=$_POST['spesialis'];
      $status="Menunggu";

      if ($jenis=="Umum") {
        $kd="UM";
      }elseif ($jenis=="THT") {
        $kd="TH";
      }elseif ($jenis=="Mata") {
        $kd="MT";
      }elseif ($jenis=="Gigi") {
        $kd="GG";
      }else {
        echo "<script>
      alert('Harap Pilih Jenis Antrian');
      </script>";
        return;
      }

      $sql=mysqli_query($kon,"select * from antrian where jenis='$jenis' order by substring(kode,4,3) desc");

      $rb=mysqli_fetch_array($sql);
      $row=mysqli_num_rows($sql);

      if ($row>0) {
        $angka=substr($rb['kode'],3,3);
        $hasil=$angka+1;
        if (strlen($hasil)==1) {
          $antr_baru="$kd-00$hasil";
        }else if (strlen($hasil)==2) {
          $antr_baru="$kd-0$hasil";
        }else if (strlen($hasil)==3) {
          $antr_baru="$kd-$hasil";
        }else {

          echo "no antrian mencapai batas";
        }

    }else {
      $antr_baru="$kd-001";
    }
    $date=date('Y-m-d');
    $sql_cek=mysqli_query($kon,"select * from antrian where username='$_SESSION[user]' and jenis='$jenis'");
    $cek=mysqli_num_rows($sql_cek);
    
    $acek=mysqli_fetch_array($sql_cek);
    $sql_cek1=mysqli_query($kon,"select * from antrian where username='$_SESSION[user]' ");
    $cek1=mysqli_num_rows($sql_cek1);
    if($cek1>1){
        echo "<script>
        alert('Pengambilan Antrian Gagal, Anda Telah Melampaui Pengambilan Antrian');
        </script>";
        return;
    }

    if ($cek>0) {
      echo "<script>
      alert('Pengambilan Antrian Gagal. Anda Telah Mengambil Antrian dengan Kode Antrian $acek[kode]');
      </script>";

    }
    else {
      $sql=mysqli_query($kon,"insert into antrian (kode,username,jenis,status,tgl_ambil,ket) values('$antr_baru','$_SESSION[user]','$jenis','$status',NOW(),null)");
     echo "<b>antrian anda adalah $antr_baru</b>";

     $sqlj=mysqli_query($kon,"select * from antrian where jenis='$jenis' and status='Berjalan'");
     $rj=mysqli_fetch_array($sqlj);
     $roj=mysqli_num_rows($sqlj);

       if ($roj>0) {
         $jalan=substr($rj['kode'],3,3);
         $jumtung=$hasil-$jalan;
          echo "<br><b>Dokter Telah Masuk</b>";
          echo "<br><b>Jumlah Antrian yang anda tunggu adalah $jumtung nomor</b>";

       }else {
         echo "<br><b>Belum Ada Antrian Berjalan Karena Dokter Belum Masuk / Belum Jalankan Antrian</b>";
       }

    }
    





    }
     ?>
  </div>

  

</div>

