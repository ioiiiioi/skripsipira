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
  
    $query = mysqli_query($db, "SELECT * FROM tb_ta WHERE id_ta = '$id'");
    $place = mysqli_fetch_assoc($query);
  
  }
  

 ?>
    <div id="right-panel" class="">
        <section class="content-header">
            <div class="container">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-8 p-5">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Form Tambah Tahun Akademik</h2></div>
                                <div class="card-body card-block">
                                    <form action="../../command/curd.php" method="POST" class="">
                                        <div class="form-group">
                                           
                                                <input type="text" name="id_ta" value="<?php echo $place['id_ta']?>" hidden="true">
                                            <div>
                                                <label>Mulai Kuliah</label>
                                                <input type="date" name="mulai_kuliah" class="form-control col-sm-8" value="<?php echo $place['mulai'];?>">
                                            </div>        
                                                
                                            <br>
                                            <div>
                                                <label>Selesai Kuliah</label>
                                                <input type="date" name="selesai_kuliah" class="form-control col-sm-8" value="<?php echo $place['selesai'];?>">
                                            </div>    
                                                
                                            <br>
                                            <div>
                                                <label>Semester Saat Ini</label>
                                                <input type="text" name="semester" class="form-control col-sm-8"  placeholder="<?php echo $place['semester'];?>">
                                            </div>

                                            <br>
                                            <div class="form-actions form-group float-left">
                                                <button type="submit" class="btn btn-info" name="edit_tahun">Simpan</button>
                                                &nbsp;
                                                &nbsp;
                                                <a href="index.php?hal=data_tahun_akademik" class="btn btn-danger">Batal</a>
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

<?php
}else{
    echo "<script>window.location='../../login.php';</script>";
}
?>