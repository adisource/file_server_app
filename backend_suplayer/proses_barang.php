<?php
require_once("koneksi.php");
$id=$_POST['id'];
$jam=$_POST['jam'];
$sql_update="UPDATE pesan as p SET p.status=2 , p.jam='$jam' WHERE p.id='$id' and p.status=1";
$query_cek = mysqli_query($conn,$sql_update);
if($query_cek){
    echo "success";
}else{
    echo"filed";
}
mysqli_close($conn);

?>