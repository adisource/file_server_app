<?php
include_once('koneksi.php');

$desa= $_POST['nama_desa'];
$sql = "SELECT * FROM pihak_desa WHERE nama_desa ='$desa'";
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