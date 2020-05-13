<?php
include_once('koneksi.php');

$id_user =$_POST['id_user'];
$sql = "SELECT COUNT(*) as count FROM detail_pesanan WHERE detail_pesanan.id_user= '$id_user' and detail_pesanan.status=0";
$res = mysqli_query($conn,$sql);
$cek = mysqli_fetch_assoc($res);
if(isset($cek)){
    $count['count']=$cek["count"];
    echo json_encode($count);
}
?>