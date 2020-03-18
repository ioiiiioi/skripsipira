<?php 

require_once '../../command/connection.php';

if(isset($_POST["sub_id"]) && !empty($_POST["sub_id"])){
    //Get all state data
    $id=$_POST['sub_id'];
    $query = $db->query("SELECT * FROM tb_anggaran WHERE id_subbagian = '$id'");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Pilih Anggaran</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id_anggaran'].'">'.$row['nm_anggaran'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}

elseif(isset($_POST["id_anggaran"]) && !empty($_POST["id_anggaran"]) {
    //Get all state data
    $id=$_POST['id_anggaran'];

    $query = $db->query("SELECT * FROM tb_transrab WHERE id_anggaran = '$id'");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        $id_subbagian = null;
        $y=0;
        while($row = $query->fetch_assoc()){ 
            $y += $row['nominal'];
            $id_subbagian = $row['id_subbagian'];
            $id_ta = $row['id_ta'];
            echo $y;
        }
        // $query_tb_rab = "INSERT INTO tb_rab (id, id_ta, id_subbagian, id_anggaran, nominal_anggaran, approval, status_aktif) VALUES ('', '$id_ta', '$id_subbagian', '$id', '$y','','')" ;
        // mysqli_query($db, $query_tb_rab);

    }else{
        echo '<option value="">State not available</option>';
    }
}

// elseif(isset($_POST["filter_rab"]) && !empty($_POST["filter_rab"]) {
//     if($_POST['filter_rab'] == 'data_rab') {
//         // $years = isset($_GET['years']) ? $_GET['years'] : "";
//         // $month = isset($_GET['month']) ? $_GET['month'] : "";
//         $ta = isset($_POST['ta']) ? $_POST['ta'] : "";
//         $subbagian = isset($_POST['subbagian']) ? $_POST['subbagian'] : "";
//         $anggaran = isset($_POST['anggaran']) ? $_POST['anggaran'] : "";

//         // $arr_arg = array();

//         $sql = "SELECT * FROM tb_transrab WHERE "
//         if($ta != "") {
//            $sql .="id_ta = '$id_ta'";
//            if($subbagian != "") {
//            $sql .=" AND id_subbagian = '$id_subbagian'";
//             }
//             if($anggaran != "") {
//                $sql .=" AND id_anggaran = '$id_anggaran'";
//             }
//         }
//         elseif ($id_ta == 0) {
//             if($subbagian != "") {
//            $sql .="id_subbagian = '$id_subbagian'";
//             }
//             if($anggaran != "") {
//                $sql .=" AND id_anggaran = '$id_anggaran'";
//             }
//         }
        

        

//         // $sql = "SELECT * FROM tb_transrab WHERE "
//         // $sql="SELECT * FROM tb_transrab t JOIN tb_anggaran ta ON ta.id_anggaran = t.id_anggaran JOIN tb_subbagian sub ON sub.id_subbagian = sub.id_subbagian WHERE tanggal LIKE '$where' GROUP BY id_transrab";
//         $query = mysqli_query($db, $sql);
//         $data = [];

//         while($res=mysqli_fetch_assoc($query)) {
//             $data[] = $res;
//         }

//         echo json_encode($data);
//         exit;
//     }
// }


?>