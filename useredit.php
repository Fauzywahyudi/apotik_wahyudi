<?php
include 'koneksi.php';
$sqle=mysqli_query($kon, "select * from tbl_user where username='$_GET[user]'");
$rme=mysqli_fetch_array($sqle);
 ?>
<div class="profil">
  <form class="" action="" method="post">
  <center><h1>Form Edit User</h1> </center>
<div class="grid">
<div class="dh6" align='center'>
<b>Username</b> <h3><input type="text" name="username" value="<?php echo "$rme[username]"; ?>" placeholder="Username" disabled></h3><br>
<b>Password</b> <h3><input type="password" name="password" value="<?php echo "$rme[password]"; ?>" placeholder="Password" ></h3><br>
<input type="hidden" name="username" value="<?php echo "$rme[username]"; ?>" placeholder="Username" >
</div>
<div class="dh6" align='center'>
<b>Nama Lengkap</b><h3><input type="text" name="nama" value="<?php echo "$rme[nama]"; ?>" placeholder="Nama Lengkap"></h3><br>
<b>Pekerjaan</b><h3><input type="text" name="pekerjaan" value="<?php echo "$rme[pekerjaan]"; ?>" placeholder="Pekerjaan"></h3><br>
</div>
<div class="dh12" align='center'>
  <input type="submit" name="simpan" value="Simpan Data">
  <input type="submit" name="back" value="Kembali">
</div>
<?php
if (isset($_POST['back'])) {

  echo "<META HTTP-EQUIV='Refresh' Content='0.5; URL=damin.php?p=user'>";

}
if(isset($_POST["simpan"])){
  include "koneksi.php";
  $sql = mysqli_query($kon, "select * from tbl_user where username='$_POST[username]'");
  $r = mysqli_num_rows($sql);
  if(!empty($_POST["username"]) and !empty($_POST["password"]) and !empty($_POST["nama"]) and !empty($_POST["pekerjaan"])){


  $sqlm = mysqli_query($kon, "update  tbl_user set password='$_POST[password]', nama='$_POST[nama]', pekerjaan='$_POST[pekerjaan]' where username='$_POST[username]'");

  if($sqlm){
    echo "<center>Proses Edit Berhasil";
  }else{
    echo "<center>Proses Edit Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=user'>";


  }else{
    echo "<center>Data Harus Diisi Dengan Lengkap";
  }
}

?>
</div>
</form>
</div>
