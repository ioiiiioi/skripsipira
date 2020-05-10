<?php

header("Content-Type:application/json");

if (isset($_GET['id_mahasiswa']) && $_GET['id_mahasiswa']!="") {

    include("../command/connection.php");
     $order_id = $_GET['id_mahasiswa'];
     $result = mysqli_query($db, "SELECT * FROM `tb_preg` WHERE id_mahasiswa=$order_id");

     if(mysqli_num_rows($result)>0){
         $row = mysqli_fetch_array($result);
         $amount = $row['nominal'];
         $tanggal = $row['tanggal'];
         
         $sql_mhs = mysqli_query($db, "SELECT * FROM `tb_mahasiswa` WHERE id_mahasiswa=$order_id");
         $nama = mysqli_fetch_assoc($sql_mhs);
         $nama_mhs = $nama['nm_mahasiswa'];

         $ta = $row['id_ta'];
         $sql_ta = mysqli_query($db, "SELECT * FROM `tb_ta` WHERE id_ta=$ta");
         $tahun = mysqli_fetch_assoc($sql_ta);
         $tahun_ajaran = $tahun['tahun'];

         $response_code = 200;
         $response_desc = "OK";
         // $response_code = $row['response_code'];
         // $response_desc = $row['response_desc'];
         response($order_id, $nama_mhs, $tanggal, $amount, $tahun_ajaran, $response_code,$response_desc);
         mysqli_close($db);
         }

     else{
         response(NULL, NULL, NULL, NULL, NULL, 404,"No Record Found");
         }
}

else{
     response(NULL, NULL, NULL, NULL, NULL, 400,"Invalid Request");
     }
 
function response($order_id,$nama_mhs,$tanggal,$amount,$tahun_ajaran,$response_code,$response_desc){
 $response['id_mahasiswa'] = $order_id;
 $response['nama_mahasiswa'] = $nama_mhs;
 $response['tanggal'] = $tanggal;
 $response['amount'] = $amount;
 $response['response_code'] = $response_code;
 $response['response_desc'] = $response_desc;
 
 $json_response = json_encode($response);
 echo $json_response;
}
?>
<!-- ENDPOINT [GET] http://localhost/skripsipira/api/keuangan.php?id_mahasiswa=['id_mahasiswa'] -->