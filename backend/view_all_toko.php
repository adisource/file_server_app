<?php
require_once('koneksi.php');
$desa=$_POST['desa'];

$sql = "SELECT s.id_suplayer, s.nama,s.alamat,COUNT(*) jml_barang FROM barang AS b, suplayer AS s,pihak_desa AS pd
WHERE b.id_suplayer = s.id_suplayer AND s.bumdes=0 AND pd.id_desa=s.id_desa AND pd.nama_desa='$desa' GROUP BY s.id_suplayer";
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