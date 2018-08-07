	<?php 
	require_once'koneksi.php';
	?>

	<form method="post">
		<input type="text" name="nama" placeholder="cari ...">
		<input type="text" name="saldo" placeholder="cari saldo">
		
		<input type="submit" name="submit" value="cari">
	<form>
	<br/>
	<br/>

	<table border=1>
	<tr> 
		<td>NAMA</td>
		<td>SALDO</td>
		
	</tr>
	<?php
	if(!ISSET($_POST['submit'])){

	$sql = "SELECT nama, saldo FROM bank";
	$query = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($query)){

	?>
	<tr>
		<td><?php echo $row['nama']; ?></td>
		<td><?php echo $row['saldo']; ?></td>
		
	</tr>

	<?php } 
	}
	else{
		echo 'Data Tidak Ada';
	} ?>

	<?php if (ISSET($_POST['submit'])){
	 $cari = $_POST['nama'];
	 $carisaldo = $_POST['saldo'];
	 
	 $query2 = "SELECT nama,saldo FROM bank WHERE nama LIKE '%$cari%' AND saldo LIKE '%$carisaldo%' ";
	 
	 $sql = mysqli_query($conn, $query2);
	 while ($r = mysqli_fetch_array($sql)){
	  ?>
	<tr>
	 <td><?php echo $r['nama']; ?></td>
	<td><?php echo $r['saldo']; ?></td>


	</tr>  
	 <?php }} ?>

	</table>