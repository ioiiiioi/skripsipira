
    <div id="right-panel" class="right-panel">
        <section class="content-header">
            <div class="container">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 p-5">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Form Pengajuan RAB</h2></div>
                                <div class="card-body card-block">
                                    <form action="#" method="post" class="">
                                        <div class="form-group">
                                            <div>
                                                <label>Kepada</label>
                                                <input type="text" name="" class="form-control">
                                            </div>
                                            <label>Anggaran</label>
                                            <select class="form-control select2">
                                                <option selected="selected">SDM</option>
                                                <option>option</option>
                                                <option>option</option>
                                            </select>
                                            <br>
                                            <input type="file" name="">
                                            <div class="form-actions form-group">
                                            </div>
                                            <button type="submit" class="btn btn-info">Simpan</button>
                                            &nbsp;
                                            &nbsp;
                                            <button type="submit" class="btn btn-danger">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- 
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
</script> -->