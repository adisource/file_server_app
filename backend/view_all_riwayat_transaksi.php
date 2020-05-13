<?php
require_once('koneksi.php');
$id_user=$_POST['id_user'];
$desa =$_POST['desa'];
$sql = "SELECT b.nama_barang,b.harga,b.gambar,p.tgl_pesan,p.jam,p.qty,p.total,p.status,s.nama, p.status,
(SELECT ongkir FROM ongkir, desa WHERE desa.nama_desa='$desa' and ongkir.id_desa=desa.id_desa) AS ongkir 
 FROM pesan AS p,barang AS b, suplayer AS s  WHERE 
b.id_barang=p.id_barang AND p.id='$id_user' AND p.id_suplayer=s.id_suplayer ORDER  BY p.id_order desc  ";
$query = mysqli_query($conn,$sql);
$array = array();
if(mysqli_num_rows($query)>0){
    while($row = mysqli_fetch_assoc($query)){
        $array[]=$row;
    }
    echo json_encode($array);
}else{
    echo"kosong";
}
mysqli_close($conn);
?>