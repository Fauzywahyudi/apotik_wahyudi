
	<center>
<?php
include 'koneksi.php';


		$gejala=mysqli_query($kon,"select * from indeks where jenis='Gejala' and ket='Umum'");
		$jml=mysqli_num_rows($gejala);

		?>
		<h3 class="style2"><h1>Konsultasi</h1></h3>
		<hr>
		<p><span class="style1"><h3>Jawablah Pertanyaan Sesuai dengan Gejala Yang Anda Rasakan!!!</span><?php echo "$_GET[hal]"; ?> <span class="style1">dari</span> <?php echo "$jml"; ?></h3></p>
		<hr>
		<?php
		$posisi=$_GET['hal']-1;
		$g=mysqli_query($kon,"select * from indeks where ket='umum' order by id asc limit $posisi,1");
		$r=mysqli_fetch_array($g);
		?>
		<br>
<table class='table'>
<tr> <td align='center'> <span class="style1"><b>Apakah anda merasa </span><?php echo "$r[nama] "; ?>  ..?</b></td>
</tr>

<tr>
	<?php
	if(isset($_GET['gjl'])!=""){
	$gjl="$_GET[gjl],$r[id]";
}else{
	$gjl="$r[id]";
}
?>

<form class="" action="" method="post">


  <td colspan="2" align="center"> <input type="submit" name="btn_ya" value="Ya" id="btn_ya"  >
 <input type="submit" name="btn_tidak" value="Tidak" id="btn_tidak" > </td>

</tr>

</form>



<?php

$id=$r[0];
$nama=$r[1];
$jenis="Gejala";
$ket=$r[3];
?>
</table>
<br>
<hr>

<?php

if($jml=="$_GET[hal]"){
			if (isset($_POST['btn_ya'])) {

			$sqlins=mysqli_query($kon,"insert into fakta_baru values ('$id','$nama','$jenis','$ket')");
			?>


			<?php
			echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=hasilkonsultasi&penyakit=$_GET[penyakit]&gjl=$gjl'>";


			}
			if (isset($_POST['btn_tidak'])) {
				echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=hasilkonsultasi&penyakit=$_GET[penyakit]&gjl=$_GET[gjl]'>";

			}

	}else{
		$hal=$_GET['hal']+1;

		if (isset($_POST['btn_ya'])) {

		$sqlins=mysqli_query($kon,"insert into fakta_baru values ('$id','$nama','$jenis','$ket')");
		echo "<META HTTP-EQUIV='Refresh' Content='0.5; URL=?p=konsultasi&hal=$hal&penyakit=$_GET[penyakit]&gjl=$gjl'>";


		}
		if (isset($_POST['btn_tidak'])) {
			echo "<META HTTP-EQUIV='Refresh' Content='0.5; URL=?p=konsultasi&hal=$hal&penyakit=$_GET[penyakit]&gjl=$_GET[gjl]'>";

		}

	}



 ?>


<?php

if(isset($_POST['konsul'])){
	$no = 1;
	$sqlm1 = mysqli_query($kon, "select * from indeks where ket='Umum'");
	while($rm = mysqli_fetch_array($sqlm1)){
		$var_tanya=$rm['id'];
		$var_nama=$rm['nama'];
		$var_jawab=$_POST[$no];
		if($var_jawab=='Y'){
			$fakta=mysqli_query($kon,"insert into fakta_baru values('$var_tanya','$var_nama','Gejala',null) ");
		}
			$no++;
	}

	$q_penyakit=mysqli_query($kon,"select * from fakta_baru where jenis='Penyakit'");
	$array_hasil=mysqli_fetch_array($q_penyakit);
	$penyakit_user=$array_hasil['id'];

	if ($penyakit_user=="P01") {
		include 'P01.php';
	}else if ($penyakit_user=="P02") {
		include 'P02.php';
	}else if ($penyakit_user=="P03") {
		include 'P03.php';
	} else if ($penyakit_user=="P04") {
		include 'P04.php';
	}



}







function hasil(){

 include "koneksi.php";
 	$q_penyakit=mysqli_query($kon,"select * from fakta_baru where jenis='Penyakit'");
	$array_hasil=mysqli_fetch_array($q_penyakit);
	echo "<center>Penyakit Anda <b>$array_hasil[nama] </b>";
// 	if ($num_hasil>0) {
// 		$ambil_nama=mysqli_fetch_array($q_penyakit);
// 		$nama_sakit=$ambil_nama['nama'];
// 		echo "Anda Terdiagnosa Penyakit <b>$nama_sakit </ b>";
// 	}else{
// 		echo "Anda tidak Terdiagnosa Penyakit";
// 	}

}


if(isset($_POST['reset'])){
	$clear_table=mysqli_query($kon,"truncate table fakta_baru");
	$clear_stack=mysqli_query($kon,"truncate table stack");
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?page=sakit'>";

}



	?>
