<?php
include_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username =$_POST['username'];
    $pass =$_POST['password'];
    $sql = "SELECT s.id_suplayer,s.nama,s.alamat,s.kontak,s.email,s.username,s.password,p.nama_desa FROM suplayer AS s,pihak_desa AS p WHERE username ='$username' AND PASSWORD='$pass' AND p.id_desa = s.id_desa";
    $res = mysqli_query($conn,$sql);
    $cek = mysqli_fetch_array($res);
    if(isset($cek)){
        
        $row['status']="success";
        $row['id_sup']=$cek['id_suplayer'];
        $row['desa']=$cek['nama_desa'];
        echo json_encode($row);
        
    }else{
        $row['status'] = "filed";
        echo json_encode($row);
    }
}

?>