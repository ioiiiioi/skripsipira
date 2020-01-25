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

	$query = mysqli_query($db, "SELECT * FROM tb_subbagian WHERE id_subbagian = '$id'");
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
                <div class="card-header"><h2>Form Tambah Data Subbagian</h2></div>
                <div class="card-body card-block">
                  <form action="../../command/curd.php" method="post" class="">
                    <div class="form-group">

                      <label>Nama Data Subbagian </label>

                      	<input type="hidden" name="id_bagian" class="form-control col-sm-8" value="<?php echo $place['id_bagian']; ?>">

                      	<input type="hidden" name="id_subbagian" class="form-control col-sm-8" value="<?php echo $place['id_subbagian']; ?>">

                        <input type="text" name="nama_subbagian" class="form-control col-sm-8" placeholder="<?php echo $place['nm_subbagian']; ?>">

                    </div>
                    <div class="form-actions form-group">
                    <button type="submit" class="btn btn-info" name="edit_subbagian">Simpan</button> |
                    <a class="btn btn-danger" href="index.php?hal=data_subbagian">Batal</a>
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