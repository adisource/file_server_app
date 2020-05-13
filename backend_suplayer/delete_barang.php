<?php
require_once("koneksi.php");
$id_sup =$_POST['id_sup'];
$id_barang =$_POST['id_barang'];

$query_cek = mysqli_query($conn,"DELETE FROM barang  WHERE id_barang ='$id_barang' and id_suplayer='$id_sup' ");

if($query_cek){
    echo "success";
}else{
    echo"filed";
}
mysqli_close($conn);

?>