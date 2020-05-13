<?php
require_once('koneksi.php');
$desa = $_POST['desa'];
$sql = "SELECT info_desa.tgl, info_desa.time, info_desa.judul as judul, info_desa.berita as berita, pihak_desa.nama_desa, pihak_desa.alamat,
pihak_desa.telpon, pihak_desa.email, pihak_desa.kontak_kesehatan, pihak_desa.kontak_keamanan, pihak_desa.kontak_khusus 
from info_desa, pihak_desa where info_desa.id_desa = pihak_desa.id_desa and 
pihak_desa.nama_desa = '$desa'";
$query = mysqli_query($conn,$sql);
$array = array();
if(mysqli_num_rows($query)>0){
    while($row = mysqli_fetch_assoc($query)){
        $array[]=$row;
    }
    echo json_encode($array);
}else{
    echo "Belum ada berita";
}
mysqli_close($conn);

?>