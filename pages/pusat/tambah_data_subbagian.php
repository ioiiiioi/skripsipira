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
                      <div>
                        <label> Pilih Bagian </label>
                        <select class="form-control col-sm-8" name="idBagian">
                        <option style="font-weight: bold;"> Pilih Bagian </option>
                            <?php
                                $no = 1;
                                $query="SELECT * FROM tb_bagian";
                                $result=$db->query($query);
                                $num_result=$result->num_rows;
                                   if ($num_result > 0 ) { 
                                   while ($data=mysqli_fetch_assoc($result)) {
                                extract($data);
                            ?>
                            <option value="<?php echo $id_bagian; ?>"><?php echo $no++; ?> | <?php echo $nm_bagian; ?></option>
                             <?php }} ?>
                        </select>
                      </div>
                      <label>Nama Data Subbagian </label>
                        <input type="text" name="nama_subbagian" class="form-control col-sm-8">
                    </div>
                    <div class="form-actions form-group">
                    <button type="submit" class="btn btn-info" name="tambah_subbagian">Simpan</button> |
                    <a href="?hal=data_subbagian" class="btn btn-danger">Batal</a>
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
        <div class="clearfix"></div>

</body>

<?php
}else{
    echo "<script>window.location='../../login.php';</script>";
}
?>