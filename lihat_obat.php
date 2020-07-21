<?php
include 'koneksi.php';

 ?>
 <div class="dh12 beli_obat">
     <center><h1><b>Daftar Obat</b> </h1></center>
     <br>

          <?php
          $sql=mysqli_query($kon,"select * from tbl_obat");
          while ($rm=mysqli_fetch_array($sql)) {
            $harga=number_format($rm['harga'], 0, ".", ".");
            if(!empty($rm["foto"])){
            	$foto = "obat/$rm[foto]";
            }else{
            	$foto = "obat/obat.png";
            }
            echo "
            <div class='dh3 profil list_obat'>

                <center><b><u>$rm[nm_obat]</u></b></center> <p>
                <hr>
                <div class='dh4'>
                  <img src='$foto' alt='Avatar' style='width:100%'>
                </div>
                <div class='dh8'>
                  <table>
                    <tr>
                      <td>Jenis</td>
                      <td>:</td>
                      <td>$rm[jenis_obat]</td>
                    </tr>
                    <tr>
                      <td>Stok</td>
                      <td>:</td>
                      <td>$rm[stok]</td>
                    </tr>
                    <tr>
                      <td>Harga</td>
                      <td>:</td>
                      <td><b>Rp. $harga</b> /</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><b>$rm[satuan]</td>

                    </tr>
                    </table>

                    <table>
                    <tr>
                      <td colspan='1'> <a href='?p=tambah_keranjang&kd=$rm[kd_obat]' ><img src='image/keranjang.jpg' width=40px height=30px style='border:2px solid #5271FF'> </button></a>
                      <td colspan='2'> <a href='?p=det_obatuser&kd=$rm[kd_obat]' ><button type='button' class='btn btn-edit'><b>Detail</b> </button></a>
                      </td>
                    <tr>

                  </table>

              </div>
              <hr>
            </div>

            ";
          }

           ?>


 </div>
