<?php
include 'koneksi.php';

$sql=mysqli_query($kon,"select * from keranjang where username='$_SESSION[user]' and status='Belum'");
 ?>
<div class="dh12">
  <center><h1>Keranjang Pesanan</h1></center>
  <br>

    <div class="dh12 center">
      <table >
        <thead>
          <tr class="bawah">
            <th width="100px" class="kepala">No</th>
            <th width="200px" class="kepala" align=''>Gambar</th>
            <th width="300px" class="kepala" align='left'>Nama Obat</th>
            <th width="200px" class="kepala" align='left'>Harga</th>
            <th width="200px" class="kepala" align='left'>Jumlah Beli</th>
            <th width="250px" class="kepala" align='left'>Jumlah Bayar</th>
            <th></th>
          </tr>
          <tr>
            <td colspan="7"><hr color="#5271FF"> </td>
          </tr>
        </thead>
        <tbody>

          <?php
          $no=1;
          $cek=mysqli_num_rows($sql);
          if ($cek==0) {
            echo "<tr>
            <td colspan='7' ><b><center>Belum Ada Data dalam Keranjang</b></center> </td>
            </tr>";
          }else {
            while ($rm=mysqli_fetch_array($sql)) {

              $sqlm=mysqli_query($kon,"select * from tbl_obat where kd_obat='$rm[kd_obat]'");
              $rmm=mysqli_fetch_array($sqlm);
              $harga=number_format($rmm['harga'], 0, ".", ".");
              $total_bayar=number_format($rm['jumlah_bayar'], 0, ".", ".");
              if(!empty($rmm["foto"])){
                $foto = "obat/$rmm[foto]";
              }else{
                $foto = "obat/obat.png";
              }
              echo "<tr>
              <td><center><b>$no</center></td>
              <td><center><img src='$foto' style='width:150px; height:150px;'></center></td>
              <td><b>$rmm[nm_obat]</td>
              <td><b>Rp. $harga,00</td>
              <td><b>$rm[jumlah]</td>
              <td><b>Rp. $total_bayar,00</td>
              <td><a href='?p=hapus_keranjang&kd=$rm[kd_obat]'><button class='btn btn-hapus'>Hapus</button> </a> </td>
              </tr>";

              $no++;
            }

          }




          $sqljum=mysqli_query($kon,"SELECT SUM(jumlah_bayar) AS total FROM keranjang WHERE username='$_SESSION[user]' and status='Belum'");
          $jum=mysqli_fetch_array($sqljum);
          $tot=number_format($jum['total'], 0, ".", ".");

          echo "<tr>
          <td colspan='7'> <hr color='#5271FF'></td>
          </tr>";
          echo "<tr>
          <td colspan='5' ><center><b>Total Bayar</b></center> <p></td>
          <td ><b>Rp. $tot,00 <p></td>
          </tr>";

           ?>
        </tbody>
      </table>

    </div>
    <div class="dh12">
      <div class="dh6 kiri">
        <br> <a href="?p=lihat_obat"><button type="button" name="button" class="btn btn-edit">Tambah Obat</button></a>

      </div>

      <div class="dh6 kanan" align="right">
          <br><button type="button" name="button" class="btn btn-edit" onclick="konf_pesan()">Konfirmasi</button>
      </div>
    </div>


</div>
<script type="text/javascript">
  function konf_pesan() {
    var yakin = confirm("Anda Yakin Memesan yang ada Dikeranjang");
   if (yakin) {
            window.location = "index.php?p=checkout";
        } else {
            
        }

  }
</script>
