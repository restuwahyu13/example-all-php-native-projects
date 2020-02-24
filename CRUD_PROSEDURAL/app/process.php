<?php

//init koneksi dari database
require('database.php');
//jalankan fungsi session
session_start();

//tampilkan data ke dalam table
function tableData () {

    global $conn;

     return $conn->query('SELECT * FROM full_data ')->fetch_all();

}

//fungsi tambah data dari nilai yang dikirim dari form ke database
function insertData ($tambah_data) {

    //panggil koneksi
    global $conn;

    //check request method
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($tambah_data['submit'])) :

        //pushData ke database
        $fname = $tambah_data['fn'];
        $lname = $tambah_data['ln'];
        $cname = $tambah_data['cn'];
        $gbname = $_FILES['gb']['name'];

        if(empty($fname) || empty($lname) || empty($cname) || empty($gbname)) {

            echo '<script> alert("data tidak boleh kosong")</script>';

        }else {

            //move file ke direktor
            $directory = '../image/' . strtolower(basename($gbname));
            //set function FileName
            $sizeFile = $_FILES['gb']['size'];
            $dirFile = $_FILES['gb']['tmp_name'];
            //setExt FileName
            $setExt = explode('/', strtolower(pathinfo($gbname, PATHINFO_EXTENSION)));
            //getExt FileName
            $getExt = end($setExt);
            //setExt FileName
            $checkExt = ['jpeg', 'png', 'jpg', 'gif'];
            //file upload validasi
            if (!in_array($getExt, $checkExt)) {
                echo '<script> alert("file ext tidak support")</script>';

            } else if ($sizeFile > 1000000) {
                echo '<script> alert("file terlalu besar")</script>';

            } else {

                //check method request upload menggunakan post
                if (is_uploaded_file($dirFile)) {

                    //pindahkah file yang di upload ke direktor
                    move_uploaded_file($dirFile, $directory);
                    //tambahkan data kedalam database
                    $sqli = "INSERT INTO full_data(first_name, last_name, country_name, gambar)
                     VALUES ('$fname', '$lname', '$cname', '$gbname')";
                     $conn->query($sqli);

                } else {
                    echo '<script> alert("file gagal ditambahkan")</script>';
                }
            }
        }
    endif;

    return $conn->affected_rows;
}

//fungsi hapus data dari nilai yang dikirim dari url berdasarkan id
function deleteData($delete_data) {

    //panggil koneksi
    global $conn;

    //check request method
    if($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_METHOD'] !== 'POST') :

    $del_data = $delete_data['del'];
    $sqli = "DELETE FROM full_data WHERE id = '$del_data' ";
    return $conn->query($sqli);

    endif;
}

//fungsi pilih data dari nilai yang diambil dari table
//untuk menampilkan nilai ke form update data
function editData($edits_data) {

    //panggil koneksi
    global $conn;

    $edit_data = $edits_data['edit'];
    $sqli = "SELECT * FROM full_data WHERE id = '$edit_data' ";
    return $conn->query($sqli);
}

//fungsi memperbarui data kedalam database
function updateData($update_data) {

    //panggil koneksi
    global $conn;

    $id = trim($update_data['id']);
    $fname = trim($update_data['fnu']);
    $lname = trim($update_data['lnu']);
    $cname = trim($update_data['cnu']);
    $gbname = trim($_FILES['gbu']['name']);

    //move file ke direktor
    $directory = '../image/' . strtolower(basename($gbname));
    //set function FileName
    $sizeFile = $_FILES['gbu']['size'];
    $dirFile = $_FILES['gbu']['tmp_name'];
    //setExt FileName
    $setExt = explode('/', strtolower(pathinfo($gbname, PATHINFO_EXTENSION)));
    //getExt FileName
    $getExt = end($setExt);
    //setExt FileName
    $checkExt = ['jpeg', 'png', 'jpg', 'gif'];
    //file upload validasi
    if (!in_array($getExt, $checkExt) || empty($gbname)) {
        echo '<script> alert("file ext tidak support")</script>';

    } else if ($sizeFile > 1000000) {
        echo '<script> alert("file terlalu besar")</script>';

    } else {

        //check method request upload menggunakan post
        if (is_uploaded_file($dirFile)) {

            //pindahkah file yang di upload ke direktor
            move_uploaded_file($dirFile, $directory);
            //tambahkan data kedalam database
            $sqli = "UPDATE full_data SET 
            first_name = '$fname', 
            last_name = '$lname', 
            country_name = '$cname', 
            gambar = '$gbname'
            WHERE id = '$id' ";
            $conn->query($sqli);
            return $conn->affected_rows;
        }
    }
}

//fungsi mencari data berdasarkan nama depan dan belakang
function searchData($searchId) {

    //panggil koneksi
    global $conn;

    //check request method
    if($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_METHOD'] !== 'POST') :

    //jika benar tampilkan pesan ini
    if(!empty($searchId)) {
        //result data ke table search dan tampilkan pencarian data
         $sqli = "SELECT * FROM full_data WHERE first_name LIKE '%".$searchId."%' || last_name LIKE '%".$searchId."%'  ";
         $query = $conn->query($sqli);
         return $query->fetch_all();
    } else {
        //tampilkan pesan sesi jika salah
        echo '<script> alert("data tidak ditermukan"); </script>';
    }

    endif;
}

//fungsi tambah data users
function dataRegister($register) {

    global $conn;

    $nama = $register['username'];
    $email = $register['email'];
    $pass = $register['pass'];
    $cpass = $register['cpass'];

    if(empty($nama) || empty($pass) || empty($cpass)) {// validasi jika form kosong dan data gagal ditambahkan
        echo '<script> alert("data gagal ditambahkan") </script>';
    }else if($cpass !== $pass) {// validasi jika konfirm password tidak cocok dengan password pertama
        echo '<script> alert("password tidak sama") </script>';
    }else if(strlen($pass) <= 5 || strlen($cpass) <= 5) { //validasi jika password terllalu pendek
        echo '<script> alert("password terlalu pendek") </script>';
    }else if(preg_match('/[~`!@#$%^&*()_+={}|:;"<>,?]/', $nama)) { //validasi jika mengunakan karakter ilegal
        echo '<script> alert("username ilegal karakter") </script>';
    } else {
        //enkripsi password
        $hash_pass = password_hash($pass, PASSWORD_ARGON2ID);
        $hash_cpass = password_hash($pass, PASSWORD_ARGON2ID);
        $conn->query("INSERT INTO users(username, email, password, c_password) VALUES('$nama','$email','$hash_pass','$hash_cpass')");
        return $conn->affected_rows;
    }
}

//fungsi data masuk
function loginData($login) {

    global $conn;

    $nama = $login['username'];
    $pass = $login['pass'];

    //meminta data untuk validasi dari database
    $query = $conn->query("SELECT * FROM users WHERE username = '$nama' || password = '$pass' ");
    $check = $query->fetch_assoc();

    //username dan password validasi
    if($nama === $check['username'] && password_verify($pass, $check['password'])) {
        //lempar username
        $_SESSION['nama'] = $check['username'];
        //alert pesan jika berhasil
        echo '<script> alert("login berhasil"); </script>';
//        redirect jika berhasil login
        echo '<script> window.location.href = "app/home.php"; </script>';
    }else {
        //alert pesan jika gagal
        echo '<script> alert("password/username salah"); </script>';
    }
}

function forgotPassword($forgotPass) {

    global $conn;

    $email = $forgotPass['email'];

    //meminta data untuk validasi dari database
    $query = $conn->query("SELECT * FROM users WHERE email = '$email' ");
    $check = $query->fetch_assoc();

    if($email === $check['email']) {
        //lempar session jika email cocok
         $_SESSION['e-mail'] = $check['id'];
        //redirect jika berhasil login
        echo '<script> window.location.href = "change_pass.php"; </script>';
    }else {
        echo '<script> alert("email anda tidak terdaftar"); </script>';
    }
}

function changePassword($changePass) {

    global $conn;

    $id = $changePass['id'];
    $pass = $changePass['pass'];
    $cpass = $changePass['cpass'];

    //validasi password
    if($cpass !== $pass) {
        echo '<script> alert("password tidak sama"); </script>';
    }else if(strlen($pass) <= 6 || strlen($cpass) <= 6) {
        echo '<script> alert("password terlalu pendek"); </script>';
    }else{
        //enkripsi password kembali
        $passHash = password_hash($pass, PASSWORD_ARGON2ID);
        $cpassHash = password_hash($cpass, PASSWORD_ARGON2ID);
        // update new password
        $sqli = "UPDATE users SET password = '$passHash', c_password = '$cpassHash' WHERE id = '$id' ";
        $conn->query($sqli);
    }

    return $conn->affected_rows;
}

?>