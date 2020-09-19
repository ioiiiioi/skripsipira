
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col">
                                <strong class="col-md-5 card-title ">Data RAB</strong>

                                </div>
                            </div>
                            <div class="card-body">
            <form role="form" class="form-validation" action="?hal=cari_data_rab" method="post" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 form-control-label">Tahun Ajaran</label>
                    <div class="col-sm-4">
                     <select name="id_ta" class="form-control">
                       <option value="">Pilih..</option>
                       <?php
                           $query="SELECT * FROM tb_ta WHERE status_aktif='1'";
                           $result=$db->query($query);
                           $num_result=$result->num_rows;
                           if ($num_result > 0 ) {
                               while ($data=mysqli_fetch_assoc($result)) {
                               extract($data);
                       ?>
                        <option value="<?php echo $data['id_ta'] ?>"><?php echo $data['tahun'] ?></option>
                      <?php }} ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 form-control-label">Anggaran</label>
                <div class="col-sm-4">
                 <select name="id_anggaran" class="form-control">
                   <option value="">Pilih..</option>
                   <?php
                       $query="SELECT * FROM tb_anggaran WHERE status_aktif='1'";
                       $result=$db->query($query);
                       $num_result=$result->num_rows;
                       if ($num_result > 0 ) {
                           while ($data=mysqli_fetch_assoc($result)) {
                           extract($data);
                   ?>
                    <option value="<?php echo $data['id_anggaran'] ?>"><?php echo $data['nm_anggaran'] ?></option>
                  <?php }} ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <input type="submit" class="btn btn-primary float-right"
                name="pilih" value="Pilih">
            </div>
        </div>
    </form>
                              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Tanggal</th>
                                          <th>Sub Bagian</th>
                                          <th>Tahun Ajaran</th>
                                          <th>Anggaran</th>
                                          <th>Keterangan</th>
                                          <th>Nominal</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody id="data_rab">
                                      <?php
                                        $no=0;
                                        // $param_tahunnya = mktime(0,0,0,6,5,2020);
                                        // $param_tahun = date('Y-m-d',$param_tahunnya);
                                        $nom_array = array();
                                        // echo $param_tahun;

                                        $query="SELECT * FROM tb_transrab";
                                        $result=mysqli_query($db,$query);
                                        if ($result ) {
                                           $num_result=$result->num_rows;
                                            while ($data=mysqli_fetch_assoc($result)) {
                                            extract($data);
                                            $no++;
                                            array_push($nom_array, $nominal);
                                      ?>
                                      <tr>
                                          <td><?php echo $no; ?></td>
                                          <td><?php echo $tanggal; ?></td>
                                          <td>
                                            <?php
                                               $q_subbagian = mysqli_query($db, "SELECT nm_subbagian FROM tb_subbagian WHERE id_subbagian = '$id_subbagian'");
                                               $sub_bag = mysqli_fetch_assoc($q_subbagian);
                                               echo $sub_bag['nm_subbagian'];
                                             ?>
                                          </td>
                                          <td><?php
                                             $q_ta = mysqli_query($db, "SELECT tahun FROM tb_ta WHERE id_ta = '$id_ta'");
                                             $ta = mysqli_fetch_assoc($q_ta);
                                             echo $ta['tahun'];
                                          ?></td>
                                          <td><?php
                                             $q_anggaran = mysqli_query($db, "SELECT nm_anggaran FROM tb_anggaran WHERE id_anggaran = '$id_anggaran'");
                                             $anggaran = mysqli_fetch_assoc($q_anggaran);
                                             echo $anggaran['nm_anggaran'];
                                          ?></td>
                                          <td><?php echo $keterangan; ?></td>
                                          <td><?php echo number_format($nominal); ?></td>
                                          <td>
                                           <center><a href="download.php?&id=<?php echo $id_transrab; ?>" class="btn btn-success">Download</a></center>
                                          </td>
                                      </tr>
                                      <?php }}  ?>
                                  </tbody>
                              </table>

                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>
