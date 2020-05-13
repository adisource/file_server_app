<?php
require_once('koneksi.php');
$desa=$_POST['desa'];
$sql = "SELECT j.jam_pesan,j.jam_pengepulan,j.jam_pengiriman,s.nama FROM jadwal_pesanan AS j, 
suplayer AS s ,pihak_desa AS pd WHERE j.id_suplayer=s.id_suplayer AND s.bumdes=0  AND pd.nama_desa='$desa'";
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