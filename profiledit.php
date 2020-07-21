<div class="profil">

  <?php
  include 'koneksi.php';


  $cek_tanya=mysqli_query($kon, "select * from tbl_user where username='$_SESSION[user]'");
  $tanya=mysqli_fetch_array($cek_tanya);
  if ($tanya['pertanyaan']=="" or $tanya['jawaban']=="") {
    echo "<h1>Buat Keamanan</h1>";
    echo "<b>Anda belum membuat pertanyaan keamanan!</b> <br>
    Pertanyaan ini berguna jika anda menggunakan fitur lupa password. <br>
    Pastikan Pertanyaan dan Jawaban ini cuma Anda yang mengetahui.<br>
    <b>Jagalah Kerahasiaan data Anda.!!</b><br><br>
    ";
    echo "
    <form class='' action='' method='post'>
    <table>
      <tr>
        <td>Pertanyaan Keamanan Anda </td>
        <td><input type='text' name='tanya' value='' placeholder='Pertanyaan'> </td>
      </tr>
      <tr>
        <td>Jawaban Pertanyaan Anda</td>
        <td><input type='text' name='jawab' value='' placeholder='Jawaban'> </td>
      </tr>
      <tr>
        <td></td>
        <td>  <input type='submit' name='ok' value='Konfirmasi' class='btn btn-edit' ></td>
      </tr>
    </table>


    </form>
    <br>
    ";

    if (isset($_POST['ok'])) {

      if (!empty($_POST['tanya']) or !empty($_POST['tanya'])) {
        $tambah=mysqli_query($kon, "update tbl_user set pertanyaan='$_POST[tanya]', jawaban=md5('$_POST[jawab]') where username='$_SESSION[user]'");
          echo "<META HTTP-EQUIV='Refresh' Content='1; URL=index.php?p=beranda'>";

      }else {
        echo "Silahkan Input Pertanyaan dan Jawaban Keamanan Anda!";
      }
    }


  }else {

    $show=1;

    if (isset($_POST['konfirm'])) {
      if (!empty($_POST['pass']) or !empty($_POST['tanya'])) {
        $jawab=md5($_POST['jawab']);
        $pass=md5($_POST['pass']);

        if ($tanya['password']=="$pass" and $tanya['jawaban']=="$jawab") {
            $show=0;

              $sqlm=mysqli_query($kon,"select * from tbl_user where username='$_SESSION[user]'");
              $rm = mysqli_fetch_array($sqlm);
              ?>
              Form Ubah Data Mahasiswa
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="username" value="<?php echo "$rm[username]"; ?>" />
                <div class="profil">
              <div class="grid">
              <div class="dh6">
                Username <br>
                <input name="nobp" type="text" id="username" value="<?php echo "$rm[username]"; ?>" disabled>
               <p>Password  <br>
                  <input name="password" type="password" id="password" value="<?php echo "$rm[password]"; ?>" disabled>
                </div>
                <div class="dh6">
                Nama Lengkap <br>
                  <input name="nama" type="text" id="nama" value="<?php echo "$rm[nama]"; ?>">
                <p>Pekerjaan <br>
                  <input name="pekerjaan" type="text" id="pekerjaan" value="<?php echo "$rm[pekerjaan]"; ?>">
                </div>
                </div>
                </div>
                <div class="profil">
              <div class="grid">
              <div class="dh6">
                Nama Panggilan<br>
                  <input name="panggilan" type="text" id="panggilan" value="<?php echo "$rm[panggilan]"; ?>">
                <p>Tempat Lahir <br>
                  <input name="tmplahir" type="text" id="tmplahir" value="<?php echo "$rm[tmplahir]"; ?>">
                <p>Tanggal Lahir  <br>
                  <input name="tgllahir" type="date" id="tgllahir" value="<?php echo "$rm[tgllahir]"; ?>">
                <p>Alamat Lengkap <br>
                  <textarea name="alamat" id="alamat"><?php echo "$rm[alamat]"; ?></textarea>
                </div>
                <div class="dh6">
                <?php
                $p="";
                $l="";
                if($rm["jk"] == "L"){ $l = " checked"; }
                else if($rm["jk"] == "P"){ $p = " checked"; }
                ?>
                Jenis Kelamin <p>
                  <input name="jk" type="radio" value="L" <?php echo "$l"; ?>>Laki-Laki<br>
                  <input name="jk" type="radio" value="P" <?php echo "$p"; ?>>Perempuan
                <p>No. Handphone <br>
                  <input name="nohp" type="text" id="nohp" value="<?php echo "$rm[nohp]"; ?>">
                <p>Email   <br>
                  <input name="email" type="text" id="email" value="<?php echo "$rm[email]"; ?>">
                <p>Foto   <br>
                  <input name="foto" type="file" id="foto">
                </div>
                </div>
                </div>
                <input name="gantidata" type="submit" id="gantidata" value="Simpan Data Mahasiswa" class='btn btn-edit' >
                <!-- <input name="gantipass" type="submit" id="gantipass" value="Ganti Password" class='btn btn-edit' > -->
              </form>

              <?php




        }else {
          echo "<script>
          window.alert('Password dan Jawaban Anda salah!')
          </script>
          ";

        }

        }else {
          echo "<script>
          window.alert('Silahkan Input Password dan Jawaban Keamanan Anda!')
          </script>
          ";
        }

      }



    if ($show==1) {
      echo "<h1>Keamanan</h1>";
      echo "<b>Anda harus memasukkan Password dan Jawaban Keamanan!</b> <br>
      Hal ini untuk menjaga Kerahasiaan data Anda.<br>
      <b>Jagalah Kerahasiaan data Anda.!!</b><br><br>
      ";
      echo "
      <form class='' action='' method='post'>
      <table>
        <tr>
          <td>Password Anda </td>
          <td><input type='password' name='pass' value='' placeholder='Password'> </td>
        </tr>
        <tr>
          <td>$tanya[pertanyaan]..??</td>
          <td><input type='password' name='jawab' value='' placeholder='Jawaban'> </td>
        </tr>
        <tr>
          <td></td>
          <td>  <input type='submit' name='konfirm' value='Konfirmasi' class='btn btn-edit' ></td>
        </tr>
      </table>


      </form>
      <br>
      ";
    }




    }


    if(isset($_POST["gantidata"])){
      include "koneksi.php";
      $jk=$_POST['jk'];
      $user=$_SESSION['user'];
      $nmfoto  = $_FILES["foto"]["name"];
      $lokfoto = $_FILES["foto"]["tmp_name"];
      if(!empty($lokfoto)){
       move_uploaded_file($lokfoto, "foto/$nmfoto");
       $foto = ", foto='$nmfoto'";
      }else{
       $foto = "";
      }

      $sqlm = mysqli_query($kon, "update tbl_user set nama='$_POST[nama]', pekerjaan='$_POST[pekerjaan]', panggilan='$_POST[panggilan]', tmplahir='$_POST[tmplahir]', tgllahir='$_POST[tgllahir]', alamat='$_POST[alamat]', jk='$_POST[jk]', nohp='$_POST[nohp]', email='$_POST[email]' $foto where username='$_SESSION[user]'");

      if($sqlm){
        echo "<script>
          alert('Data Mahasiswa Berhasil Dirubah')
        </script>";
      }else{
        echo "<script>
          alert('Gagal Merubah')
        </script>";
      }
      //echo "<META HTTP-EQUIV='Refresh' Content='3; URL=?p=profil'>";
    }

?>






</div>
