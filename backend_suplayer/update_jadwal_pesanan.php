<?php
require_once("koneksi.php");
$jam_pesan = $_POST['jam_pesanan'];
$jam_pengepulan = $_POST['jam_pengepulan'];
$jam_pengiriman =$_POST['jam_pengiriman'];
$id_sup = $_POST['id_sup'];
$sql = mysqli_query($conn,"UPDATE jadwal_pesanan SET jam_pesan='$jam_pesan',jam_pengepulan='$jam_pengepulan',jam_pengiriman='$jam_pengiriman' WHERE id_suplayer='$id_sup'");
if($sql){
    echo "success";
}else{
    echo "failed";  
}



?>