<div class="profil">
<div class="grid">
  <h1 align='center'><u>Data Pribadi</u></h1>
  <br>
<div class="dh6">

<center>Username <h3><?php echo "**************"; ?></h3>
<center>Password <h3><?php echo "**************"; ?></h3>
</div>
<div class="dh6">
<center>Nama Lengkap <h3><?php echo "$rm[nama]"; ?></h3>
<center>Pekerjaan <h3><?php echo "$rm[pekerjaan]"; ?></h3>
</div>

<div class="dh12"><center>
  <form class="" action="" method="post">
    <input type="submit" name="lihat" value="Lihat Semua" class='btn btn-edit' >
  </form>
</div>
</div>
</div>
<p>


  <?php if (isset($_POST['lihat'])) {
    echo "<h2>Masukkan Password Anda</h2>
    <form class='' action='' method='post'>
      <input type='password' name='pass' value='' placeholder='Password'>
      <input type='submit' name='sub' value='Konfirmasi' class='btn btn-edit' >
    </form>
    ";

  }
  if (isset($_POST['sub'])) {
    $sql_aman=mysqli_query($kon, "select * from tbl_user where username='$_SESSION[user]'");
    $aman=mysqli_fetch_array($sql_aman);
    $pass=md5($_POST['pass']);
    if (!empty($_POST['pass'])) {
      if ($aman['password']=="$pass") {
        ?>
        <div class="profil">
        <div class="grid">
        <div class="dh6">
        <center>Nama Panggilan <h3><?php echo "$rm[panggilan]"; ?></h3>
        <center>Tempat Lahir <h3><?php echo "$rm[tmplahir]"; ?></h3>
        <center>Tanggal Lahir <h3><?php echo "$rm[tgllahir]"; ?></h3>
        <?php
          if($rm["jk"] == "L"){
            $jk = "Laki-Laki";
          }else if($rm["jk"] == "P"){
            $jk = "Perempuan";
          }
        ?>
        <center>Jenis Kelamin <h3><?php echo "$jk"; ?></h3>
        </div>
        <div class="dh6">
        <center>No. Handphone <h3><?php echo "$rm[nohp]"; ?></h3>
        <center>Email <h3><?php echo "$rm[email]"; ?></h3>
        <center>Alamat <h3><?php echo "$rm[alamat]"; ?></h3>
        <center>Terdaftar sejak <h3><?php echo "$rm[tglreg]"; ?> WIB</h3>
        </div>
        </div>
        </div>
        <p>

        <?php
      }else {
        echo "Password Salah!!";
      }
    }else {
      echo "Password tidak boleh kosong";
    }

  }
   ?>
