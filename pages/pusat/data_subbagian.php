

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Data Sub Bagian</strong>
                                <a href="?hal=tambah_data_subbagian" class="btn btn-success float-right ">Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>   
                                            <th>Id Bagian</th>
                                            <th>Id Subbagian</th>
                                            <th>Nama Sub Bagian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $query="SELECT * FROM tb_subbagian";
                                            $result=$db->query($query);
                                            $num_result=$result->num_rows;
                                            if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>


                                        <tr>
                                            <td><?php echo $id_bagian; ?></td>
                                            <td><?php echo $id_subbagian; ?></td>
                                            <td><?php echo $nm_subbagian; ?></td>
                                            <td>
                                             
                                             <a href="?hal=edit_data_subbagian&id=<?php echo $id_subbagian; ?>" class="btn btn-primary">Edit</a>
                                            
                                            <a href="../../command/curd.php?hapus=subbagian&id=<?php echo $id_subbagian ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $nm_subbagian;?> ?')">Delete</a>

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

