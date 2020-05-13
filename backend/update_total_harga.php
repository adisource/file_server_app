<?php
require_once("koneksi.php");
$id_barang =$_POST['id_barang'];
$total_h =$_POST['total_harga'];
$query_cek = mysqli_query($conn,"UPDATE detail_pesanan as o SET o.total_harga='$total_h' WHERE id_barang ='$id_barang'");

if($query_cek){
    echo "success";
}else{
    echo"filed";
}
mysqli_close($conn);

?>