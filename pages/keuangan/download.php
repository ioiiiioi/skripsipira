<!DOCTYPE html>
<html>
<head>
	<title>Cetak Cash In Excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Cash In.xls");
	?>

	<center>
		<h1>Data RAB</h1>
	</center>

  <?php

      require_once '../../command/connection.php';

   ?>

	 <table border="1">
			 <thead>
					 <tr>
							 <th>No</th>
							 <th>Tanggal</th>
							 <th>Sub Bagian</th>
							 <th>Keterangan</th>
							 <th>Anggaran</th>
							 <th>Nominal</th>
					 </tr>
			 </thead>
			 <tbody>
				 <?php
				 require_once '../../command/connection.php';

					 if (isset($_GET['id'])) {
						 $id = $_GET['id'];

						 $query = mysqli_query($db, "SELECT * FROM tb_transrab JOIN tb_anggaran ON tb_anggaran.id_anggaran=tb_transrab.id_anggaran JOIN tb_subbagian ON tb_subbagian.id_subbagian=tb_transrab.id_subbagian JOIN tb_user ON tb_user.id_user=tb_transrab.id_user JOIN tb_ta ON tb_ta.id_ta=tb_transrab.id_ta WHERE tb_transrab.id_transrab = '$id'");
						 $place = mysqli_fetch_assoc($query);
					 }
					?>

				 <tr>
					 <td>1</td>
					 <td><?php echo date('d F Y', strtotime($place['tanggal'])); ?></td>
					 <td><?php echo $place['nm_subbagian']; ?></td>
					 <td><?php echo $place['keterangan']; ?></td>
					 <td><?php echo $place['nm_anggaran']; ?></td>
					 <td>Rp. <?php echo number_format($place['nominal']); ?></td>
				 </tr>
			 </tbody>
	 </table>
</body>
</html>
