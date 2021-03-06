<?php 
require_once '../../command/connection.php';

 ?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tambah Mahasiswa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    

        <div id="right-panel" class="">
            <section class="content-header">
      <div class="container">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 p-5">
              <div class="card">
                <div class="card-header"><h2>Form Tambah Transaksi RAB</h2></div>
                <div class="card-body card-block">
                  <form action="#" method="post" class="">
                    <div class="form-group">
                      <div>

<!--                         <form action="" method="post"> -->
                        <label>Sub Bagian</label>
                        <select name="sub" id="" onchange="id();" class="form-control select2" style="width: 100%;">

                          <option>Pilih</option>
                          <?php
                              $no=1;
                              $query="SELECT * FROM tb_subbagian";
                              $result=$db->query($query);
                              $num_result=$result->num_rows;
                              if ($num_result > 0 ) { 
                                  while ($data=mysqli_fetch_assoc($result)) {
                                  extract($data);
                          ?>
                         <option value="<?php echo $id_subbagian; ?>"><?php echo $id_subbagian; ?></option>
                          <?php }} ?>
                         </select>
<!-- 
                         <button type="submit" name="cek" class="btn btn-info">cek</button>
                      </form> -->

                      <input type="text" name="subbagian" id="subbagian" class="form-control" >

                      </div>

                    <label>Anggaran</label>
                        <select class="form-control select2" style="width: 100%;">
                          <option>Pilih</option>
                         <?php
                              $no=1;

                              if (isset($_POST['cek'])) {

                              $id = $_POST['subbagian'];

                              $query="SELECT * FROM tb_anggaran WHERE id_subbagian = '$id'";
                              $result=$db->query($query);
                              $num_result=$result->num_rows;
                              if ($num_result > 0 ) { 
                                  while ($data=mysqli_fetch_assoc($result)) {
                                  extract($data);
                          ?>
                         <option value="<?php echo $id_anggaran ?>"><?php echo $nm_anggaran; ?></option>
                          <?php }} } ?>
                         </select>


                    <label>Tahun Akademik</label>
                        <select class="form-control select2" style="width: 40%;">
                          <option>Pilih</option>
                          <?php
                              $no=1;
                              $query="SELECT * FROM tb_ta";
                              $result=$db->query($query);
                              $num_result=$result->num_rows;
                              if ($num_result > 0 ) { 
                                  while ($data=mysqli_fetch_assoc($result)) {
                                  extract($data);
                          ?>
                         <option value="<?php echo $id_ta; ?>"><?php echo $id_ta; ?></option>
                       <?php }} ?>
                         </select>


<!--                     <label>Tanggal</label>
                        <input type="date" class="form-control"> -->
                        
                    <label>Keterangan</label>
                        <input type="email" class="form-control">
                    <label>Nominal</label>
                        <input type="text" name="" class="form-control">
                    <div class="form-actions form-group">
                    </div>
                    <button type="submit" class="btn btn-info">Simpan</button> |
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

        <div class="clearfix"></div>

    </div><!-- /#right-panel -->
        


        <div class="clearfix"></div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>
</body>
</html>


  <script type="text/javascript">
            
    function id(){
      
        var kd = $('[name=sub]').val();
        $.ajax({
            type    : 'POST',
            url     : 'ajax_sub.php',
            data    : {id:kd},
            dataType :'json',
            success : function (hasil){                
                // console.log(hasil);
                $('[name=subbagian]').val(hasil.id_subbagian);
            }
        })
    }

  </script>