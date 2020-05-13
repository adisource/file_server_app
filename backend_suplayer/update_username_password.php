<?php
require_once("koneksi.php");
$username = $_POST['username'];
$password = $_POST['password'];
$id_sup = $_POST['id_sup'];
$sql = mysqli_query($conn,"UPDATE suplayer SET username='$username',password='$password' WHERE id_suplayer ='$id_sup'");

if($sql){
    echo "success";
}else{
    echo "failed";  
}



?>