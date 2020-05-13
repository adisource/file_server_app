<?php
require_once("koneksi.php");
$id=$_POST['id'];
$status =$_POST['status'];
$status_pembanding =$_POST['pembanding'];
$id_barang =$_POST['id_barang'];
$jam = $_POST['jam'];
$sql_update="UPDATE pesan as p SET p.status='$status',p.jam='$jam' WHERE p.id='$id' AND p.status='$status_pembanding' and p.id_barang='$id_barang'";
$query_cek = mysqli_query($conn,$sql_update);
if($query_cek){
    echo "success";
}else{
    echo"filed";
}
mysqli_close($conn);

?>