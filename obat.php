<?php
include 'koneksi.php'; 

 ?>
 <div class="dh12">
   <div class="card" >
     <center><h1>Kelola Obat</h1></center>

     <a href="<?php echo "?p=inp_obat"; ?>"><button type="button" name="tambah" class="btn btn-edit">Tambah Data</button></a><p></p>
     <br>
     <table style="border: 2px solid #5271FF" width="100%">
          <tr>
            <td colspan="8" align="center"><h2>Daftar Obat</h2> </td>
          </tr>
          <tr>
            <td colspan="8"><hr color="#5271FF"> </td>
          </tr>
       <tr >
         <th>Kode Obat</th>
         <th>Foto</th>
         <th>Nama Obat</th>
         <th>Harga</th>
         <th>Stok</th>
         <th>Jenis</th>
         <th>Satuan</th>
         <th>Aksi</th>
       </tr>
       <tr>
            <td colspan="8"><hr color="#5271FF"> </td>
          </tr>
       <?php
       $sql=mysqli_query($kon,"select * from tbl_obat");
       $cek=mysqli_num_rows($sql);
       if ($cek==0) {
         echo "<tr>
         <th colspan=7> Data Obat Belum Ada!</th>
         </tr>";
       }else {
         while ($rm=mysqli_fetch_array($sql)) {
           if(!empty($rm["foto"])){
           	$foto = "obat/$rm[foto]";
           }else{
           	$foto = "obat/obat.png";
           }
           $harga=number_format($rm['harga'], 0, ".", ".");
           echo "<tr height='100px'>
           <th>$rm[kd_obat]</th>
           <th><img src='$foto' alt='Avatar' style='width:80px'></th>
           <th>$rm[nm_obat]</th>
           <th>Rp. $harga</th>
           <th>$rm[stok]</th>
           <th>$rm[jenis_obat]</th>
           <th>$rm[satuan]</th>
           <th>
           <a href='damin.php?p=det_obat&kd=$rm[kd_obat]'><button type='button' class='btn btn-edit'>Detail</button></a>

           </th>
           </tr>";
           echo "<tr>
            <td colspan='8'><hr color='#5271FF'> </td>
          </tr>";
         }
       }

        ?>
        
     </table>
     <br>
   </div>
 </div>
