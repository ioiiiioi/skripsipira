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

  // echo $id;

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
                        <input type="text" name="nama_cabang" class="form-control col-sm-8">
                    </div>
                    <div class="form-actions form-group">
                    <input type="submit" name="tambah_cabang" value="tambah" class="btn btn-info"> |
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