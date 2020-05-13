<?php
require_once('koneksi.php');
$id_user = $_POST['id_user'];
$sql = "SELECT DISTINCT  b.id_barang,b.nama_barang,b.harga,b.gambar,d.qty,b.stok,s.nama,s.id_suplayer,o.ongkir,ph.nama_desa 
FROM barang AS b,detail_pesanan AS d,suplayer AS s,ongkir AS o,pihak_desa AS ph,jadwal_pesanan AS j  WHERE 
d.id_barang=b.id_barang AND b.id_suplayer=s.id_suplayer AND d.id_user='$id_user' and d.status=0  AND s.id_desa=ph.id_desa AND o.id_desa=ph.id_desa ";

$query = mysqli_query($conn,$sql);
$array = array();
if(mysqli_num_rows($query)>0){
    while($row = mysqli_fetch_assoc($query)){
        $array[]=$row;
    }
    echo json_encode($array);
}
else{
    echo"kosong";
}
mysqli_close($conn);

?>