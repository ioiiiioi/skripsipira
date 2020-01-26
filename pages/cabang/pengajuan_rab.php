

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Pengajuan RAB</strong>
                                <a href="?hal=form_pengajuan_rab" class="btn btn-success float-right ">Pengajuan RAB</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $no=0;
                                          $query="SELECT * FROM id_pengajuan";
                                          $result=mysqli_query($db,$query);
                                          if ($result ) { 
                                             $num_result=$result->num_rows;
                                              while ($data=mysqli_fetch_assoc($result)) {
                                              extract($data);
                                              $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $id_transrab; ?></td>
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

