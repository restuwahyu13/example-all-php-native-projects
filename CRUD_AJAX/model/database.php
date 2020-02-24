<?php

$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'mydb';

$conn = new mysqli($serverName, $userName, $password, $dbName);

if(!$conn) {

    die('koneksi gagal'. $conn->connect_errno);
}

?>