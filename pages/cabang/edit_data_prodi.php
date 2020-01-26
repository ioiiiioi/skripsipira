<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

require_once '../../command/connection.php';

if (isset($_SESSION["cabang"])) {
  $hal = @$_GET['hal'];
  $id = $_SESSION['cabang'];

  $query = mysqli_query($db, "SELECT * FROM tb_user WHERE id_user = '$id'");
  $extract = mysqli_fetch_assoc($query);

  extract($extract);

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  
    $query = mysqli_query($db, "SELECT * FROM tb_prodi WHERE id_prodi = '$id'");
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
                <div class="card-header"><h2>Form Edit Data Program Studi</h2></div>
                <div class="card-body card-block">
                  <form action="../../command/curd.php" method="post" class="">
                    <div class="form-group">
                    
                      <div>
                        <label>Nama Prodi</label>
                        <input type="text" name="nama_prodi" class="form-control col-sm-8" placeholder=<?php echo $place['nm_prodi'];?>>
                        <input type="text" name="id_prodi" class="form-control" hidden="true" value=<?php echo $place['id_prodi'];?>>
                      </div>

                      <br>
                      <div>
                        <label>Jenjang</label>
                        <select type="text" name="jenjang" class="form-control col-sm-8">
                            <option selected="selected" hidden="true" value="<?php echo $place['jenjang'];?>"><?php echo $place['jenjang'];?></option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                        </select>
                      </div>

                      <br>
                      <div>
                        <label>Semester</label>
                        <select type="text" name="semester" class="form-control col-sm-8">
                              <option selected="selected" hidden="true" value="<?php echo $place['semester'];?>"><?php echo $place['semester'];?></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                          </select>
                      </div>

                      <br>
                      <div>
                        <label>Ketua Prodi</label>
                        <input type="text" name="nama_ketua" class="form-control col-sm-8" placeholder="<?php echo $place['ketua'];?>">
                      </div>

                      <br>
                      <div>
                        <label>Nomor Izin Program Studi</label>
                        <input type="text" name="no_izin" class="form-control col-sm-8" placeholder="<?php echo $place['no_izin'];?>">
                      </div>

                      <br>
                      <div class="form-actions form-group">
                        <button type="submit" class="btn btn-info" id="simpan" name="edit_prodi">Simpan</button> 
                        <a class="btn btn-danger" href="index.php?hal=data_prodi">Batal</a>
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