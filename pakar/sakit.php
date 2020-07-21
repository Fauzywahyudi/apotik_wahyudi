<?php
include 'koneksi.php';
$clear_table=mysqli_query($kon,"truncate table fakta_baru");
$clear_stack=mysqli_query($kon,"truncate table stack");

 ?>
<p></p>
 <div class="d12" align="center">
   <b><h1><u>Halaman Konsultasi</u></h1></b>
   <br>
 </div>

    <center>
  	<form id="form_konsul" name="form_konsul" method="post" action="" enctype="multipart/form-data">
  	<table id="tbl_tanya"  width="50%" border="0">
  		<tr >
  			<th >Anda Sakit Apa? </th>
        <th align="left" ><select class="sakit" name="sakit">
          <option value=''>Belum Tahu</option>
  							<?php
  								include "koneksi.php";
  							$sqlm = mysqli_query($kon, "select * from indeks where jenis='penyakit'");
  									while($rm = mysqli_fetch_array($sqlm)){
  									echo "<option value='$rm[nama]'>$rm[nama]</option>";
  								}
  							?>

        </select> </th>
  		</tr>
      <tr>
        <td></td>
        <td  align="left"><input name="konfirm" type="submit" id="submit" value="konfirm" class="btn btn-edit" /></td>
      </tr>

  	</table>
    <br>


    <br>
    <br>
  	</form>


<?php

if (isset($_POST['konfirm'])) {

  if ($_POST['sakit']=="") {

    echo "<script language='JavaScript'>
        document.location='?p=konsultasifc&hal=1';
        </script>";

  }else {
    $penyakit_user=$_POST["sakit"];

    $ambil_sakit=mysqli_query($kon,"select * from indeks where nama='$penyakit_user'");
    $rmi=mysqli_fetch_array($ambil_sakit);
    $inser_sakit=mysqli_query($kon,"insert into stack values('$rmi[id]','$rmi[nama]','$rmi[jenis]','$rmi[ket]',1)");


    echo "<script language='JavaScript'>
        document.location='?p=konsultasi&hal=1&penyakit=$_POST[sakit]';
        </script>";
  }


}


 ?>
