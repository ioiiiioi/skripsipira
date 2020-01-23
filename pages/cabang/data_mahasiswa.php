

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
                                            <th>Id Program Studi</th>
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
                                            $query="SELECT * FROM tb_mahasiswa";
                                            $result=$db->query($query);
                                            $num_result=$result->num_rows;
                                            if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>
                                        <tr>
                                            <td><?php echo $id_prodi; ?></td>
                                            <td><?php echo $id_mahasiswa; ?></td>
                                            <td><?php echo $nm_mahasiswa; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $notlp; ?></td>
                                            <td><?php echo $jkelamin; ?></td>
                                            <td>
                                             <button type="button" class="btn btn-primary">Edit</button> | 
                                             <button type="button" class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>

                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


        <div class="clearfix"></div>

