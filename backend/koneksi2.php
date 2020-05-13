<?php
$hostname = 'localhost';
$user = 'root';
$pass = '';
$db = 'lades';

$conn = new mysqli($hostname, $user, $pass, $db);
if ($conn->connect_error) {
	//print('Database not found');
}
else {
    //print('Connected');
}
?>