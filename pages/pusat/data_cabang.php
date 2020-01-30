<?php 

    require_once '../../command/connection.php';
    
 ?>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Data Cabang</strong>
                                <a href="?hal=tambah_data_cabang" class="btn btn-success float-right ">Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Cabang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $no=1;
                                        $query="SELECT * FROM tb_cabang WHERE status_aktif = '1'";
                                        $result=$db->query($query);
                                        $num_result=$result->num_rows;
                                        if ($num_result > 0 ) { 
                                            while ($data=mysqli_fetch_assoc($result)) {
                                            extract($data);
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $nm_cabang; ?></td>
                                            <td>
                                             <a href="?hal=edit_data_cabang&id=<?php echo $id_cabang; ?>" type="button" class="btn btn-primary">Edit</a> | 
                                             <a href="../../command/curd.php?hapus=cabang&id=<?php echo $id_cabang;?>" type="button" class="btn btn-danger">Hapus</a>
                                            </td>
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

