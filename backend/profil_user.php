<?php
include_once('koneksi.php');

$id_user = $_POST['id_user'];
$sql = "SELECT * FROM user WHERE id = '$id_user' ";
$res = mysqli_query($conn,$sql);
$arr = array();
if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_array($res)){
        $arr[] = $row;
    }
    echo json_encode($arr);
}

mysqli_close($conn);


?>