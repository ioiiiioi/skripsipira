

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Data Cash In</strong>
                                <div class="col">
                                    <a href="?hal=tambah_cash_in" class="btn btn-success float-right ">Tambah</a>
                                    <a href="?hal=cetak_cash_in" class="btn btn-info float-right ">Cetak</a>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Uraian</th>
                                            <th>Nominal</th>
                                            <th>Cabang</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                                $i = 0;
                                                $query="SELECT tb_cabang.nm_cabang, tb_cashin.tanggal, tb_cashin.uraian, tb_cashin.nominal FROM tb_cashin INNER JOIN tb_cabang ON tb_cashin.id_cabang=tb_cabang.id_cabang";
                                                $result=$db->query($query);
                                                $num_result=$result->num_rows;
                                                if ($num_result > 0 ) { 
                                                    while ($data=mysqli_fetch_assoc($result)) {
                                                    extract($data);
                                                    $i++;
                                                   
                                        ?>

                                        <tr>
                                            <td><?php echo $i;  ?></td>
                                            <td><?php echo $tanggal; ?></td>
                                            <td><?php echo $uraian; ?></td>
                                            <td><?php echo $nominal; ?></td>
                                            <td><?php echo $nm_cabang;?></td>
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
