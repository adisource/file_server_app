<?php
require_once('koneksi.php');

$sql ="SELECT p.id_desa,p.nama_desa FROM pihak_desa AS p ";
$query = mysqli_query($conn,$sql);
$array = array();
if(mysqli_num_rows($query)>0){
    while($row = mysqli_fetch_assoc($query)){
        $array[]=$row;
    }
    echo json_encode($array);
}
mysqli_close($conn);
?>