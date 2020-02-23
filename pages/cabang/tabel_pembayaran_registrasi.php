

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Pembayaran Registrasi Mahasiswa</strong>
                                <a href="?hal=pembayaran_registrasi" class="btn btn-success float-right ">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Mahasiswa</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Program Studi</th>
                                            <th>Nominal</th>
                                            <th>Jenis Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $no=0;
                                            $query="SELECT * FROM tb_preg";
                                            // $query="SELECT tb_anggaran.nm_anggaran, tb_transrab.tanggal, tb_transrab.keterangan,tb_transrab.nominal FROM tb_transrab INNER JOIN tb_anggaran ON tb_transrab.id_anggaran=tb_anggaran.id_anggaran";
                                            $result=$db->query($query);
                                            $num_result=$result->num_rows;
                                            if ($num_result > 0 ) { 
                                                while ($data=mysqli_fetch_assoc($result)) {
                                                $no++;
                                                extract($data);
                                        ?>

                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $tanggal;?></td>

                                            <td><?php 
                                            $que = mysqli_query($db, "SELECT nm_mahasiswa FROM tb_mahasiswa WHERE id_mahasiswa='$id_mahasiswa'");
                                            $mhs = mysqli_fetch_assoc($que);
                                            echo $mhs['nm_mahasiswa']; 
                                            ?></td>
                                            
                                            <td><?php 
                                            $que = mysqli_query($db, "SELECT tahun FROM tb_ta WHERE id_ta='$id_ta'");
                                            $ta = mysqli_fetch_assoc($que);
                                            echo $ta['tahun']; 
                                            ?></td>
                                            
                                            <td><?php 
                                            $que = mysqli_query($db, "SELECT nm_prodi FROM tb_prodi WHERE id_prodi='$id_prodi'");
                                            $prodi = mysqli_fetch_assoc($que);
                                            echo $prodi['nm_prodi']; 
                                            ?></td>

                                            <td><?php echo number_format($nominal); ?></td>
                                            <td><?php echo $j_transaksi; ?></td>
                                        </tr>

                                            
                                        <?php }} ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


        <div class="clearfix"></div>

