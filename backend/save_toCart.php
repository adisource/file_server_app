<?php
require_once("koneksi.php");
$qty =$_POST['qty'];
$id_user =$_POST['id_user'];
$id_barang =$_POST['id_barang'];
$kode_order =$_POST['kode_order'];
$id_suplayer =$_POST['id_suplayer'];
$status = 0;
$query_cek = mysqli_query($conn,"SELECT* FROM detail_pesanan WHERE id_barang ='$id_barang' and id_user='$id_user' and detail_pesanan.status=0");
if (mysqli_num_rows($query_cek)>0){
    $respone['cek']= "exsits";
    echo json_encode($respone);
}else{
    $sql_save = "INSERT INTO detail_pesanan (id_transaksi,id_user,id_barang,id_suplayer,qty,kode_order,status) VALUES (null,'$id_user','$id_barang','$id_suplayer',$qty,'$kode_order','$status')";
    $query = mysqli_query($conn,$sql_save);
    $respone["cek"]="success";
    echo json_encode($respone);
}
mysqli_close($conn);

?>