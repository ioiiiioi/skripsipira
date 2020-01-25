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
                <div class="card-header"><h2>Form Tambah Data User</h2></div>
                <div class="card-body card-block">

                  <form action="../../command/curd.php" method="post" class="">
                    <div class="form-group">
                      <div>
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control col-sm-8">
                      </div>
                      <label>No Telepon</label>
                        <input type="text" name="telp" class="form-control col-sm-8">
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
                        <input type="email" name="email" class="form-control col-sm-8">
                      <label>Username</label>
                        <input type="Username" name="username" class="form-control col-sm-8">
                      <label>Password</label>
                        <input type="Password" name="password" class="form-control col-sm-8">
                        <label>Cabang</label>
                         <select name="cabang" class="form-control select2 col-sm-8" style="width: 100%;">

                          <option></option>

                          <?php
                              $no=1;
                              $query="SELECT * FROM tb_cabang";
                              $result=$db->query($query);
                              $num_result=$result->num_rows;
                              if ($num_result > 0 ) { 
                                  while ($data=mysqli_fetch_assoc($result)) {
                                  extract($data);
                          ?>

                         <option value="<?php echo $id_cabang ?>"><?php echo $nm_cabang; ?></option>

                          <?php }} ?>

                       </select>

                      <label>Level User</label>
                         <select name="level" class="form-control select2 col-sm-8" style="width: 100%;">
                         <option selected="selected"></option>
                         <option>Manager Keuangan</option>
                         <option>Keuangan Pusat</option>
                         <option>Keuangan Cabang</option>
                         </select>
                       </div>
                    <div class="form-actions form-group">
                    <input type="submit" name="tambah_user" class="btn btn-info"></input> |
                    <a href="?hal=data_user" type="submit" name="hapus" class="btn btn-danger">Batal</a>
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