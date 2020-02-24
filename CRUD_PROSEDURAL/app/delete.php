<?php

require('process.php');

if( deleteData($_GET) > 0) {
    //alert pesan jika data berhasil dihapus
    echo '<script> alert("data berhasil dihapus") </script>';
    echo '<script> location.href = "home.php" </script>';
} else {
    //alert pesan jika data gagal dihapus
    echo '<script> alert("data gagal dihapus") </script>';
    echo '<script> location.href = "home.php" </script>';
}

?>
