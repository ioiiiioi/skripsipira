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

    <section class="content-header">
      <div class="container">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-8 p-5">
              <div class="card">
                <div class="card-header"><h2>Form Tambah Cash Out</h2></div>
                <div class="card-body card-block">
                  <form action="#" method="post" class="">
                    <div class="form-group">
                      <div>
                        <label>Uraian</label>
                        <div>
                        <textarea name="textarea-input" id="textarea-input" rows="2" class="form-control col-sm-8"></textarea>
                        </div>
                      </div>
                      <div>
                      <label>Cabang</label>
                         <select class="form-control select2 col-sm-8" style="width: 100%;">
                         <option selected="selected"></option>
                         <option>Balikpapan</option>
                         <option>Bandung</option>
                         <option>Jakarta</option>
                         <option>Lampung</option>
                        <option>Majalengka</option>
                         <option>Pontianak</option>
                         </select>
                        </div>
                        <div>
                        <label>Tanggal</label>
                        <input type="date" name="" class="form-control col-sm-8">
                        </div>
                        <div>
                        <label>Nominal</label>
                        <input type="text" name="" class="form-control col-sm-8">
                        </div>
                    <div class="form-actions form-group">
                   </div>
                    <button type="submit" class="btn btn-info">Simpan</button> |
                    <button type="submit" class="btn btn-danger">Batal</button>
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