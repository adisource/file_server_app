<?php
include_once('koneksi.php');

$id_sup= $_POST['id_sup'];
$sql = "SELECT b.id_barang, b.nama_barang,b.harga,b.stok,b.keterangan,b.status,b.gambar FROM barang AS b  WHERE b.id_suplayer='$id_sup' ORDER BY id_barang desc";
$res = mysqli_query($conn,$sql);
$arr = array();
if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
        $arr[] = $row;
    }
    echo json_encode($arr);
}

mysqli_close($conn);


?>