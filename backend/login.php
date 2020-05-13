<?php
include_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nik =$_POST['nik'];
    $pass =$_POST['password'];
    $sql = "SELECT * FROM user WHERE nik = '$nik' and password= '$pass'";
    $res = mysqli_query($conn,$sql);
    $cek = mysqli_fetch_array($res);
    if(isset($cek)){
        $row['status']="success";
        $row['id_user']=$cek['id'];
        $row['desa']=$cek['desa'];
        $sql_update = "UPDATE user  SET verified=1 where nik='$nik'";
        $res = mysqli_query($conn,$sql_update);
        echo json_encode($row);
        
    }else{
        $row['status'] = "filed";
        echo json_encode($row);
    }
}

?>