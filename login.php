<?php 

  session_start();

  require 'command/connection.php';

    if (isset($_POST["login"])) {
      
      $username = $_POST["username"];
      $password = $_POST["password"];

      $query = mysqli_query($db, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'");

      $cek = mysqli_num_rows($query);
      $data = mysqli_fetch_assoc($query);

      var_dump($data);

      if($cek > 0){
        if ($data['jabatan']=='admin') {

          $_SESSION['log_admin'] = $data["id_user"];
          header("location: index.php");

        }else{
          $_SESSION['log_kasir'] = $data["id_user"];
          header("location: index.php");
        }
      }

      $error = true;

    }
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Login</title>
  </head>
  <body>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-sm-8 p-5">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="text-center font-weight-bold text-primary">SEKOLAHNYA</h3>
								<h3 class="text-center font-weight-bold text-primary">PAK AWANG</h3>	
							</div>
							<div class="card-body p-5">
								<p class="font-weight-bold">Silahkan masukkan Username Dan Password</p>
								<form action="command/login.php" method="post">
								  <div class="form-group pb-3">
								    <label for="exampleInputEmail1"><i class="fa fa-user"></i>Username</label>
								    <input type="text" class="form-control col-sm-8" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
								  </div>
								  <div class="form-group pb-3">
								    <label for="exampleInputPassword1"><i class="fa fa-unlock-alt"></i>Password</label>
								    <input type="password" name="password" class="form-control col-sm-8" id="password" placeholder="Password">
								    
          							
								  </div>
								  <button type="submit" name="login" class="btn btn-outline-primary col-sm-8">Login</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>