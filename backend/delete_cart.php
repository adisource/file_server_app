<?php
require_once("koneksi.php");
$id_barang =$_POST['id_barang'];

$query_cek = mysqli_query($conn,"DELETE FROM detail_pesanan  WHERE id_barang ='$id_barang' and status = 0 ");

if($query_cek){
    echo "success";
}else{
    echo"filed";
}
mysqli_close($conn);

?>