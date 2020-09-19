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
                        <table  class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
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
                                            $query="SELECT * FROM tb_prodi WHERE status_aktif='1' ORDER BY jenjang ASC";
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
                                            <a href="?hal=edit_data_prodi&id=<?php echo $id_prodi; ?>" class="btn btn-primary">Edit</a>
                                            <a href="../../command/curd.php?hapus=prodi&id=<?php echo $id_prodi; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $nm_prodi;?> ?')">Delete</a>
                                        </td>
                                    </tr>

                                    <?php }} ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
