

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Transaksi</strong>
                                <a href="?hal=tambah_transaksi_rab" class="btn btn-success float-right ">Tambah Data</a>
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
                                            $no=0;
                                            $query="SELECT tb_anggaran.nm_anggaran, tb_transrab.tanggal, tb_transrab.keterangan,tb_transrab.nominal FROM tb_transrab INNER JOIN tb_anggaran ON tb_transrab.id_anggaran=tb_anggaran.id_anggaran";
                                            $result=$db->query($query);
                                            $num_result=$result->num_rows;
                                            if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                $no++;
                                                extract($data);
                                        ?>

                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $nm_anggaran;?></td>
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

