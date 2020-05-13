<?php
require_once("koneksi.php");

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$desa = $_POST['desa'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];
$password = $_POST['password'];
$kecamatan = $_POST['kecamatan'];
$kabupaten = $_POST['kabupaten'];

$query_cek = mysqli_query($conn,"SELECT * FROM user WHERE nik='$nik'");
if (mysqli_num_rows($query_cek)>0){
    $respone['cek']= "exsits";
    echo json_encode($respone);
}else{
    $sql_save = "INSERT INTO user (id,nik, tgl_lahir, nama, jk, desa,alamat, telpon, password, kecamatan, kabupaten) VALUES (null, '$nik', '$tgl_lahir', '$nama', '$jk','$desa','$alamat', '$telpon', '$password', '$kecamatan', '$kabupaten')";
    $query = mysqli_query($conn,$sql_save);
    $respone["cek"]="success";
    echo json_encode($respone);
}
mysqli_close($conn);


?>