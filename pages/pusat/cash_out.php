

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Data Cash Out</strong>
                                <a href="?hal=tambah_cash_out" class="btn btn-success float-right ">Tambah</a>
                                
                                <a href="?hal=cetak_cash_out" class="btn btn-info float-right ">Cetak</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Uraian</th>
                                            <th>Tujuan</th>
                                            <th>Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $i = 0;
                                                $query="SELECT tb_cabang.nm_cabang, tb_cashout.tanggal, tb_cashout.tujuan, tb_cashout.uraian, tb_cashout.nominal FROM tb_cashout INNER JOIN tb_cabang ON tb_cashout.id_cabang=tb_cabang.id_cabang";
                                                $result=$db->query($query);
                                                $num_result=$result->num_rows;
                                                if ($num_result > 0 ) { 
                                                    while ($data=mysqli_fetch_assoc($result)) {
                                                    extract($data);
                                                    $i++;
                                                   
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $tanggal; ?></td>
                                            <td><?php echo $uraian; ?></td>
                                            <td><?php echo $nm_cabang; ?></td>
                                            <td><?php echo $nominal; ?></td>
                                        </tr>
                                        <?php  }} ?>  
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>
