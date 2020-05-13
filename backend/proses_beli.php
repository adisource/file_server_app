<?php
require_once('koneksi.php');

$tgl_pesan=date("Y-m-d");
$jam =$_POST['jam'];
$status =0;
$sql = "SELECT * FROM detail_pesanan where status=0" ;
$query = mysqli_query($conn,$sql);
$array = array();
if(mysqli_num_rows($query)> 0){
    while($row = mysqli_fetch_assoc($query)){
        $array[]=$row;
    }
    foreach ($array as $data) {
        $item_idUser = $data['id_user'];
        $item_idBarang = $data['id_barang'];
        $item_qty = $data['qty'];
        $item_kode = $data['kode_order'];
        $item_total=$data['total_harga'];
        $item_idSupyaer =$data['id_suplayer'];
        $sql_save = "INSERT INTO pesan (tgl_pesan,jam,id,id_barang,id_suplayer,qty,total,kode_order,status)  VALUES ('".$tgl_pesan."','".$jam."','".$item_idUser."','".$item_idBarang."','".$item_idSupyaer."','".$item_qty."','".$item_total."','".$item_kode."','".$status."')";
        $query_save = mysqli_query($conn,$sql_save);
        if($query_save){
            echo "success";
            $update=mysqli_query($conn," UPDATE detail_pesanan SET status=1 where id_barang ='$item_idBarang'");
        }else{
            echo "filed";
        }
    }
}
mysqli_close($conn);










?>