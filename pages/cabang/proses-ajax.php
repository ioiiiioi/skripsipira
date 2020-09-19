<?php
require_once '../../command/connection.php';
$mhs = $_POST['mhs'];
$query = $db->query("SELECT * FROM tb_mahasiswa JOIN tb_prodi ON tb_mahasiswa.id_prodi=tb_prodi.id_prodi WHERE tb_mahasiswa.id_mahasiswa='$mhs'");
$data = mysqli_fetch_array($query);
 echo json_encode($data);
?>
