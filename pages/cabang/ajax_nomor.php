<?php 

require_once '../../command/connection.php';

	$id=$_POST['id'];

    $query="SELECT * FROM tb_prodi WHERE id_prodi='$id'";
    $result=$db->query($query);
    $data=mysqli_fetch_assoc($result);

	echo json_encode($data);


?>