<?php
$hostname = 'localhost';
$user = 'u614985963_lades';
$pass = '1sampai8';
$db = 'u614985963_lades';

$conn = new mysqli($hostname, $user, $pass, $db);
if ($conn->connect_error) {
	
}
else {
    //print('Connected');
}
?>