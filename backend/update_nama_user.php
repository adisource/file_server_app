<?php
require_once("koneksi.php");
$nama = $_POST['nama'];
$id_user =$_POST['id_user'];
$sql = mysqli_query($conn,"UPDATE user SET nama='$nama' WHERE id ='$id_user'");

if($sql){
    echo "success";
}else{
    echo "failed";  
}



?>