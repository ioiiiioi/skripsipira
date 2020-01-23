<?php

include("connection.php");


//  -------  PUSAT  ---------- //

if (isset($_POST["tambah_cabang"])) {

  // var_dump($_POST);
  // die;

  //ambil data
  $nama = $_POST["nama_cabang"];

  //id cabang
  $idCabang  = KodeOtomatis($db, 'tb_cabang', 'id_cabang', '', '', '');

  //query
  $sql_tambah = "INSERT INTO tb_cabang VALUES ('$idCabang', '$nama')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/pusat/index.php?hal=data_cabang');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

if (isset($_POST["tambah_bagian"])) {

  // var_dump($_POST);
  // die;

  //ambil data
  $front = "000";
  $nama = $_POST["nama_bagian"];

  //id cabang
  $kodeOtomatis  = KodeOtomatis($db, 'tb_bagian', 'id_bagian', '', '', '');
  $idBagian = ($front . $kodeOtomatis);

  // var_dump($kodeOtomatis);
  // var_dump($idBagian);
  // die;

  //query
  $sql_tambah = "INSERT INTO tb_bagian VALUES ('$idBagian', '$nama')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/pusat/index.php?hal=data_bagian');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

if (isset($_POST["tambah_subbagian"])) {

  //ambil data
  $idBagian = $_POST['idBagian'];
  $nama = $_POST["nama_subbagian"];

  if (isset($idBagian)) {

    $query = mysqli_query($db, "SELECT id_bagian FROM tb_subbagian WHERE id_bagian = '$idBagian'");
    $get = mysqli_fetch_array ($query);
    

    if (!isset($get)) {
      $end = "1";
      $idSubbagian = ($idBagian . $end);
    }
    else{
        $query = mysqli_query($db, "SELECT id_subbagian FROM tb_subbagian WHERE id_bagian = '$idBagian'");
        foreach ($query as $key => $value) {
          
        }
        $end = end($value);
        $kodeOtomatis  = KodeOtomatis($db, 'tb_subbagian', $end, '', '', '');
        var_dump($kodeOtomatis);

        $idSubbagian = ("000" . $kodeOtomatis);

        // die;
    }
  }

  //query
  $sql_tambah = "INSERT INTO tb_subbagian VALUES ('$idSubbagian', '$idBagian', '$nama')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/pusat/index.php?hal=data_subbagian');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

if (isset($_POST["tambah_anggaran"])) {

  //ambil data
  $idSubbagian = $_POST['idSubbagian'];
  $nama = $_POST["nama_anggaran"];

  if (isset($idSubbagian)) {

    $query = mysqli_query($db, "SELECT id_anggaran FROM tb_anggaran WHERE id_subbagian = '$idSubbagian'");
    $get = mysqli_fetch_array ($query);
    

    if (!isset($get)) {
      $end = "1";
      $idAnggaran = ($idSubbagian . $end);
    }
    else{
        $query = mysqli_query($db, "SELECT id_anggaran FROM tb_anggaran WHERE id_subbagian = '$idSubbagian'");
        foreach ($query as $key => $value) {
          
        }
        $end = end($value);
        $kodeOtomatis  = KodeOtomatis($db, 'tb_anggaran', $end, '', '', '');
        var_dump($kodeOtomatis);

        $idAnggaran = ("000" . $kodeOtomatis);

        // die;
    }
  }

  //query
  $sql_tambah = "INSERT INTO tb_anggaran VALUES ('$idAnggaran', '$idSubbagian', '$nama')";
  $query = mysqli_query($db, $sql_tambah);


  if ($query) {
    header('Location: ../pages/pusat/index.php?hal=data_anggaran');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

if (isset($_POST["tambah_user"])) {

  // var_dump($_POST);
  // die;

  //ambil data
  $nama = $_POST["name"];
  $telp = $_POST["telp"];
  $kelamin = $_POST["kelamin"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $idcabang = $_POST["cabang"];
  $level = $_POST["level"];



  //id cabang
  $idUser  = KodeOtomatis($db, 'tb_user', 'id_user', '', '', '');

  //query
  $sql_tambah = "INSERT INTO tb_user VALUES ('$idUser', '$idcabang', '$nama', '$username', '$password', '$telp', '$email', '$kelamin', '$level')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/pusat/index.php?hal=data_user');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}



if (isset($_POST['edit_bagian'])) {

  // var_dump($_POST);
  // die;

    $id = $_POST["id_bagian"];

    //ambil data
    $nama = $_POST["nama_bagian"];

    // buat query
    $sql_user = "UPDATE tb_bagian SET nm_bagian='$nama' WHERE id_bagian='$id'";

    // $query = mysqli_query($db, $sql_user);
    $simpan = $db->query($sql_user);

    // apakah query simpan berhasil?
    if($simpan) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ../pages/pusat/index.php?hal=data_bagian');
    }else{
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        echo '<script>alert("User Gagal Disimpan !!");</script>';
    }
}
if (isset($_POST['edit_subbagian'])) {

  // var_dump($_POST);
  // die;

    $id = $_POST["id_subbagian"];

    //ambil data
    $nama = $_POST["nama_subbagian"];

    // buat query
    $sql_user = "UPDATE tb_subbagian SET nm_subbagian='$nama' WHERE id_subbagian='$id'";

    // $query = mysqli_query($db, $sql_user);
    $simpan = $db->query($sql_user);

    // apakah query simpan berhasil?
    if($simpan) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ../pages/pusat/index.php?hal=data_subbagian');
    }else{
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        echo '<script>alert("User Gagal Disimpan !!");</script>';
    }
}
if (isset($_POST['edit_anggaran'])) {

  // var_dump($_POST);
  // die;

    $id = $_POST["id_anggaran"];

    //ambil data
    $nama = $_POST["nama_anggaran"];

    // buat query
    $sql_user = "UPDATE tb_anggaran SET nm_anggaran='$nama' WHERE id_anggaran='$id'";

    // $query = mysqli_query($db, $sql_user);
    $simpan = $db->query($sql_user);

    // apakah query simpan berhasil?
    if($simpan) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ../pages/pusat/index.php?hal=data_anggaran');
    }else{
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        echo '<script>alert("User Gagal Disimpan !!");</script>';
    }
}
if (isset($_POST['edit_user'])) {

  // var_dump($_POST);
  // die;

    $id = $_POST["id_user"];

    //ambil data
    $name = $_POST['name'];
    $telp = $_POST['telp'];
    $kelamin = $_POST['kelamin'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    // buat query
    $sql_user = "UPDATE tb_user SET nm_user='$nama', username='$username', password='$password', notlp='$telp', email='$email', jkelamin='$kelamin', luser='$level' WHERE id_user='$id'";

    // $query = mysqli_query($db, $sql_user);
    $simpan = $db->query($sql_user);

    // apakah query simpan berhasil?
    if($simpan) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ../pages/pusat/index.php?hal=data_user');
    }else{
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        echo '<script>alert("User Gagal Disimpan !!");</script>';
    }
}




$hapus = $_GET["hapus"];

if ($hapus == "bagian") {
    $id = $_GET["id"];

    // buat query hapus
    $sql = "DELETE FROM tb_bagian WHERE id_bagian=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/pusat/index.php?hal=data_bagian');
    } else {
        die("gagal menghapus...");
    }
}
if ($hapus == "subbagian") {
    $id = $_GET["id"];

    // buat query hapus
    $sql = "DELETE FROM tb_subbagian WHERE id_subbagian=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/pusat/index.php?hal=data_subbagian');
    } else {
        die("gagal menghapus...");
    }
}
if ($hapus == "anggaran") {
    $id = $_GET["id"];

    // buat query hapus
    $sql = "DELETE FROM tb_anggaran WHERE id_anggaran=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/pusat/index.php?hal=data_anggaran');
    } else {
        die("gagal menghapus...");
    }
}
if ($hapus == "user") {
    $id = $_GET["id"];

    // buat query hapus
    $sql = "DELETE FROM tb_user WHERE id_user=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/pusat/index.php?hal=data_user');
    } else {
        die("gagal menghapus...");
    }
}




//  -------  CABANG  ---------- //

if (isset($_POST["tambah_prodi"])) {

  // var_dump($_POST);
  // die;

  //ambil data
  $nama = $_POST["nama_prodi"];
  $izin = $_POST["no_izin"];
  $ketua = $_POST["nama_ketua"];
  $jenjang = $_POST["jenjang"];
  $semester = $_POST["semester"];

  //id cabang
  $idProdi= KodeOtomatis($db, 'tb_prodi', 'id_prodi', '', '', '');

  // var_dump($idProdi);
  // die;

  //query
  $sql_tambah = "INSERT INTO tb_prodi VALUES ('$idProdi', '$nama', '$jenjang', '$semester', '$ketua', '$izin')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/cabang/index.php?hal=data_prodi');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

if (isset($_POST["tambah_tahun"])) {

  // var_dump($_POST);
  // die;

  //ambil data
  $mulai = $_POST['mulai_kuliah'];
  $selesai = $_POST['selesai_kuliah'];
  $semester = $_POST['semester'];
  $idTahun = array_shift(explode('-', $mulai));

  // var_dump($mulai);
  // var_dump($idTahun);
  // die;

  //query
  $sql_tambah = "INSERT INTO tb_ta VALUES ('$idTahun', '$mulai', '$selesai', '$semester')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/cabang/index.php?hal=data_tahun_akademik');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}


if (isset($_POST["tambah_mahasiswa"])) {

  // var_dump($_POST);
  // die;

  //ambil data
  // $tahun = date('Y-m-d');
  // $idTahun = array_shift(explode('-', $tahun));
  $idProdi = $_POST['id_prodi'];
  $nama = $_POST['nama_mahasiswa'];
  $telp = $_POST['no_telp'];
  $email = $_POST['email'];
  $kelamin = $_POST['kelamin'];

  $query = mysqli_query($db, "SELECT id_mahasiswa FROM tb_mahasiswa WHERE id_prodi = '$idProdi'");
  $get = mysqli_fetch_array ($query);

  // var_dump($query);
  // die;

    if (!isset($get)) {
      $end = "1";
      $idMahasiwa = ($idProdi  . $end);
      }
    else{
      $query = mysqli_query($db, "SELECT id_mahasiswa FROM tb_mahasiswa WHERE id_prodi = '$idProdi'");
      foreach ($query as $key => $value) {
        
      }
        $end = end($value);
        $kodeOtomatis  = KodeOtomatis($db, 'tb_mahasiswa', $end, '', '', '');
        
        // var_dump($kodeOtomatis);
        // die;

        $idMahasiwa = $kodeOtomatis;
      }

    // var_dump($idMahasiwa);
    // die;

  $sql_tambah = "INSERT INTO tb_mahasiswa VALUES ('$idMahasiwa', '$idProdi', '$nama', '$email', '$telp', '$kelamin')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/cabang/index.php?hal=data_mahasiswa');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}



if (isset($_POST["transaksi_rab"])) {

  // var_dump($_POST);
  // die;

  //ambil data
  // $tahun = date('Y-m-d');
  // $idTahun = array_shift(explode('-', $tahun));
  $idSubbagian = $_POST['sub'];
  $idAnggaran = $_POST['anggaran'];
  $keterangan = $_POST['keterangan'];
  $nominal = $_POST['nominal'];
  $idUser = $_POST['user'];
  $idTa = $_POST['tahun_akademik'];

  $tgl = date('Y-m-d');


  $sql_tambah = "INSERT INTO tb_transrab VALUES ('', '$idAnggaran', '$idSubbagian', '$idUser', '$idTa', '$keterangan', '$tgl', '$nominal')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/cabang/index.php?hal=transaksi_rab');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}





//  -------  FUNCTION  ---------- //

//kode otomatis
function KodeOtomatis($conn, $tabel, $id, $inisial, $index, $panjang)
{
  $query	= "SELECT max(".$id.") as max_id FROM `".$tabel."` WHERE ".$id." LIKE '".$inisial."%'";
  $data		= $conn->query($query)->fetch_array();
  $id_max	= $data['max_id'];
  
  if($index=='' && $panjang=='')
  {
	$no_urut	= (int) $id_max;
  }else if($index!='' && $panjang==''){
	$no_urut    = (int) substr($id_max, $index);
  }else{
	$no_urut	= (int) substr($id_max, $index, $panjang);
  }
  $no_urut	= $no_urut + 1;
  if($index=='' && $panjang=='')
  {
	  $id_baru  = $no_urut;
  }else if($index!='' && $panjang==''){
	  $id_baru  = $inisial . $no_urut;
  }else{
	  $id_baru	= $inisial . sprintf("%0$panjang"."s", $no_urut);
  }
  return $id_baru;
}

//pisahan
function Pisahan(){
  

  return $endBagian;
}