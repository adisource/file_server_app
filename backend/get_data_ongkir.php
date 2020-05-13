<?php
require_once('koneksi.php');
$desa=$_POST['desa'];
$sql = "SELECT DISTINCT o.ongkir,o.id_desa FROM ongkir AS o,desa AS d WHERE o.id_desa=d.id_desa AND  d.nama_desa='$desa'";
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