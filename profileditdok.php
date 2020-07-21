<?php
$sqlm = mysqli_query($kon, "select * from tbl_dokter where username='$_GET[user]'");
$rm = mysqli_fetch_array($sqlm);
?>
<h1>Form Ubah Data Pribadi</h1>

<form name="form1" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="username" value="<?php echo "$rm[username]"; ?>" />
  <div class="profil">
<div class="grid">
<div class="dh4">
  Username <br>
  <input name="user" type="text" id="username" value="<?php echo "$rm[username]"; ?>" disabled>
 <p>Password  <br>
    <input name="password" type="text" id="password" value="***************" disabled>
  </div>
  <div class="dh4">
  Nama Lengkap <br>
    <input name="nama" type="text" id="nama" value="<?php echo "$rm[nama]"; ?>">
  <p>Spesialis <br>
    <input name="pekerjaan" type="text" id="pekerjaan" value="<?php echo "$rm[pekerjaan]"; ?>">
  </div>
  <div class="dh4">
    <p></p><br>
    <input name="simpan" type="submit" id="simpan" value="Simpan Data" class="btn btn-edit">
  </div>
  </div>
  </div>
  <div class="profil">
<div class="grid">
<div class="dh4">
  Nama Panggilan<br>
    <input name="panggilan" type="text" id="panggilan" value="<?php echo "$rm[panggilan]"; ?>">
  <p>Tempat Lahir <br>
    <input name="tmplahir" type="text" id="tmplahir" value="<?php echo "$rm[tmplahir]"; ?>">
  <p>Tanggal Lahir  <br>
    <input name="tgllahir" type="date" id="tgllahir" value="<?php echo "$rm[tgllahir]"; ?>">
  <p>Alamat Lengkap <br>
    <textarea name="alamat" id="alamat"><?php echo "$rm[alamat]"; ?></textarea>
	</div>
	<div class="dh4">
	<?php
  $p="";
  $l="";
  if($rm["jk"] == "L"){ $l = " checked"; }
  else if($rm["jk"] == "P"){ $p = " checked"; }
  ?>
  Jenis Kelamin <p>
    <input name="jk" type="radio" value="L" <?php echo "$l"; ?>>
    Laki-Laki<br>
    <input name="jk" type="radio" value="P" <?php echo "$p"; ?>>
    Perempuan
  <p>No. Handphone <br>
    <input name="nohp" type="text" id="nohp" value="<?php echo "$rm[nohp]"; ?>">
  <p>Email   <br>
    <input name="email" type="text" id="email" value="<?php echo "$rm[email]"; ?>">
  <p>Foto   <br>
    <input name="foto" type="file" id="foto">
  </div>
  </div>
  </div>

</form>

<?php
if(isset($_POST["simpan"])){
  include "koneksi.php";

  $nmfoto  = $_FILES["foto"]["name"];
  $lokfoto = $_FILES["foto"]["tmp_name"];
  if(!empty($lokfoto)){
   move_uploaded_file($lokfoto, "foto/$nmfoto");
   $foto = ", foto='$nmfoto'";
  }else{
   $foto = "";
  }

  $sqlm = mysqli_query($kon, "update tbl_dokter set  nama='$_POST[nama]', pekerjaan='$_POST[pekerjaan]', panggilan='$_POST[panggilan]', tmplahir='$_POST[tmplahir]', tgllahir='$_POST[tgllahir]', jk='$_POST[jk]', alamat='$_POST[alamat]', nohp='$_POST[nohp]', email='$_POST[email]' $foto where username='$_POST[username]'");

  if($sqlm){
    echo "Data Anda Berhasil Dirubah";
  }else{
    echo "Gagal Merubah";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='3; URL=?p=mhs'>";
}
?>
