<?php
require_once('koneksi.php');
$id_suplayer =$_POST['id_sup'];
$sql = "SELECT DISTINCT b.id_barang, b.nama_barang, b.gambar, b.stok,b.harga,b.keterangan,b.status, s.id_suplayer,s.nama FROM barang AS b,suplayer AS s,kategori AS k,pihak_desa AS ph  
WHERE b.id_suplayer= s.id_suplayer AND s.id_suplayer='$id_suplayer' AND ph.id_desa=s.id_desa ORDER BY id_barang DESC";

$query = mysqli_query($conn,$sql);
$array = array();
if(mysqli_num_rows($query)>0){
    while($row = mysqli_fetch_assoc($query)){
        $array[]=$row;
    }
    echo json_encode($array);
}
else{
    echo "kosong";
}
mysqli_close($conn);
?>