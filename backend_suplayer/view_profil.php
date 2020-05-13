<?php
require_once('koneksi.php');
$id=$_POST['id_suplayer'];
$sql = "SELECT s.nama,s.alamat,s.kontak,s.username,s.email,s.password,ph.kabupaten,ph.kecamatan,ph.nama_desa FROM  suplayer AS s,pihak_desa AS ph WHERE s.id_suplayer='$id' AND s.id_desa=ph.id_desa" ;
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