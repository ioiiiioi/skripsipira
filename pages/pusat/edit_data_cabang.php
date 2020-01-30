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

      $query = mysqli_query($db, "SELECT * FROM tb_cabang WHERE id_cabang = '$id'");
      $place = mysqli_fetch_assoc($query);

  }

 ?>
 

<body>
  <section class="content-header">
    <div class="container">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-8 p-5">
            <div class="card">
              <div class="card-header"><h2>Form Tambah Data Cabang</h2></div>
                <div class="card-body card-block">

                  <form action="../../command/curd.php" method="post" class="">
                    <div class="form-group">
                      <label>Nama Cabang </label>
                        <input type="text" name="nama_cabang" class="form-control col-sm-8" placeholder="<?php echo $place['nm_cabang']; ?>">
                    </div>
                    <div class="form-actions form-group">
                      <input type="text" name="id_cabang" value="<?php echo $id; ?>" hidden="true">
                    <button type="submit" name="edit_cabang" class="btn btn-info"> Simpan</button>|
                    <a href="?hal=data_cabang" class="btn btn-danger">Batal</a>
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