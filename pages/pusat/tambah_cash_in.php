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
                <div class="card-header"><h2>Form Tambah Cash In</h2></div>
                <div class="card-body card-block">
                  <form action="../../command/curd.php" method="POST" class="">
                    <div class="form-group">
                        
                      <div>
                        <label>Uraian</label>
                        <textarea name="uraian" id="textarea-input" rows="2" class="form-control col-sm-8"></textarea>
                      </div>
                        

                      <br>
                      <div>
                      <label>Cabang</label>
                         <select class="form-control select2 col-sm-8" name="id_cabang" style="width: 100%;">
                         <option selected="selected" hidden="true">Pilih Cabang</option>
                         <?php
                            $no=1;
                            $query="SELECT * FROM tb_cabang";
                            $result=$db->query($query);
                            $num_result=$result->num_rows;
                            if ($num_result > 0 ) { 
                                while ($data=mysqli_fetch_assoc($result)) {
                                extract($data);
                        ?>
                         <option value="<?php echo $id_cabang; ?>" class="text-uppercase"><?php echo $nm_cabang; ?></option>

                        <?php }} ?>
                         </select>
                        </div>

                        <br>
                        <div>
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control col-sm-8">
                        </div>

                        <br>
                        <div>
                        <label>Nominal</label>
                        <input type="text" name="nominal" class="form-control col-sm-8">
                        <input type="text" name="id_user" value="<?php echo $id; ?>" hidden='true'>
                        </div>

                        <br>
                          <div class="form-actions form-group float-left">
                              <button type="submit" class="btn btn-info" name="tambah_cashin">Simpan</button>
                              <button type="submit" class="btn btn-danger">Batal</button>
                         </div>
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
