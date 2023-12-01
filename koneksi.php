<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'dm_native';

//koneksi ke server database mysql
$conn = mysqli_connect($host, $user, $pass, $db);

//koneksi ke database yang dituju
mysqli_select_db($conn, $db);
?>
