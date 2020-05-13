<?php
require_once('koneksi.php');
$id_user = $_POST['id'];
$id_sup = $_POST['id_sup'];
$desa=$_POST['desa'];
$sql = "SELECT b.id_barang, b.nama_barang, b.harga, b.gambar, p.qty,p.total,p.jam,p.status,(SELECT token FROM device_user AS ds WHERE id_user='$id_user') AS token
,(SELECT ongkir FROM ongkir, desa WHERE desa.nama_desa='$desa'and ongkir.id_desa=desa.id_desa) AS ongkir FROM                                                                                                     
barang AS b, pesan AS p,user AS u WHERE p.id = u.id AND p.id_barang=b.id_barang  AND  p.id='$id_user' AND p.id_suplayer='$id_sup' and p.status=2 order BY id_order DESC" ;
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