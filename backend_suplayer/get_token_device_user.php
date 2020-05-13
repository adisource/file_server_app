<?php
require_once('koneksi.php');
$id=$_POST['id_user'];
$sql = "SELECT * FROM device_user WHERE id_user=$id" ;
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