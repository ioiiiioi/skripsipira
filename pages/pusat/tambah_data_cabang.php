<?php
    if (!isset($_SESSION)) {
        session_start();
    }

require_once '../../command/connection.php';

if (isset($_SESSION["pusat"])) {
  $hal = @$_GET['hal'];
  $id = $_SESSION['pusat'];

  $query = mysqli_query($db, "SELECT * FROM tb_user WHERE id_user = '$id'");
  $extract = mysqli_fetch_assoc($query);

  extract($extract);

  // echo $id;

  //kode otomatis
  function KodeOtomatis($conn, $tabel, $id, $inisial, $index, $panjang)
  {
    $query	= "SELECT max(".$id.") as max_id FROM `".$tabel."` WHERE ".$id." LIKE '".$inisial."%'";
    $data		= $conn->query($query)->fetch_array();
    $id_max	= $data['max_id'];

    if($index=='' && $panjang=='')
    {
      $no_urut	= (int) $id_max;
    }
    else if($index!='' && $panjang=='')
    {
      $no_urut = (int) substr($id_max, $index);
    }
    else
    {
      $no_urut	= (int) substr($id_max, $index, $panjang);
    }
    $no_urut	= $no_urut + 1;

    if($index=='' && $panjang=='')
    {
  	  $id_baru  = $no_urut;
    }
    else if($index!='' && $panjang=='')
    {
  	  $id_baru  = $inisial . $no_urut;
    }
    else
    {
  	  $id_baru	= $inisial . sprintf("%0$panjang"."s", $no_urut);
    }
    return $id_baru;
  }

  $idCabang  = KodeOtomatis($db, 'tb_cabang', 'id_cabang', '', '', '');

 ?>


<body>

    <section class="content-header">
      <div class="container">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-8 p-5">
              <div class="card">
                <div class="card-header"><h2>Form Tambah Data Cabang</h2></div>
                <div class="card-body card-block">

                  <form action="../../command/curd.php" method="post" class="">
                    <div class="form-group">
                      <label>ID Cabang </label>
                        <input type="text" name="id_cabang" class="form-control col-sm-8" value="<?php echo $idCabang; ?>">
                    </div>
                    <div class="form-group">
                      <label>Nama Cabang </label>
                        <input type="text" name="nama_cabang" class="form-control col-sm-8">
                    </div>
                    <div class="form-actions form-group">
                    <input type="submit" name="tambah_cabang" value="tambah" class="btn btn-info"> |
                    <a href="?hal=data_cabang" class="btn btn-danger">Batal</a>
                  </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br><br><br><br><br>
    <br><br><br><br><br>
    <br><br><br><br><br>
  </div>

</body>
<?php
}else{
    echo "<script>window.location='../../login.php';</script>";
}
?>
