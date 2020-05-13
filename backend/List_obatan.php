<?php
require_once('koneksi.php');
$desa=$_POST['desa'];
$sql = "SELECT barang.id_barang, barang.nama_barang, barang.harga, barang.stok, barang.gambar, kategori.kategori, suplayer.nama, suplayer.id_suplayer, pihak_desa.nama_desa
from barang, kategori, suplayer, pihak_desa WHERE barang.id_kategori = kategori.id_kategori  and 
barang.id_suplayer = suplayer.id_suplayer and suplayer.id_desa = pihak_desa.id_desa AND kategori.id_kategori=3 and pihak_desa.nama_desa='$desa'" ;

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