<?php
require_once("koneksi.php");
$jam_pesan = $_POST['jam_pesanan'];
$jam_pengepulan = $_POST['jam_pengepulan'];
$jam_pengiriman =$_POST['jam_pengiriman'];
$id_sup = $_POST['id_sup'];
$s = "INSERT INTO jadwal_pesanan (id_pesanan,jam_pesan,jam_pengepulan,jam_pengiriman,id_suplayer) values (null,'$jam_pesan','$jam_pengepulan','$jam_pengiriman','$id_sup')";
$sql = mysqli_query($conn,$s);
if($sql){
    echo "success";
}else{
    echo "failed";  
}



?>