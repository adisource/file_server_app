<?php
require_once("koneksi.php");
$id_user =$_POST['id_user'];
$sql = "SELECT  * FROM detail_pesanan AS d,suplayer AS s,barang AS b WHERE b.id_barang=d.id_barang AND s.id_suplayer=d.id_suplayer AND d.id_user='$id_user' and d.status=0 AND s.bumdes=0";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
    echo "exist";
}

?>