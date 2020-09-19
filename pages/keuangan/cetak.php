<!doctype html>
<?php
	if (!isset($_SESSION)) {
        session_start();
    }

require_once '../../command/connection.php';

if (isset($_SESSION["keuangan"])) {
  $hal = @$_GET['hal'];
  $id = $_SESSION['keuangan'];

  $query = mysqli_query($db, "SELECT * FROM tb_user WHERE id_user = '$id'");
  $extract = mysqli_fetch_assoc($query);

  extract($extract);

  echo $id;

 ?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cetak Laporan Rab</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">

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
</head>

<body onload="window.print()">
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                            <div class="card-body">
                                <center><b><h1>Laporan RAB</h1></b></center>
                            </div><br>
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
                                    </tr>
                                </thead>
                                <tbody id="data_rab">
                                    <?php
                                      $no=0;
                                      // $param_tahunnya = mktime(0,0,0,6,5,2020);
                                      // $param_tahun = date('Y-m-d',$param_tahunnya);
                                      $nom_array = array();
                                      // echo $param_tahun;
                                      $ta = $_GET['id_ta'];
                                      $anggaran = $_GET['id_anggaran'];

                                      $query="SELECT * FROM tb_transrab join tb_subbagian using (id_subbagian) join tb_ta using (id_ta) join tb_anggaran using (id_anggaran)
                                      where tb_transrab.id_ta='$ta' and tb_transrab.id_anggaran='$anggaran'";
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
                                    </tr>

                                    <?php }}  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->


        <div class="clearfix"></div>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
</body>
</html>

<?php
}else{
    echo "<script>window.location='../../login.php';</script>";
}
?>
