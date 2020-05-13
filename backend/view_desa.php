<?php
require_once('koneksi.php');
$id_kec = $_POST['id_kec'];
$sql = "SELECT * FROM desa WHERE id_kec='$id_kec'" ;
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