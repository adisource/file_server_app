<?php
require_once('koneksi.php');
$id_barang = $_POST['id_barang'];
$sql = "SELECT  b.nama_barang,b.harga,o.ongkir,ph.nama_desa FROM barang AS b,ongkir AS o, desa AS 
d,suplayer AS s,pihak_desa AS ph
WHERE  d.id_desa=o.id_desa and b.id_barang='$id_barang' AND s.id_suplayer=b.id_suplayer AND ph.id_desa = s.id_desa AND o.id_desa=ph.id_desa" ;
$query = mysqli_query($conn,$sql);
$array = array();
if(mysqli_num_rows($query)>0){
    while($row = mysqli_fetch_assoc($query)){
        $array[]=$row;
    }
    echo json_encode($array);
}
mysqli_close($conn);

?>