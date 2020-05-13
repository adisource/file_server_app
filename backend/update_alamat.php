<?php
require_once("koneksi.php");
$alamat = $_POST['alamat'];
$id_user  =$_POST['id_user'];
$sql = mysqli_query($conn,"UPDATE user SET alamat='$alamat' WHERE id ='$id_user'");

if($sql){
    echo "success";
}else{
    echo "failed";  
}



?>