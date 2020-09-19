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
		<h1>Data Cash In</h1>
	</center>

  <?php

      require_once '../../command/connection.php';

   ?>

	<table border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Nominal</th>
            <th>Cabang</th>
        </tr>
    </thead>
    <tbody>

        <?php
                $i = 0;
                $query="SELECT tb_cabang.nm_cabang, tb_cashin.tanggal, tb_cashin.uraian, tb_cashin.nominal FROM tb_cashin INNER JOIN tb_cabang ON tb_cashin.id_cabang=tb_cabang.id_cabang";
                $result=$db->query($query);
                $num_result=$result->num_rows;
                if ($num_result > 0 ) {
                    while ($data=mysqli_fetch_assoc($result)) {
                    extract($data);
                    $i++;

        ?>

        <tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo date('d F Y', strtotime($tanggal)); ?></td>
            <td><?php echo $uraian; ?></td>
            <td><?php echo $nominal; ?></td>
            <td><?php echo $nm_cabang;?></td>
        </tr>

        <?php  }} ?>

    </tbody>
	</table>
</body>
</html>
