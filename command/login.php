<?php
session_start();

include ("connection.php");

if (isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"]; 

	$query = mysqli_query ($db, "SELECT * FROM tb_user WHERE username='$username' AND password = '$password'");

	$cek = mysqli_num_rows($query);
  $data = mysqli_fetch_assoc($query);

 // 		var_dump($data);
	// die;

    //pisahin pakai WHERE

    if($cek > 0){

        if ($data["luser"] == "Manager Keuangan") {
          $_SESSION['keuangan'] = $data["id_user"];

          // var_dump($_SESSION);
          // die;

          if (isset($_SESSION['keuangan'])) {
          header("location: ../pages/keuangan/dashboard.php");
            }


        }

        if ($data["luser"] == "Keuangan Cabang") {
          $_SESSION['cabang'] = $data["id_user"];
          // var_dump($_SESSION);
          // die;

          if (isset($_SESSION['cabang'])) {
          header("location: ../pages/cabang/index.php");
            }

        }

        if ($data["luser"] == "Keuangan Pusat") {
          $_SESSION['pusat'] = $data["id_user"];          
          // var_dump($_SESSION);
          // die;

          if (isset($_SESSION['pusat'])) {
          header("location: ../pages/pusat/index.php");
            }

        }
        
    }

    else{
      echo "<script>window.location='../login.php';</script>";
    }
}


    


?>