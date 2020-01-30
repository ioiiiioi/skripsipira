

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
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Cabang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // $query="SELECT tb_anggaran.nm_anggaran, tb_subbagian.nm_bagian, tb_transrab.id_transrab FROM tb_transrab JOIN " ;

                                            $query="SELECT * FROM tb_transrab";
                                            $result=$db->query($query);
                                            $num_result=$result->num_rows;
                                            if ($num_result > 0 ) { 
                                                $no = 1;
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                extract($data);
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $tanggal; ?></td>
                                            <td><?php echo $id_anggaran; ?></td>
                                            <td><?php echo $id_subbagian; ?></td>
                                            <?php 
                                            if ($approval == '0') {
                                                ?>
                                                    <td>
                                                     <a href="../../command/curd.php?approval=1&id=<?php echo $id_transrab; ?>" class="btn btn-success">Setuju</a> | 
                                                     <a href="../../command/curd.php?approval=2&id=<?php echo $id_transrab; ?>" class="btn btn-danger">Tolak</a>
                                                    </td>
                                            <?php } else { ?>
                                                    <td>
                                                        <?php 
                                                        if ($approval=='1'){
                                                            echo "Diterima";
                                                        }else if ($approval=='2'){
                                                            echo "Ditolak";
                                                        }

                                                        ?>
                                                    </td>
                                            <?php } ?>
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

 