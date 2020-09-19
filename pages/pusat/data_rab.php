
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
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Anggaran</th>
                                            <th>Cabang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataTransarb">
                                        <?php
                                            // $query="SELECT tb_anggaran.nm_anggaran, tb_subbagian.nm_bagian, tb_transrab.id_transrab FROM tb_transrab JOIN " ;

                                            $query="SELECT * FROM tb_transrab join tb_anggaran on tb_anggaran.id_anggaran=tb_transrab.id_anggaran";
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

                                            <td><?php echo $nm_anggaran; ?></td>

                                            <td><?php
                                                $quer = mysqli_query($db, "SELECT nm_subbagian FROM tb_subbagian WHERE id_subbagian='$id_subbagian'");
                                                $cab = mysqli_fetch_assoc($quer);
                                                echo $cab['nm_subbagian'];

                                            ?></td>

                                            <?php
                                            if ($approval == '0') {
                                                ?>
                                                    <td>
                                                      <form action="../../command/curd.php?approval=1&id=<?php echo $id_transrab; ?>" method="post">
                                                        <input type="submit" class="btn btn-success" value="Setuju" />
                                                      </form> |
                                                     <a href="../../command/curd.php?approval=2&id=<?php echo $id_transrab; ?>" class="btn btn-danger" name="post" id="post">Tolak</a>
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
