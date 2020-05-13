<?php
require_once("koneksi.php");

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$nik =$_POST['nik'];
$tgl_lahir =$_POST['tgl_lahir'];
$nomer_hp =$_POST['no_hp'];
$jk = $_POST['jk'];
$email =$_POST['email'];
$status= $_POST['status'];

$sql = mysqli_query($conn,"UPDATE profil_user SET '$nama','$nik','$tgl_lahir','$nomer_hp','$jk','$email','$status' WHERE id ='$id_user'");

if($sql){
    echo "success";
}else{
    echo "failed";  
}



?>