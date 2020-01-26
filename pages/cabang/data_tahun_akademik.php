

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Data Tahun Akademik</strong>
                                <a href="?hal=tambah_tahun_akademik" class="btn btn-success float-right ">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tahun Akademik</th>
                                            <th>Mulai Kuliah</th>
                                            <th>Selesai Kuliah</th>
                                            <th>Semester Saat ini</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $query="SELECT * FROM tb_ta WHERE status_aktif='1'";
                                            $result=$db->query($query);
                                            $num_result=$result->num_rows;
                                            if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>

                                        <tr>
                                            <td><?php echo $tahun; ?></td>
                                            <td><?php echo $mulai; ?></td>
                                            <td><?php echo $selesai; ?></td>
                                            <td><?php echo $semester; ?></td>
                                            <td>
                                             <a href="?hal=edit_tahun_akademik&id=<?php echo $id_ta; ?>" class="btn btn-primary">Edit</a> | 
                                             <a href="../../command/curd.php?hapus=TA&id=<?php echo $id_ta; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data TA <?php echo $tahun;?> ?')">Hapus</a>
                                            </td>
                                        </tr>

                                        <?php }} ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


        <div class="clearfix"></div>

