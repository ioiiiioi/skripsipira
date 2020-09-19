<?php
include('connect.php');
if(isset($_POST['view'])){
if($_POST["view"] != '')
{
   $update_query = "UPDATE tb_notif SET notif = 1 WHERE notif=0";
   mysqli_query($con, $update_query);
}
$query = "SELECT * FROM tb_notif join tb_transrab using (id_transrab) join tb_subbagian using (id_subbagian) join tb_ta using (id_ta) join tb_anggaran using (id_anggaran) ORDER BY id_transrab DESC LIMIT 5";
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  if ($row["notif"]=='1'){
    $output .= '
    <li>
    <a href="#">
    <strong>'.$row["nm_anggaran"].'</strong><br />
    <small><em>Di Terima</em></small>
    </a>
    </li>
    ';
  }else if ($row=='2'){
    $output .= '
    <li>
    <a href="#">
    <strong>'.$row["nm_anggaran"].'</strong><br />
    <small><em>Di Tolak</em></small>
    </a>
    </li>
    ';
  }
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Notif Found</a></li>';
}
$status_query = "SELECT * FROM tb_notif WHERE notif=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>
