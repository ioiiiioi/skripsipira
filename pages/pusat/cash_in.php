

        <div class="content" id='invoice-content'>
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title ">Data Cash In</strong>
                                <div class="col">
                                    <a href="?hal=tambah_cash_in" class="btn btn-success float-right ">Tambah</a>
                                    <a href="" id='invoice-print-button' class="btn btn-info float-right ">Cetak</a>
                                    <!-- <a href="?hal=cetak_cash_in" class="btn btn-info float-right ">Cetak</a> -->
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Uraian</th>
                                            <th>Nominal</th>
                                            <th>Cabang</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                                $i = 0;
                                                $query="SELECT tb_cabang.nm_cabang, tb_cashin.tanggal, tb_cashin.uraian, tb_cashin.nominal FROM tb_cashin INNER JOIN tb_cabang ON tb_cashin.id_cabang=tb_cabang.id_cabang";
                                                $result=$db->query($query);
                                                $num_result=$result->num_rows;
                                                if ($num_result > 0 ) { 
                                                    while ($data=mysqli_fetch_assoc($result)) {
                                                    extract($data);
                                                    $i++;
                                                   
                                        ?>

                                        <tr>
                                            <td><?php echo $i;  ?></td>
                                            <td><?php echo $tanggal; ?></td>
                                            <td><?php echo $uraian; ?></td>
                                            <td><?php echo $nominal; ?></td>
                                            <td><?php echo $nm_cabang;?></td>
                                        </tr>

                                        <?php  }} ?>  

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

<script type="text/javascript">
    $(document).ready(function() {

    $("#invoice-print-button").click(function() {

            w=window.open();
            w.document.write('<html><head><title>Cetak Cash In</title>');
            w.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">');
            w.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">');
            w.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">');
            w.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">');
            w.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">');
            w.document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">');
            w.document.write('<link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">');
            w.document.write('<link rel="stylesheet" href="../../assets/css/style.css">');
            w.document.write('<link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">');
            w.document.write('<link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">');
            w.document.write('<link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />');
            w.document.write('<link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />');
            w.document.write('</head><body >');

            w.document.write($("#invoice-content").html());
            w.document.write('</body></html>');

            setTimeout(function () {
                w.print();
                w.close();
                }, 1000);
            });
    });
</script>