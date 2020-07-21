<?php include 'koneksi.php'; ?>
<div class="profil">
<div class="grid">
<div class="dh6">
Username <h3><?php echo "**************"; ?></h3>
Password <h3><?php echo "**************"; ?></h3>

</div>
<div class="dh6">
Nama Lengkap <h3><?php echo "$rm[nama]"; ?></h3>
Pekerjaan <h3><?php echo "Admin"; ?></h3>

<form class="" action="" method="post">
  <input type="submit" name="edit" value="Edit Data" class="btn btn-edit">

</form>
</div>
<?php
    if (isset($_POST['edit'])) {
      include 'koneksi.php';
      $sql_aman=mysqli_query($kon, "select * from admin where id='$_SESSION[user]' and password='$_SESSION[passmin]'");
      $rs=mysqli_fetch_array($sql_aman);
      echo "<form class='' action='' method='post'>
      <table>
        <tr>
          <td>Password</td>
          <td><input type='password' name='password' value='' placeholder='Password Anda'> </td>
          <td>
        </tr>
        <tr>
          <td>$rs[pertanyaan] ..??</td>
          <td><input type='password' name='jawab' value='' placeholder='Jawaban Anda'> </td>

        </tr>
        <tr>
        <td></td>
        <td><input type='submit' name='konfirmasi' value='Konfirmasi' class='btn btn-edit'></td>
        </tr>
      </table>
      </form>
      <br>
      ";

    }

    if (isset($_POST['konfirmasi'])) {
      $sql_aman1=mysqli_query($kon, "select * from admin where id='$_SESSION[user]' and password=md5('$_POST[password]') and jawaban=md5('$_POST[jawab]')");
      $rs1=mysqli_fetch_array($sql_aman1);
      $cek=mysqli_num_rows($sql_aman1);
      if ($cek>0) {

      echo "<form class='' action='' method='post'>
        <input type='submit' name='ganti_password' value='Ganti Password' class='btn btn-edit'>
        <input type='submit' name='ganti_keamanan' value='Keamanan' class='btn btn-edit'>

      </form>
      ";
    }else {
      echo "Password atau Jawaban Salah!";
    }

    }

    //pass
    if (isset($_POST['ganti_password'])) {

      echo "<form class='' action='' method='post'>

        <input type='password' name='password_baru' value='' placeholder='Password Baru'>
        <input type='submit' name='pass_baru' value='Ganti' class='btn btn-edit'>

      </form>
      ";

    }

    if (isset($_POST['pass_baru'])) {
      $tipas=mysqli_query($kon,"update admin set password=md5('$_POST[password_baru]') where id='$_SESSION[user]'");
      if ($tipas) {
        echo "suskes";
        include 'logoutmin.php';
          //echo "<META HTTP-EQUIV='Refresh' Content='1; URL=logoutmin.php'>";
      }else {
        echo "gagal";
      }
    }

    //aman


    if (isset($_POST['ganti_keamanan'])) {
      $sql_aman=mysqli_query($kon, "select * from admin where id='$_SESSION[user]' and password='$_SESSION[passmin]'");
      $rs=mysqli_fetch_array($sql_aman);

      echo "<form class='' action='' method='post'>

        <input type='text' name='pertanyaan_baru' value='$rs[pertanyaan]' placeholder='Pertanyaan Baru'>
        <input type='password' name='jawaban_baru' value='' placeholder='Jawaban Baru'>
        <input type='submit' name='aman_baru' value='Ganti'>

      </form>
      ";

    }

    if (isset($_POST['aman_baru'])) {
      $tipas=mysqli_query($kon,"update admin set pertanyaan='$_POST[pertanyaan_baru]', jawaban=md5('$_POST[jawaban_baru]') where id='$_SESSION[user]'");
      if ($tipas) {
        echo "suskes";
        include 'logoutmin.php';
          //echo "<META HTTP-EQUIV='Refresh' Content='1; URL=logoutmin.php'>";
      }else {
        echo "gagal";
      }
    }




    if (isset($_POST['konfirm'])) {
      $sql_aman1=mysqli_query($kon, "select * from admin where id='$_SESSION[user]' and password=md5('$_POST[password]') and jawaban=md5('$_POST[jawab]')");
      $rs1=mysqli_fetch_array($sql_aman1);
      $cek=mysqli_num_rows($sql_aman1);

      if ($cek>0) {
        echo "<form class='' action='' method='post'>
        <br>
        <table>
          <tr>
            <td>Nama Lengkap </td>
            <td><input type='text' name='nama_edit' value='$rs1[nama] '> </td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type='password' name='pass_edit' value='$rs1[password] '> </td>
          </tr>
          <tr>
            <td>Pertanyaan Kemananan</td>
            <td><input type='text' name='tanya_edit' value='$rs1[pertanyaan] '> </td>
          </tr>
          <tr>
            <td>Jawaban</td>
            <td><input type='password' name='jawab_edit' value='$rs1[jawaban] '> </td>
          </tr>
          <tr>
            <td></td>
            <td>  <input type='submit' name='edit_data' value='Edit '><td>
          </tr>
        </table>
        </form>";


      }else {
        echo "Password atau Jawaban Anda Salah";


      }
    }

    // if (isset($_POST['edit_data'])) {
    //
    //   mysqli_query($kon, " update admin set nama='$_POST[nama_edit]', password=md5('$_POST[pass_edit]', $)")
    //
    //
    // }

 ?>

</div>
</div>
<p>

<p>
