

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Data Bagian</strong>
                                <a href="?hal=tambah_data_bagian" class="btn btn-success float-right ">Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Bagian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $stat = 1;
                                            $query="SELECT * FROM tb_bagian WHERE status_aktif='1'";
                                            $result=$db->query($query);
                                            $num_result=$result->num_rows;
                                            if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>

                                        <tr>
                                            <td><?php echo $id_bagian; ?></td>
                                            <td><?php echo $nm_bagian; ?></td>
                                            <td>

                                            <a href="?hal=edit_data_bagian&id=<?php echo $id_bagian; ?>" class="btn btn-primary">Edit</a>
                                            
                                            <a href="../../command/curd.php?hapus=bagian&id=<?php echo $id_bagian ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $nm_bagian;?> ?')">Delete</a>

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


        <div class="clearfix"></div>

