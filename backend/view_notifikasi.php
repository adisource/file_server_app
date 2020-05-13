<?php
require_once('koneksi.php');
$desa= $_POST['desa'];
$sql = "SELECT p.tgl,p.jam,p.judul,p.isi,ph.nama_desa FROM pemberitahuan AS p,pihak_desa AS ph WHERE p.id_desa =ph.id_desa AND ph.nama_desa='$desa' ORDER BY p.id_pemberitahuan DESC ";
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