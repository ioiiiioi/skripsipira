

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Data Anggaran</strong>
                                <a href="?hal=tambah_data_anggaran" class="btn btn-success float-right ">Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sub Bagian</th>
                                            <th>Nama Anggaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $query="SELECT tb_subbagian.nm_subbagian, tb_anggaran.nm_anggaran FROM tb_anggaran INNER JOIN tb_subbagian ON tb_anggaran.id_subbagian=tb_subbagian.id_subbagian";
                                            $result=$db->query($query);
                                            $no = 1;
                                            $num_result=$result->num_rows;
                                            if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $nm_subbagian; ?></td>
                                            <td><?php echo $nm_anggaran; ?></td>
                                            <td>
                                            
                                            <a href="?hal=edit_data_anggaran&id=<?php echo $id_anggaran; ?>" class="btn btn-primary">Edit</a>
                                            
                                            <a href="../../command/curd.php?hapus=anggaran&id=<?php echo $id_anggaran ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $nm_anggaran;?> ?')">Delete</a>

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

