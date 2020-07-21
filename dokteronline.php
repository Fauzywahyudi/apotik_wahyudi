<big> <b> Dokter Online</b></big><p>
  <?php
$sqlo = mysqli_query($kon, "select * from tbl_dokter where status=1 order by lastlogin desc");
while ($ro=mysqli_fetch_array($sqlo)) {
  if(!empty($ro["foto"])){
  	$foto = "foto/$ro[foto]";
  }else{
  	$foto = "foto/avatar.png";
  }
  echo "<a href='?p=profildokmin&user=$ro[username]'><div class='grid'>
  <div class='dh3'> <img src='$foto' width='100%'> </div>
  <div class='dh9'> <b>$ro[nama]</b> <br> <small>$ro[lastlogin] WIB</small></div>
  </div></a><p>
  ";
}
   ?>
