<?php 

if (!isset($_SESSION)) {
                session_start();
        }

        require_once '../../command/connection.php';


        if (isset($_SESSION["cabang"])) {
            $hal = @$_GET['hal'];
            $id = $_SESSION['cabang'];
 ?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row ">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title ">Pembayaran Registrasi</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="../../command/curd.php" method="post" class="">
                            <div>
                                <div class="form-group">
                                    <label>Id Mahasiswa</label>
                                    <select name="mhs" class="form-control" required>
                                        <option selected="selected" hidden="true"> Pilih Mahasiswa</option>
                                        <?php
                                        $query="SELECT * FROM tb_mahasiswa";
                                        $result=$db->query($query);
                                        $num_result=$result->num_rows;
                                        if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>
                                        <option value="<?php echo $id_mahasiswa; ?>">
                                                <?php echo $nm_mahasiswa; ?>
                                        </option>
                                    <?php }} ?>
                                    </select>
                                    <!-- <input type="text" name="" class="form-control"> -->
                                </div>
                                <br>
                                <div>
                                    <label>Prodi</label>
                                    <select name="prodi" class="form-control select2" style="width: 100%;"required>
                                        <option selected="selected" hidden="true"> Pilih Prodi</option>
                                        <?php
                                        $query="SELECT * FROM tb_prodi";
                                        $result=$db->query($query);
                                        $num_result=$result->num_rows;
                                        if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>
                                        <option value="<?php echo $id_prodi; ?>">
                                                <?php echo $nm_prodi; ?>
                                        </option>
                                    <?php }} ?>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label>Tahun Akademik</label>
                                    <select name="ta" class="form-control select2" style="width: 100%;" required>
                                        <option selected="selected" hidden="true">Pilih Tahun Akademik</option>
                                        <?php
                                        $query="SELECT * FROM tb_ta";
                                        $result=$db->query($query);
                                        $num_result=$result->num_rows;
                                        if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>
                                        <option value="<?php echo $id_ta; ?>">
                                                <?php echo $tahun; ?>
                                        </option>
                                    <?php }} ?>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" required>
                                </div>
                                <br>
                                <div>
                                    <label>Nominal</label>
                                    <input type="text" name="nominal" class="form-control" required>
                                </div>
                                <br>
                                <div>
                                    <label>Jenis Transaksi </label>
                                    <select class="form-control" name="jtans" required>
                                        <option selected="selected" hidden="true">Pilih Jenis Transaksi</option>
                                        <option value="transfer">Transfer</option>
                                        <option value="cash">Cash</option>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <div class="form-actions form-group">
                                    <input type="text" class="form-control" name="user" value="<?php echo $id; ?>" hidden>
                                    <button type="submit" name="input_registrasi" class="btn btn-info">Simpan</button>
                                    </div>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php
    }else{
        echo "<script>window.location='../../login.php';</script>";
    }
?>