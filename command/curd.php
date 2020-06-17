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
  // var_dump($nama);
  // var_dump($idCabang);

  // query
  $sql_tambah = "INSERT INTO tb_cabang VALUES ('$idCabang', '$nama','1')";
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
  $sql_tambah = "INSERT INTO tb_bagian VALUES ('$idBagian', '$nama','1')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/pusat/index.php?hal=data_bagian');
  } else {
    echo "Gagal";
  }
}

if (isset($_POST["tambah_subbagian"])) {

  //ambil data
  $idBagian = $_POST['idBagian'];
  $nama = $_POST["nama_subbagian"];

  //query
  $sql_tambah = "INSERT INTO tb_subbagian VALUES ('', '$idBagian', '$nama','1')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/pusat/index.php?hal=data_subbagian');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

if (isset($_POST["tambah_cashin"])) {

  //ambil data
  // $nama = $_POST["nama_cabang"];
  $id_user = $_POST['id_user'];
  $id_cabang = $_POST['id_cabang'];
  $tanggal = $_POST['tanggal'];
  $uraian = $_POST['uraian'];
  $nominal = $_POST['nominal'];

  // //query
  $sql_tambah = "INSERT INTO tb_cashin VALUES ('', '$id_user','$id_cabang','$tanggal','$uraian','$nominal')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/pusat/index.php?hal=cash_in');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

if (isset($_POST["tambah_cashout"])) {
  // var_dump($_POST);

  //ambil data
  $id_user = $_POST['id_user'];
  $id_cabang = $_POST['id_cabang'];
  $tanggal = $_POST['tanggal'];
  $uraian = $_POST['uraian'];
  $tujuan = $_POST['tujuan'];
  $nominal = $_POST['nominal'];

  // //query
  $sql_tambah = "INSERT INTO tb_cashout VALUES ('', '$id_user','$id_cabang','$tanggal','$tujuan','$uraian','$nominal')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/pusat/index.php?hal=cash_out');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

if (isset($_POST["tambah_anggaran"])) {

  //ambil data
  $idSubbagian = $_POST['idSubbagian'];
  $nama = $_POST["nama_anggaran"];

  //query
  $sql_tambah = "INSERT INTO tb_anggaran VALUES ('', '$idSubbagian', '$nama','1')";
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
  $sql_tambah = "INSERT INTO tb_user VALUES ('$idUser', '$idcabang', '$nama', '$username', '$password', '$telp', '$email', '$kelamin', '$level','1')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/pusat/index.php?hal=data_user');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}


if (isset($_POST['edit_bagian'])) {

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
    $sql = "SELECT * FROM tb_user WHERE id_user='$id'";
    $que = mysqli_query($db, $sql);
    $place = mysqli_fetch_assoc($que);


    //ambil data
    $name = (empty($_POST['name'])) ? $place['nm_user']: $_POST['name'];
    $telp = (empty($_POST['telp'])) ? $place['notlp']: $_POST['telp'];
    $kelamin = (empty($_POST['kelamin'])) ? $place['jkelamin']: $_POST['kelamin'];
    $email = (empty($_POST['email'])) ? $place['email']: $_POST['email'];
    $username = (empty($_POST['username'])) ? $place['username']: $_POST['username'];
    $password = (empty($_POST['password'])) ? $place['password']: $_POST['password'];
    $level = (empty($_POST['level'])) ? $place['luser']: $_POST['level'];

    // buat query
    $sql_user = "UPDATE tb_user SET nm_user='$name', username='$username', password='$password', notlp='$telp', email='$email', jkelamin='$kelamin', luser='$level' WHERE id_user='$id'";

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

if (isset($_POST['edit_cabang'])){
  // var_dump($_POST);
  $id = $_POST['id_cabang'];
  $sql = "SELECT * FROM tb_cabang WHERE id_cabang = '$id";
  $que = mysqli_query($db, $sql);
  $place = mysqli_fetch_assoc($que);

  $nama = (empty($_POST['nama_cabang'])) ? $place['nm_cabang']: $_POST['nama_cabang'];

  $sql = "UPDATE tb_cabang SET nm_cabang='$nama' WHERE id_cabang='$id'";
  $query = mysqli_query($db, $sql);

  if( $query ){
        header('Location: ../pages/pusat/index.php?hal=data_cabang');
    } else {
        echo '<script>alert("User Gagal Disimpan !!");</script>';
    }
}

if (isset($_GET["approval"])){
  $approval = $_GET["approval"];
  $id = $_GET['id'];

  $sql = "UPDATE tb_transrab SET approval='$approval' WHERE id_transrab='$id'";
  $query = mysqli_query($db, $sql);

  if( $query ){
        header('Location: ../pages/pusat/index.php?hal=data_rab');
    } else {
        echo '<script>alert("User Gagal Disimpan !!");</script>';
    }
}


if (isset($_GET["hapus"])){

  $hapus = $_GET["hapus"];

  if ($hapus == "prodi") {
      $id = $_GET["id"];

      // buat query hapus
      $sql = "UPDATE tb_prodi SET status_aktif='0' WHERE id_prodi=$id";
      $query = mysqli_query($db, $sql);
      
      // apakah query hapus berhasil?
      if( $query ){
          header('Location: ../pages/cabang/index.php?hal=data_prodi');
      } else {
          die("gagal menghapus!!.");
      }
  }
  if ($hapus == "bagian") {
      $id = $_GET["id"];

      // buat query hapus
      $sql = "UPDATE tb_bagian SET status_aktif='0' WHERE id_bagian=$id";
      $query = mysqli_query($db, $sql);
      
      // apakah query hapus berhasil?
      if( $query ){
          header('Location: ../pages/pusat/index.php?hal=data_bagian');
      } else {
          die("gagal menghapus!!.");
      }
  }
  if ($hapus == "cabang") {
      $id = $_GET["id"];

      // buat query hapus
      $sql = "UPDATE tb_cabang SET status_aktif='0' WHERE id_cabang=$id";
      $query = mysqli_query($db, $sql);
      
      // apakah query hapus berhasil?
      if( $query ){
          header('Location: ../pages/pusat/index.php?hal=data_cabang');
      } else {
          die("gagal menghapus!!.");
      }
  }
  if ($hapus == "subbagian") {
      $id = $_GET["id"];

      // buat query hapus
      $sql = "UPDATE tb_subbagian SET status_aktif='0' WHERE id_subbagian=$id";
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
      $sql = "UPDATE tb_anggaran SET status_aktif='0' WHERE id_anggaran=$id";
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
      $sql = "UPDATE tb_user SET status_aktif='0' WHERE id_user=$id";
      $query = mysqli_query($db, $sql);

      // apakah query hapus berhasil?
      if( $query ){
          header('Location: ../pages/pusat/index.php?hal=data_user');
      } else {
          die("gagal menghapus...");
      }
  }
  if ($hapus == "prodi") {
    $id = $_GET["id"];

    // buat query hapus
    $sql = "UPDATE tb_prodi SET status_aktif='0' WHERE id_prodi=$id";
    $query = mysqli_query($db, $sql);
    
    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/cabang/index.php?hal=data_prodi');
    } else {
        die("gagal menghapus!!.");
    }
  }
  if ($hapus == "TA") {
    $id = $_GET["id"];

    // buat query hapus
    $sql = "UPDATE tb_ta SET status_aktif='0' WHERE id_ta=$id";
    $query = mysqli_query($db, $sql);
    
    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/cabang/index.php?hal=data_tahun_akademik');
    } else {
        die("gagal menghapus!!.");
    }
  }
  if ($hapus == "mahasiswa") {
    // var_dump($_GET);
    $id = $_GET["id"];

    // buat query hapus
    $sql = "UPDATE tb_mahasiswa SET status_aktif='0' WHERE id_mahasiswa=$id";
    $query = mysqli_query($db, $sql);
    
    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/cabang/index.php?hal=data_mahasiswa');
    } else {
        die("gagal menghapus!!.");
    }
  }
}




//  -------  CABANG  ---------- //

if (isset($_POST["tambah_prodi"])) {

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
  $sql_tambah = "INSERT INTO tb_prodi VALUES ('$idProdi', '$nama', '$jenjang', '$semester', '$ketua', '$izin','1')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/cabang/index.php?hal=data_prodi');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

if (isset($_POST["tambah_tahun"])) {

  //ambil data
  $mulai = $_POST['mulai_kuliah'];
  $selesai = $_POST['selesai_kuliah'];
  $semester = $_POST['semester'];
  $idTahun = array_shift(explode('-', $mulai));

  //query
  $sql_tambah = "INSERT INTO tb_ta VALUES ('$idTahun', '$mulai', '$selesai', '$semester','1')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/cabang/index.php?hal=data_tahun_akademik');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}


if (isset($_POST["tambah_mahasiswa"])) {

  //ambil data
  $idProdi = $_POST['id_prodi'];
  $nama = $_POST['nama_mahasiswa'];
  $telp = $_POST['no_telp'];
  $email = $_POST['email'];
  $kelamin = $_POST['kelamin'];

  $query = mysqli_query($db, "SELECT id_mahasiswa FROM tb_mahasiswa WHERE id_prodi = '$idProdi'");
  $get = mysqli_fetch_array ($query);

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

  $sql_tambah = "INSERT INTO tb_mahasiswa VALUES ('$idMahasiwa', '$idProdi', '$nama', '$email', '$telp', '$kelamin','1')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/cabang/index.php?hal=data_mahasiswa');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

// if (isset($_POST["tambah_mahasiswa"])) {

//   //ambil data
//   $idProdi = $_POST['id_prodi'];
//   $nama = $_POST['nama_mahasiswa'];
//   $telp = $_POST['no_telp'];
//   $email = $_POST['email'];
//   $kelamin = $_POST['kelamin'];

//   $query = mysqli_query($db, "SELECT id_mahasiswa FROM tb_mahasiswa WHERE id_prodi = '$idProdi'");
//   $get = mysqli_fetch_array ($query);

//     if (!isset($get)) {
//       $end = "1";
//       $idMahasiwa = ($idProdi  . $end);
//       }
//     else{
//       $query = mysqli_query($db, "SELECT id_mahasiswa FROM tb_mahasiswa WHERE id_prodi = '$idProdi'");
//       foreach ($query as $key => $value) {
        
//       }
//         $end = end($value);
//         $kodeOtomatis  = KodeOtomatis($db, 'tb_mahasiswa', $end, '', '', '');
        
//         // var_dump($kodeOtomatis);
//         // die;

//         $idMahasiwa = $kodeOtomatis;
//       }

//     // var_dump($idMahasiwa);
//     // die;

//   $sql_tambah = "INSERT INTO tb_mahasiswa VALUES ('$idMahasiwa', '$idProdi', '$nama', '$email', '$telp', '$kelamin','1')";
//   $query = mysqli_query($db, $sql_tambah);

//   if ($query) {
//     header('Location: ../pages/cabang/index.php?hal=data_mahasiswa');
//   } else {
//     header('Location: ../index.php?hal=gagal');
//   }
// }
//         $query_tb_rab = "INSERT INTO tb_rab (id, id_ta, id_subbagian, id_anggaran, nominal_anggaran, approval, status_aktif) VALUES ('', '$id_ta', '$id_subbagian', '$id', '$y','','')" ;

//         mysqli_query($db, $query_tb_rab);


if (isset($_POST['input_registrasi'])){
  $mhs = $_POST['mhs'];
  $prodi = $_POST['prodi'];
  $tanggal = $_POST['tanggal'];
  $nominal = $_POST['nominal'];
  $jtans = $_POST['jtans'];
  $id_user = $_POST['user'];
  $ta = $_POST['ta'];

  $sql_tambah = "INSERT INTO tb_preg VALUES ('', '$mhs', '$id_user', '$ta', '$tanggal', '$nominal','$prodi','$jtans')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/cabang/index.php?hal=tabel_pembayaran_registrasi');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

if (isset($_POST["transaksi_rab"])) {

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


  $sql_tambah = "INSERT INTO tb_transrab VALUES ('', '$idAnggaran', '$idSubbagian', '$idUser', '$idTa', '$keterangan', '$tgl', '$nominal','')";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/cabang/index.php?hal=transaksi_rab');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

if (isset($_POST['edit_prodi'])) {
  //ambil data
    $id = $_POST["id_prodi"];

     $sql = "SELECT * FROM tb_prodi WHERE id_prodi='$id'";
     $que = mysqli_query($db, $sql);
     $place = mysqli_fetch_assoc($que);
     // var_dump($place);
   
    $nama = (empty($_POST["nama_prodi"])) ? $place['nm_prodi'] : $_POST["nama_prodi"] ;
    $izin = (empty($_POST["no_izin"])) ? $place['no_izin'] : $_POST["no_izin"] ;
    $ketua = (empty($_POST["nama_ketua"])) ? $place['ketua'] : $_POST["nama_ketua"] ;

    $jenjang = $_POST["jenjang"];
    $semester = $_POST["semester"];

    // buat query
    $sql_user = "UPDATE tb_prodi SET nm_prodi='$nama', jenjang='$jenjang', semester='$semester', ketua='$ketua', no_izin='$izin' WHERE id_prodi='$id'";
     // mysqli_query($db, $sql_user);
    $simpan = $db->query($sql_user);

    // apakah query simpan berhasil?
    if($simpan) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ../pages/cabang/index.php?hal=data_prodi');
    }else{
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        echo '<script>alert("User Gagal Disimpan !!");</script>';
    }
}

if (isset($_POST["edit_tahun"])) {
  // var_dump($_POST);
  //ambil data
  $idTahun = $_POST['id_ta'];

    $sql = "SELECT * FROM tb_ta WHERE id_ta='$idTahun'";
    $query = mysqli_query($db, $sql);
    $place = mysqli_fetch_assoc($query);

  $mulai = (empty($_POST['mulai_kuliah'])) ? $place['mulai']: $_POST['mulai_kuliah'] ;
  $selesai = (empty($_POST['selesai_kuliah'])) ? $place['selesai']: $_POST['selesai_kuliah'] ;
  $semester = (empty($_POST['semester'])) ? $place['semester']: $_POST['semester'] ;

  //query
  $sql_tambah = "UPDATE tb_ta SET mulai='$mulai', selesai='$selesai', semester='$semester' WHERE id_ta='$idTahun'";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/cabang/index.php?hal=data_tahun_akademik');
  } else {
    header('Location: ../index.php?hal=gagal');
  }
}

if (isset($_POST["edit_mahasiswa"])) {
  // var_dump($_POST);
  //ambil data
  $id_mahasiswa = $_POST['id_mahasiswa'];
    $sql = "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa='$id_mahasiswa'";
    $query = mysqli_query($db, $sql);
    $place = mysqli_fetch_assoc($query);

  $id_prodi = $_POST['id_prodi'];
  $nm_mahasiswa = (empty($_POST['nm_mahasiswa'])) ? $place['nm_mahasiswa'] : $_POST['nm_mahasiswa'];
  $email = (empty($_POST['email'])) ? $place['email'] : $_POST['email'];
  $notlp = (empty($_POST['notlp'])) ? $place['notlp'] : $_POST['notlp'];
  $jkelamin = $_POST['jkelamin'];


  // //query
  $sql_tambah = "UPDATE tb_mahasiswa SET id_prodi='$id_prodi', nm_mahasiswa='$nm_mahasiswa', email='$email', notlp='$notlp',jkelamin='$jkelamin' WHERE id_mahasiswa='$id_mahasiswa'";
  $query = mysqli_query($db, $sql_tambah);

  if ($query) {
    header('Location: ../pages/cabang/index.php?hal=data_mahasiswa');
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

// //pisahan
// function Pisahan(){
  

//   return $endBagian;
// }