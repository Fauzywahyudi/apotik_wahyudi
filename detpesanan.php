<?php
include 'koneksi.php';

$sql=mysqli_query($kon,"SELECT * from pesanan a inner join tbl_user b on a.username=b.username where id_pesanan='$_GET[id]'");
$rm=mysqli_fetch_array($sql);
if(!empty($rm["foto"])){
  $foto = "foto/$rm[foto]";
}else{
  $foto = "foto/avatar.png";
}
$isi=substr($rm['isi_pesanan'], 5);
$total_bayar=number_format($rm['total_bayar'], 0, ".", ".");
$d=substr($rm['tgl_pesanan'], 8);
$m=substr($rm['tgl_pesanan'], 5,2);
$y=substr($rm['tgl_pesanan'], 0,4);
 ?>
<div class="dh12 center">
  <h1><center>Detail Pesanan </center></h1>
   
  <div class="dh6" >
    <h2 align="center">Informasi User</h2>
    <div class="dh4">
       <img src="<?php echo "$foto" ?>" width="100%" height="100%">
       <p></p>
    </div>
    <div class="dh8">
      <table>
        <tr>
          <td><b>Nama</b></td>
          <td>:</td>
          <td><?php echo "$rm[nama]"; ?></td>
        </tr>
        <tr>
          <td><b>Panggilan</b> </td>
          <td>:</td>
          <td><?php echo "$rm[panggilan]"; ?></td>
        </tr>
        <tr>
          <td><b>Alamat</b></td>
          <td>:</td>
          <td><?php echo "$rm[alamat]"; ?></td>
        </tr>
        <tr>
          <td><b>Pekerjaan</b></td>
          <td>:</td>
          <td><?php echo "$rm[pekerjaan]"; ?></td>
        </tr>
        <tr>
          <td><b>NO HP</b></td>
          <td>:</td>
          <td><?php echo "$rm[nohp]"; ?></td>
        </tr>
      </table>

    </div>
    

   </div>    
  <div class="dh6" >
    <h2 align="center">Informasi Pesanan</h2>
    <div class="dh6">
      <p><b>Isi Pesanan</b></p>
      <p><?php echo "$isi"; ?></p>
      <p></p>

      
    </div>
    <div class="dh6">
      <p><b>Total Bayar</b></p>
      <p><?php echo "Rp. $total_bayar"; ?></p>
      <p><b>Tanggal Pesanan</b></p>
      <p><?php echo "$d-$m-$y"; ?></p>
         

    </div>
   </div>
   <div class="dh12">
      <div class="dh6">
        <p>        <a href="damin.php?p=pesanan_user"><button class="btn btn-back"><b>Kembali</b></button></a>
</p>
      </div>
      <div class="dh6" >
        <div class="dh6" align="right">
          <?php 
          if ($rm['status_pesanan']=="Dibatalkan") {
            echo "<p style='color:white'>.</p>";
          }else if($rm['status_pesanan']=="Sudah Diambil"){
           echo "<p style='color:white'>.</p>";
          }else{
            echo "<p><button class='btn btn-hapus' onclick='batalpesanan()'><b>Batalkan</b></button></p>";

          } 

          ?>
          
        </div>
        <div class="dh6" ></div>
        <?php 
          if ($rm['status_pesanan']=="Dibatalkan") {
            
            echo "<div style='display:inline-block; background-color:pink; color:red; padding: 10px; align=center'>
           <b>Pesanan Sudah Dibatalkan</b>
           </div>";

            
          }else if($rm['status_pesanan']=="Sudah Diambil"){
           
            echo "<div style='display:inline-block; background-color:lightgreen; color:green; padding: 10px; align=center'>
           <b>Pesanan Sudah Diambil</b>
           </div>";
           //echo "<p></p>";

          }else{
            echo "<p><button class='btn btn-edit' onclick='pembayaran()'>Pembayaran</button></p>";
          } 

          ?>
         
      </div>
    </div>

</div>
<script type="text/javascript">
  function batalpesanan() {
    var yakin = confirm("Apakah Kamu Yakin Membatalkan Pesanan?");
   if (yakin) {
            window.location = "<?php echo "aksimin.php?p=batalpesanan&id=$_GET[id]" ?>";
        } else {
            
        }

  }
  function pembayaran() {
    var yakin = confirm("Apakah Kamu Yakin untuk Melakukan Pembayaran Pesanan?");
   if (yakin) {
            window.location = "<?php echo "aksimin.php?p=pembayaran_pesanan&id=$_GET[id]" ?>";
        } else {
            
        }

  }
</script>