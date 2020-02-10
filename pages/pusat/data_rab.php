
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col">
                                <strong class="col-md-5 card-title ">Data RAB</strong>
                                <select class="col-md-2 form-control float-right" onchange="transactionFiltering()" id="years">
                                    <option selected='selected' hidden='true' value="">Pilih Tahun</option>
                                    <option value="2020">2020</option>
                                </select>
                                
                                <select class="col-md-2 form-control float-right" id="month" onchange="transactionFiltering()">
                                    <option selected='selected' hidden='true' value="">Pilih Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                </div>
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
                                    <tbody id="dataTransarb">
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

                                            <td><?php
                                                $que = mysqli_query($db, "SELECT nm_anggaran FROM tb_anggaran WHERE id_anggaran='$id_anggaran'");
                                                $cabang = mysqli_fetch_assoc($que);
                                                echo $cabang['nm_anggaran'];
                                                
                                             ?></td>
                                            
                                            <td><?php 
                                                $quer = mysqli_query($db, "SELECT nm_subbagian FROM tb_subbagian WHERE id_subbagian='$id_subbagian'");
                                                $cab = mysqli_fetch_assoc($quer);
                                                echo $cab['nm_subbagian'];
                                                
                                            ?></td>

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


<script type="text/javascript">
    function transactionFiltering() {
        var month = $('#month').val()
        var years = $('#years').val()

        $.ajax({
            type: "GET",
            url: "index.php",
            data: "cmd=dataTransarb&years="+years+"&month="+month,
            success: function(response) {
                html = ""
                var resp = JSON.parse(response)

                resp.forEach((val, ind) => {
                    no = parseInt(ind)
                    no++;
                    html += "<tr>"
                        html += "<td>"+no+"</td>"
                        html += "<td>"+val.tanggal+"</td>"
                        html += "<td>"+val.nm_anggaran+"</td>"
                        html += "<td>"+val.nm_subbagian+"</td>"
                        if(val.approval == 0) {
                            html += "<td>"
                            html += '<a href="../../command/curd.php?approval=1&id='+val.id_transrab+'class="btn btn-success">Setuju</a>'
                            html += '<a href="../../command/curd.php?approval=2&id='+val.id_transrab+'class="btn btn-danger">Tolak</a>'

                            html +="</td>"
                        } else if(val.approval == 1) {
                            html += "<td>Diterima</td>"
                        } else {
                            html += "<td>Ditolak</td>"
                        } 
                    html += "</tr>"
                })

                if(resp.length == 0) {
                    $('#dataTransarb').html("<tr><td></td><td></td><td></td><td></td><td></td></tr>")
                } else {
                    $('#dataTransarb').html(html)
                }


            }
        })

    }
</script>
 