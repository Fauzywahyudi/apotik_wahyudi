

<div class="profil">
<div class="grid">
<div class="dh6">
Username <h3><?php echo "$rm[username]"; ?></h3>
Password <h3><?php echo "***************"; ?></h3>
</div>
<div class="dh6">
Nama Lengkap <h3><?php echo "$rm[nama]"; ?></h3>
Spesialis <h3><?php echo "$rm[pekerjaan]"; ?></h3>
</div>
</div>
</div>
<p>
<div class="profil">
<div class="grid">
<div class="dh6">
Nama Panggilan <h3><?php echo "$rm[panggilan]"; ?></h3>
Tempat Lahir <h3><?php echo "$rm[tmplahir]"; ?></h3>
Tanggal Lahir <h3><?php echo "$rm[tgllahir]"; ?></h3>
<?php
$jk="";
  if($rm["jk"] == "L"){
    $jk = "Laki-Laki";
  }else if($rm["jk"] == "P"){
    $jk = "Perempuan";
  }
?>
Jenis Kelamin <h3><?php echo "$jk"; ?></h3>
</div>
<div class="dh6">
No. Handphone <h3><?php echo "$rm[nohp]"; ?></h3>
Email <h3><?php echo "$rm[email]"; ?></h3>
Alamat <h3><?php echo "$rm[alamat]"; ?></h3>
Terdaftar sejak <h3><?php echo "$rm[tglreg]"; ?> WIB</h3>
</div>
</div>
</div>
<p>
