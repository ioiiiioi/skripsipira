<body>
    <div id="right-panel" class="">
        <section class="content-header">
            <div class="container">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-8 p-5">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Form Tambah Program Studi</h2></div>
                                <div class="card-body card-block">
                                    <form action="../../command/curd.php" method="post" class="">
                                        <div class="form-group">
                                            <!-- <div>
                                                <label>Nomer ID Program Studi</label>
                                                <input type="text" name="" class="form-control col-sm-8">
                                            </div> -->
                                        
                                        <div>
                                            <label>Nama Program Studi</label>
                                            <input type="text" name="nama_prodi" class="form-control col-sm-8">
                                        </div>
                                            
                                        <br>
                                        <div>
                                            <label>Nomer Izin Program Studi</label>
                                            <input type="text" name="no_izin" class="form-control col-sm-8">
                                        </div>
                                                
                                        <br>
                                        <div>
                                            <label>Nama Ketua Program Studi</label>
                                            <input type="text" name="nama_ketua" class="form-control col-sm-8">
                                            <label>
                                        </div>
                                            
                                        <br>
                                        <div>
                                        <label>Jenjang</label>
                                        <select type="text" name="jenjang" class="form-control col-sm-8">
                                            <option>Pilih Jenjang</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                        </select>
                                        </div>
                                        
                                        <br>
                                        <div>
                                        <label>Semester</label>
                                        <select type="text" name="semester" class="form-control col-sm-8">
                                            <option>Pilih Pilih Semester</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                        </div>
                                            
                                        <br>
                                        <div class="form-actions form-group float-left">
                                        <button type="submit" class="btn btn-info" name="tambah_prodi">Simpan</button>
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

    <div class="clearfix"></div>

    </div>
    <!-- /#right-panel -->

    <div class="clearfix"></div>

    </div>
</body>