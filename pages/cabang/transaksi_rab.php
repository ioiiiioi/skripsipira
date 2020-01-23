

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Transaksi RAB</strong>
                                <a href="tambah_transaksi_rab.php" class="btn btn-success float-right ">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Anggaran</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $no=1;
                                            $query="SELECT * FROM tb_transrab";
                                            $result=$db->query($query);
                                            $num_result=$result->num_rows;
                                            if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>
                                                <?php 
                                                    $query = mysqli_query($db, "SELECT nm_anggaran FROM tb_anggaran WHERE id_anggaran = '$id_anggaran'");
                                                    $get = mysqli_fetch_array ($query);

                                                    echo $get['nm_anggaran'];
                                                 ?>  
                                            </td>
                                            <td><?php echo $tanggal; ?></td>
                                            <td><?php echo $keterangan; ?></td>
                                            <td><?php echo number_format($nominal); ?></td>
                                        </tr>

                                        <?php }} ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


        <div class="clearfix"></div>

