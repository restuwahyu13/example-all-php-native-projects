<?php
require 'process.php';
//dapakan sesason
$data = $_SESSION['nama'];
//session validasi
if(session_id()) {
    //create new sesason
    $_SESSION['logout'] = $data;
    echo '<script> window.location.href="../index.php";</script>';
}