<?php 
  if (!isset($_SESSION)) {
        session_start();
    }

require_once '../../command/connection.php';

if (isset($_SESSION["pusat"])) {
  $hal = @$_GET['hal'];
  $id = $_SESSION['pusat'];

  $query = mysqli_query($db, "SELECT * FROM tb_user WHERE id_user = '$id'");
  $extract = mysqli_fetch_assoc($query);

  extract($extract);

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$query = mysqli_query($db, "SELECT * FROM tb_user WHERE id_user = '$id'");
	$place = mysqli_fetch_assoc($query);

	// var_dump($id);
	// die;
}

 ?>


<body>

    <section class="content-header">
      <div class="container">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-8 p-5">
              <div class="card">
                <div class="card-header"><h2>Form Tambah Data User</h2></div>
                <div class="card-body card-block">

                  <form action="../../command/curd.php" method="post" class="">
                    <div class="form-group">
                      <div>
                        <label>Nama</label>
                        <input type="hidden" name="id_user" class="form-control col-sm-8" value="<?php echo $place['id_user']; ?>">

                        <input type="text" name="name" class="form-control col-sm-8" placeholder="<?php echo $place['nm_user']; ?>">
                      </div>
                      <label>No Telepon</label>
                        <input type="text" name="telp" class="form-control col-sm-8" placeholder="<?php echo $place['notlp']; ?>">
                      <label>Jenis Kelamin</label>
                        <div class="form-group">
                          <input type="radio" name="kelamin"
                            <?php if (isset($gender) && $gender=="Laki-Laki") echo "checked";?>
                            value="Laki-Laki">Laki-Laki
                          <input type="radio" name="kelamin"
                            <?php if (isset($gender) && $gender=="Perempuan") echo "checked";?>
                            value="Perempuan">Perempuan
                        </div>
                      <label>E-Mail</label>
                        <input type="email" name="email" class="form-control col-sm-8" placeholder="<?php echo $place['email']; ?>">
                      <label>Username</label>
                        <input type="Username" name="username" class="form-control col-sm-8" placeholder="<?php echo $place['username']; ?>">
                      <label>Password</label>
                        <input type="Password" name="password" class="form-control col-sm-8">

                      <label>Level User</label>
                         <select name="level" class="form-control select2 col-sm-8" style="width: 100%;">
                         <option selected="selected"></option>
                         <option>Manager Keuangan</option>
                         <option>Keuangan Pusat</option>
                         <option>Keuangan Cabang</option>
                         </select>
                       </div>
                    <div class="form-actions form-group">
                    <button type="submit" class="btn btn-info" name="edit_user">Simpan</button> |
                    <a class="btn btn-danger" href="index.php?hal=data_user">Batal</a>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

</body>
<?php
}else{
    echo "<script>window.location='../../login.php';</script>";
}
?>