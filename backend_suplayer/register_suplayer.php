<?php
require_once("koneksi.php");

$username = $_POST['username'];
$nama_toko =$_POST['nama'];
$nomer_hp =$_POST['nomer_hp'];
$bumdes =$_POST['bumdes'];
$email = $_POST['email'];
$id_desa = $_POST['id_desa'];
$alamat = $_POST['alamat'];
$password =$_POST["password"];

$query_cek = mysqli_query($conn,"SELECT * FROM suplayer WHERE username='$username'");
if (mysqli_num_rows($query_cek)>0){
    $respone['cek']= "exsits";
    echo json_encode($respone);
}else{
    $sql_save = "INSERT INTO suplayer (id_suplayer,nama,bumdes,alamat,kontak, email, username, password,id_desa) VALUES
                                      (null,'$nama_toko','$bumdes','$alamat','$nomer_hp','$email','$username','$password','$id_desa')";
    $query = mysqli_query($conn,$sql_save);
    $respone["cek"]="success";
    echo json_encode($respone);
}
mysqli_close($conn);


?>