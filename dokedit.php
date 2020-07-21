<?php
include 'koneksi.php';
$sqle=mysqli_query($kon, "select * from tbl_dokter where username='$_GET[user]'");
$rme=mysqli_fetch_array($sqle);
 ?>
<div class="profil">
  <form class="" action="" method="post">
  <center><h1>Form Edit Dokter</h1> </center>
<div class="grid">
<div class="dh6" align='center'>
<b>Username</b> <h3><input type="text" name="username" value="<?php echo "$rme[username]"; ?>" placeholder="Username" disabled></h3><br>
<b>Password</b> <h3><input type="password" name="password" value="" placeholder="Password" ></h3><br>
<input type="hidden" name="username" value="<?php echo "$rme[username]"; ?>" placeholder="Username" >
</div>
<div class="dh6" align='center'>
<b>Nama Lengkap</b><h3><input type="text" name="nama" value="<?php echo "$rme[nama]"; ?>" placeholder="Nama Lengkap"></h3><br>
<b>Spesialis</b><h3><input type="text" name="pekerjaan" value="<?php echo "$rme[pekerjaan]"; ?>" placeholder="Pekerjaan"></h3><br>
</div>
<div class="dh12" align='center'>
  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-edit">
  <input type="submit" name="back" value="Kembali" class="btn btn-edit">
</div>
<?php
if (isset($_POST['back'])) {

  echo "<META HTTP-EQUIV='Refresh' Content='0.5; URL=damin.php?p=profildokmin&user=$rme[username]'>";

}if(isset($_POST["simpan"])){
  include "koneksi.php";
  $sql = mysqli_query($kon, "select * from tbl_dokter where username='$_POST[username]'");
  $r = mysqli_num_rows($sql);
  if(!empty($_POST["username"]) and !empty($_POST["nama"]) and !empty($_POST["pekerjaan"])){

if (!empty($_POST["password"])) {
  $pass=",  password=md5('$_POST[password]')";
}else{
  $pass="";
}


  $sqlm = mysqli_query($kon, "update  tbl_dokter set nama='$_POST[nama]', pekerjaan='$_POST[pekerjaan]' $pass where username='$_POST[username]'");

  if($sqlm){
    echo "<center>Proses Edit Berhasil";
  }else{
    echo "<center>Proses Edit Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=dokter'>";


  }else{
    echo "<center>Data Harus Diisi Dengan Lengkap";
  }
}
?>
</div>
</form>
</div>
