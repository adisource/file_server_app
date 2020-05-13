<?php
require_once('koneksi.php');
$id_sup =$_POST['id_sup'];
$sql = "SELECT j.jam_pengiriman FROM jadwal_pesanan AS j,suplayer AS s WHERE j.id_suplayer=s.id_suplayer AND s.id_suplayer='$id_sup'";
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