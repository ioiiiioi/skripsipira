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


?>