<?php
require_once("koneksi.php");
$tgl_lahir = $_POST['tgl_lahir'];
$id_user =$_POST['id_user'];
$sql = mysqli_query($conn,"UPDATE user SET tgl_lahir='$tgl_lahir' WHERE id ='$id_user'");

if($sql){
    echo "success";
}else{
    echo "failed";  
}



?>