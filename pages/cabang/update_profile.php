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
}
 ?>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row ">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Update Profile</strong>
                            </div>
                                <div class="card-body">

                                <div>
                                <form action="../../command/curd.php" method="post" class="">
                                  <input type="text" name="id_user" class="form-control" hidden="true" value=<?php echo $extract['id_user'];?>>
                                <label>Nama</label>
                                    <input type="text" name="nm_user" class="form-control"  placeholder="Enter Nama" value="<?php echo $extract['nm_user'];?>">
                                </div>
                                <div>
                                <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo $extract['username'];?>">
                                </div>
                                <div>
                                <label>Password</label>
                                    <input type="text" name="password" class="form-control"  placeholder="Enter Password" value="<?php echo $extract['password'];?>">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-info mt-3" name="update_profile">Simpan</button>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="clearfix"></div>
        <br><br><br><br>
        <br><br><br><br>
        <br><br><br><br>
