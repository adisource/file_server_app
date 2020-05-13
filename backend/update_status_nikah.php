<?php
require_once("koneksi.php");
$status_nikah = $_POST['status_nikah'];
$id_user =$_POST['id_user'];
$sql = mysqli_query($conn,"UPDATE user SET status_nikah='$status_nikah' WHERE id ='$id_user'");

if($sql){
    echo "success";
}else{
    echo "failed";  
}



?>