<?
require_once("koneksi.php");

$id_user = $_POST["id_user"];
$token  = $_POST['token'];
$sql_select="SELECT * from device_user where id_user = '$id_user'";
$query_cek = mysqli_query($conn,$sql_select);
if(mysqli_num_rows($query_cek)>0){

}else{
    $sql_save = "INSERT INTO device_user (token,id_user) VALUES ('$token','$id_user')";
    $query = mysqli_query($conn,$sql_save);
    if($sql_save >0){
       echo"success";
    }else{
        echo"gagal";
    }
    mysqli_close($conn);
}

