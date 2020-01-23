<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title ">Data Prodi</strong>
                        <a href="?hal=tambah_program_studi" class="btn btn-success float-right ">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama Program Studi</th>
                                    <th>No Izin</th>
                                    <th>Ketua Prodi</th>
                                    <th>Jenjang</th>
                                    <th>Semester</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                            $query="SELECT * FROM tb_prodi";
                                            $result=$db->query($query);
                                            $num_result=$result->num_rows;
                                            if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>

                                    <tr>
                                        <td>
                                            <?php echo $id_prodi; ?>
                                        </td>
                                        <td>
                                            <?php echo $nm_prodi; ?>
                                        </td>
                                        <td>
                                            <?php echo $no_izin; ?>
                                        </td>
                                        <td>
                                            <?php echo $ketua; ?>
                                        </td>
                                        <td>
                                            <?php echo $jenjang; ?>
                                        </td>
                                        <td>
                                            <?php echo $semester; ?>
                                        </td>
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