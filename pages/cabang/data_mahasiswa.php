

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Data Mahasiswa</strong>
                                <a href="?hal=tambah_mahasiswa" class="btn btn-success float-right ">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Program Studi</th>
                                            <th>Nomer Mahasiswa</th>
                                            <th>Nama  Mahasiswa</th>
                                            <th>E-mail</th>
                                            <th>Nomer Telepon</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $query="SELECT tb_prodi.nm_prodi, tb_mahasiswa.id_mahasiswa, tb_mahasiswa.nm_mahasiswa, tb_mahasiswa.email, tb_mahasiswa.notlp, tb_mahasiswa.jkelamin FROM tb_mahasiswa INNER JOIN tb_prodi ON tb_mahasiswa.id_prodi=tb_prodi.id_prodi WHERE tb_mahasiswa.status_aktif='1'";
                                            $result=$db->query($query);
                                            $num_result=$result->num_rows;
                                            if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>
                                        <tr>
                                            <td><?php echo $nm_prodi; ?></td>
                                            <td><?php echo $id_mahasiswa; ?></td>
                                            <td><?php echo $nm_mahasiswa; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $notlp; ?></td>
                                            <td><?php echo $jkelamin; ?></td>
                                            <td>
                                                <a href="?hal=edit_data_mahasiswa&id=<?php echo $id_mahasiswa; ?>" class="btn btn-primary">Edit</a> | 
                                                <a href="../../command/curd.php?hapus=mahasiswa&id=<?php echo $id_mahasiswa; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $nm_mahasiswa; ?> ?')">Delete</a>
                                            </td>
                                        </tr>

                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


        <div class="clearfix"></div>

