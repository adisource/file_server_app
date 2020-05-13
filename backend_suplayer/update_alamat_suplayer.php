<?php
require_once("koneksi.php");
$alamat = $_POST['alamat'];
$id_sup =$_POST['id_sup'];
$sql = mysqli_query($conn,"UPDATE suplayer SET alamat='$alamat' WHERE id_suplayer ='$id_sup'");

if($sql){
    echo "success";
}else{
    echo "failed";  
}



?>