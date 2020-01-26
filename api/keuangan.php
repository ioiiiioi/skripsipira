<?php
    include("../command/connection.php");

    // $name = $_POST['name']
    $id_mhs = $_GET['id_mhs']
    $sql ="SELECT * FROM tb_preg WHERE id_mahasiswa=$id_mhs"
    $result=$db->query($sql);
    $num_result=$result->num_rows;

    $data = array(
        'id_mahasiswa' =>
    )

    // $data = array(
    //     'id' => 1,
    //     'username' => "Jefri",
    //     "passsword" => "Hutama"
    // );

    // echo json_encode($data);
    
    // dapetin nilai query params
    $id = $_GET['id'];
    echo $id;

    // dapetin nilai post
    // $name = $_POST['name']


?>