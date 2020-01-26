

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Data RAB</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id Pengajuan</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Cabang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query="SELECT * FROM tb_transrab";
                                            $result=$db->query($query);
                                            $num_result=$result->num_rows;
                                            if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>
                                        <tr>
                                            <td>qwer123</td>
                                            <td>27-01-2014</td>
                                            <td>SDM</td>
                                            <td>Yogyakarta</td>
                                            <td>
                                             <button type="button" class="btn btn-success">Setuju</button> | 
                                             <button type="button" class="btn btn-danger">Tolak</button>
                                            </td>
                                        </tr>
                                                <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

 