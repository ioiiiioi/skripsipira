

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                              <strong class="card-title ">Pengajuan RAB</strong>
                              <a href="?hal=form_pengajuan_rab" class="btn btn-success float-right ">Pengajuan RAB</a>
                          </div>
                           <div class="card-header">
                                <div class="col">
                                <select class="col-md-2 form-control float-right" onchange="RABFiltering()" id="filter_subbagian" required>
                                    <option selected='selected' hidden='true' value="">Pilih Subbagian</option>
                                    <option value="">Semua</option>
                                    <?php
                                    $nm_angg = mysqli_query($db, "SELECT * FROM tb_subbagian");
                                    if ($nm_angg) {
                                      $num_angg = $nm_angg->num_rows;
                                      while ($data = mysqli_fetch_assoc($nm_angg)){
                                        extract($data);
                                        ?>
                                          <option value="<?php echo $id_subbagian; ?>"><?php echo $nm_subbagian; ?></option>
                                      <?php }} ?>
                                </select>

                                <select class="col-md-2 form-control float-right" id="filter_anggaran" onchange="RABFiltering()"  required>
                                    <option selected='selected' hidden='true' value="">Pilih Anggaran</option>
                                    <option value="">Semua</option>
                                    <?php
                                    $nm_angg = mysqli_query($db, "SELECT * FROM tb_anggaran");
                                    if ($nm_angg) {
                                      $num_angg = $nm_angg->num_rows;
                                      while ($data = mysqli_fetch_assoc($nm_angg)){
                                        extract($data);
                                        ?>
                                          <option value="<?php echo $id_anggaran; ?>"><?php echo $nm_anggaran; ?></option>
                                      <?php }} ?>
                                </select>

                                <select class="col-md-2 form-control float-right" id="filter_ta" onchange="RABFiltering()" required>
                                    <option selected='selected' hidden='true' value="">Pilih Tahun Ajaran</option>
                                    <option value="">Semua</option>
                                    <?php
                                    $nm_angg = mysqli_query($db, "SELECT * FROM tb_ta");
                                    if ($nm_angg) {
                                      $num_angg = $nm_angg->num_rows;
                                      while ($data = mysqli_fetch_assoc($nm_angg)){
                                        extract($data);
                                        ?>
                                          <option value="<?php echo $id_ta; ?>"><?php echo $tahun; ?></option>
                                      <?php }} ?>
                                </select>

                                </div>
                            </div>
                            <div class="card-body">
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
                                            <th>Status</th>
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
                                            <td><?php
                                            if ($approval == 0){
                                              echo "Diajukan";
                                            }
                                            elseif($approval == 1){
                                              echo"Diterima";
                                            }
                                            else{
                                              echo"Ditolak";
                                            }

                                            ?></td>
                                        </tr>
                                        <?php }} echo "Total : ",number_format(array_sum($nom_array)); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
        <div class="clearfix"></div>

<script type="text/javascript">
    function RABFiltering() {
        var ta = $('#filter_ta').val();
        var subbagian = $('#filter_subbagian').val();
        var anggaran = $('#filter_anggaran').val();

        $.ajax({
            type: "GET",
            url: "index.php",
            data: "filter_rab=data_rab&subbagian="+subbagian+"&ta="+ta+"&anggaran="+anggaran,
            success: function(response) {
                html = ""
                var resp = JSON.parse(response)
                console.log(response);

                resp.forEach((val, ind) => {
                    no = parseInt(ind)
                    no++;
                    html += "<tr>"
                      html += "<td>"+no+"</td>"
                      html += "<td>"+val.tanggal+"</td>"
                      html += "<td>"+val.nm_subbagian+"</td>"
                      html += "<td>"+val.tahun+"</td>"
                      html += "<td>"+val.nm_anggaran+"</td>"
                      html += "<td>"+val.keterangan+"</td>"
                      html += "<td>"+val.nominal+"</td>"
                      if (parseInt(val.approval) == 0){
                        html += "<td>Diajukan</td>"
                      }
                      else if(parseInt(val.approval) == 1){
                        html += "<td>Diterima</td>"
                      }
                      else{
                        html += "<td>Ditolak</td>"
                      }
                    html += "</tr>"
                })

                if(resp.length == 0) {
                    $('#data_rab').html("<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>")
                } else {
                    $('#data_rab').html(html)
                }
            }
        })

    }
</script>