<?php
require_once('koneksi.php');
$id_sup=$_POST['id_sup'];
$sql ="SELECT COUNT(*) AS jml_barang,SUM(total) AS total,u.id, u.nama,u.telpon,u.desa FROM pesan AS p,barang AS b,user AS u WHERE p.id_barang=b.id_barang AND p.id=u.id AND p.id_suplayer='$id_sup' ORDER BY p.id_order desc" ;
$query = mysqli_query($conn,$sql);
$array = array();
if(mysqli_num_rows($query)>0){
    while($row = mysqli_fetch_assoc($query)){
        $array[]=$row;
    }
    echo json_encode($array);
}else{
    echo "kosong";
}
mysqli_close($conn);

?>