<?php
require_once('koneksi.php');
$id_sup = $_POST['id_sup'];
$sql = "SELECT s.id_suplayer, s.nama,s.alamat,s.kontak,count(*) jml_barang,o.ongkir FROM barang AS b, suplayer AS s,pihak_desa AS pd,ongkir AS o WHERE b.id_suplayer = s.id_suplayer 
AND s.bumdes=0 AND pd.id_desa=s.id_desa AND o.id_desa= pd.id_desa and s.id_suplayer='$id_sup'";
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