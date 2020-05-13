<?php
include_once('koneksi.php');

$id_sup= $_POST['id_sup'];
$sql = "SELECT * FROM jadwal_pesanan AS j  WHERE j.id_suplayer='$id_sup'";
$res = mysqli_query($conn,$sql);
$arr = array();
if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
        $arr[] = $row;
    }
    echo json_encode($arr);
}

mysqli_close($conn);


?>