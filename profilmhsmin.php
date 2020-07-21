<?php
$sqlmhs=mysqli_query($kon,"select * from tbl_user where username='$_GET[user]'");
$rmhs=mysqli_fetch_array($sqlmhs);
 ?>
<div class="profil">
<div class="grid">
<div class="dh3" align='center'>
  <?php
  if(!empty($rmhs["foto"])){
  	$foto = "foto/$rmhs[foto]";
  }else{
  	$foto = "foto/avatar.png";
  }
  ?>
  <img src="<?php echo "$foto"; ?>" alt="Avatar" style="width:100%"> <p></p>
  <?php

  // if ($_SESSION['user']!=$rmhs['username']) {
  //   echo "<a href='?p=pesankirim&user=$rmhs[username]'><button type='button' class='btn btn-edit'>Kirim Pesan</button></a>";

  // }
  echo " ";
  echo "<a href='damin.php?p=user'><button type='button' class='btn btn-edit'>Kembali</button></a>";
   ?>

</div>
<div class="dh4">
Nama Lengkap <h3><?php echo "$rmhs[nama]"; ?></h3>
Kelas Asal <h3><?php echo "$rmhs[pekerjaan]"; ?></h3>
<?php
  echo "<a href='userhapus.php?user=$rmhs[username]'><button type='button' class='btn btn-hapus'>Hapus</button></a>
  <a href='damin.php?p=user_edit&user=$rmhs[username]'><button type='button' class='btn btn-edit'>Edit</button></a>"; ?>
</div>
<div class="dh4">
</div>
</div>
</div>
<p>
<div class="profil">
<div class="grid">
<div class="dh6">
Nama Panggilan <h3><?php echo "$rmhs[panggilan]"; ?></h3>
Tempat Lahir <h3><?php echo "$rmhs[tmplahir]"; ?></h3>
Tanggal Lahir <h3><?php echo "$rmhs[tgllahir]"; ?></h3>
<?php
$jk=null;
  if($rmhs["jk"] == "L"){
    $jk = "Laki-Laki";
  }else if($rmhs["jk"] == "P"){
    $jk = "Perempuan";
  }
?>
Jenis Kelamin <h3><?php echo "$jk"; ?></h3>
</div>
<div class="dh6">
No. Handphone <h3><?php echo "$rmhs[nohp]"; ?></h3>
Email <h3><?php echo "$rmhs[email]"; ?></h3>
Alamat <h3><?php echo "$rmhs[alamat]"; ?></h3>
Terdaftar sejak <h3><?php echo "$rmhs[tglreg]"; ?> WIB</h3>
</div>
</div>
</div>
<p>
