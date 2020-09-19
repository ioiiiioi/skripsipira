<?php 

    require_once '../../command/connection.php';
    
 ?>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Data User</strong>
                                <a href="?hal=tambah_data_user" class="btn btn-success float-right ">Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Cabang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no=1;
                                        $query="SELECT * FROM tb_user WHERE status_aktif='1'";
                                        $result=$db->query($query);
                                        $num_result=$result->num_rows;
                                        if ($num_result > 0 ) { 
                                            while ($data=mysqli_fetch_assoc($result)) {
                                            extract($data);

                                            $query = mysqli_query($db, "SELECT * FROM tb_cabang WHERE id_cabang = $id_cabang");
                                            $cabang = mysqli_fetch_assoc($query);
                                    ?>
                                        <tr>
                                            <td><?php echo $id_user; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $luser; ?></td>
                                            <td><?php echo $cabang["nm_cabang"]; ?></td>
                                            <td>
                                             <a href="?hal=edit_data_user&id=<?php echo $id_user; ?>" class="btn btn-primary">Edit</a>
                                            
                                            <a href="../../command/curd.php?hapus=user&id=<?php echo $id_user ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $nm_user;?> ?')">Delete</a>
                                        </tr>
                                    <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


