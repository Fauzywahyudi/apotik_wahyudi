<a href="<?php echo "?p=mhsadd"; ?>">Tambah Data</a>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th>No</th>
    <th>Foto</th>
    <th>No BP </th>
    <th>Nama Lengkap </th>
    <th>Kelas</th>
    <th>Aksi</th>
  </tr>
  <?php
  $sqlm = mysqli_query($kon, "select * from mahasiswa order by tglreg desc");
  $no = 1;
  while($rm = mysqli_fetch_array($sqlm)){
    echo "<tr>
		<td>$no</td>
		<td><img src='foto/$rm[foto]' width='150px'></td>
		<td>$rm[nobp]</td>
		<td>$rm[nama]</td>
		<td>$rm[kelas]</td>
		<td><a href='?p=mhsedit&idm=$rm[id]'>Ubah</a> | 
		    <a href='?p=mhsdel&idm=$rm[id]'>Hapus</a></td>
	  </tr>";
    $no++;
  }
  ?>
</table>
