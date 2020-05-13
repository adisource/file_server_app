<?php
require_once("koneksi.php");
$kontak = $_POST['kontak'];
$email = $_POST['email'];
$id_sup =$_POST['id_sup'];
$sql = mysqli_query($conn,"UPDATE suplayer SET kontak='$kontak',email='$email' WHERE id_suplayer='$id_sup' ");

if($sql){
    echo "success";
}else{
    echo "failed";  
}



?>