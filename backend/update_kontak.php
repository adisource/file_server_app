<?php
require_once("koneksi.php");
$nomer_hp = $_POST['nomer_hp'];
$email = $_POST['email'];
$id_user =$_POST['id_user'];
$sql = mysqli_query($conn,"UPDATE user SET telpon='$nomer_hp',email='$email' WHERE id ='$id_user'");

if($sql){
    echo "success";
}else{
    echo "failed";  
}



?>