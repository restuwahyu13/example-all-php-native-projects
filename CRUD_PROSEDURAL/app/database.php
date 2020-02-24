<?php

//init server mysql dan database
$server_name = 'localhost';
$username = 'root';
$password = '';
$db_name = 'mydb';

//menghubungkan koneksi dengan database
$conn = mysqli_connect($server_name, $username, $password, $db_name);

//error handling jika koneksi tidak terkoneksi
if ($conn->connect_errno) {

    die('koneksi gagal' . $conn->connect_error);
}


?>
