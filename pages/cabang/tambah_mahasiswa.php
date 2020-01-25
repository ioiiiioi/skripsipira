<?php 
    require_once '../../command/connection.php';
 ?>


<body>

    <div id="right-panel" class="">
        <section class="content-header">
            <div class="container">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 p-5">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Form Tambah Mahasiswa</h2></div>
                                <div class="card-body card-block">
                                    <form action="../../command/curd.php" method="post" class="">
                                        <div class="form-group">
                                            <div>
                                                <label>Nomer ID Program Studi</label>
                                                <select name="prodi" id="" onchange="cekid();" class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Pilih Prodi</option>
                                                    <?php
                                                          $no=1;
                                                          $query="SELECT * FROM tb_prodi";
                                                          $result=$db->query($query);
                                                          $num_result=$result->num_rows;
                                                          if ($num_result > 0 ) { 
                                                              while ($data=mysqli_fetch_assoc($result)) {
                                                              extract($data);
                                                      ?>
                                                        <option value="<?php echo $id_prodi; ?>">
                                                            <?php echo $id_prodi; ?> |
                                                            <?php echo $nm_prodi; ?>
                                                        </option>
                                                    <?php }} ?>
                                                </select>
                                            <!-- <label>Nomer Mahasiswa</label> -->
                                                <input type="text" name="id_prodi" id="id_prodi" hidden="true" class="form-control">
                                            </div>
                                            
                                            <br>
                                            <div>
                                                <label>Nama Mahasiswa</label>
                                                <input type="text" name="nama_mahasiswa" class="form-control">
                                            </div>
                                                
                                            <br>
                                            <div>
                                                <label>Nomer Telepon</label>
                                                <input type="text" name="no_telp" class="form-control">
                                            </div>

                                            <br>
                                            <div>
                                                <label>E-mail</label>
                                                <input type="email" name="email" id="email" class="form-control">
                                            </div>
                                                
                                            <br>
                                            <div>
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control select2" name="kelamin" style="width: 100%;">
                                                    <option selected="selected"></option>
                                                    <option>Laki-Laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                            </div>

                                            <br>
                                            <div class="form-actions form-group float-right">
                                                <button type="submit" class="btn btn-info" name="tambah_mahasiswa">Simpan</button>
                                                &nbsp;
                                                &nbsp;
                                                <button type="submit" class="btn btn-danger">Batal</button>
                                            </div>
                                                
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
</body>

<script type="text/javascript">
            
    function cekid(){
      
        var kd = $('[name=prodi]').val();
        $.ajax({
            type    : 'POST',
            url     : 'ajax_nomor.php',
            data    : {id:kd},
            dataType :'json',
            success : function (hasil){                
                // console.log(hasil);
                $('[name=id_prodi]').val(hasil.id_prodi);
            }
        })
    }

</script>