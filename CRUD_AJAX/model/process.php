<?php

require 'database.php';

//tampilkan data

function tableData() {

    global $conn;
    $query = $conn->query("SELECT * FROM full_data");
    return $query->fetch_all();
}

//tambah data
function insertData ($tambahData) {
    global $conn;

    if(!empty($tambahData['fn']) || !empty($tambahData['ln']) || !empty($tambahData['cn']) || !empty($_FILES['gb'])) :

$data = '';
//get nama file
       trim($filename = '');
//move file ke direktor
        $directory = '../assets/images/'.strtolower(basename($_FILES['gb']['name']));
//setExt FileName
        $setExt = explode('/', strtolower(pathinfo($_FILES['gb']['name'], PATHINFO_EXTENSION)));
//getExt FileName
        $getExt = end($setExt);
//validExt FileName
        $checkExt = ['jpeg', 'png', 'jpg', 'gif'];
// check's valid format
        if(in_array($getExt, $checkExt)) {
            if(is_uploaded_file($_FILES['gb']['tmp_name'])) :
                move_uploaded_file($_FILES['gb']['tmp_name'], $directory);
                $fn = $tambahData['fn'];
                $ln = $tambahData['ln'];
                $cn = $tambahData['cn'];
                $filename .= str_replace($directory, $_FILES['gb']['name'], $directory);
                $sqli = "INSERT INTO full_data(first_name, last_name, country_name, gambar) VALUES('$fn','$ln','$cn','$filename')";
                $conn->query($sqli);
            endif;
        }else if($_FILES['gb']['size'] > 1000000) {
            $data .= '<h1>File Terlalu Besar</h1>';
        }else {
            $data .= '<h1>Ext file ilegal</h1>';
        }
        echo $data;
    endif;
}

//delete data
function deleteData ($del_data) {

    global $conn;

    $delete_data = $del_data['deleteData'];
    $sqli = "DELETE FROM full_data WHERE id = '$delete_data' ";
    $conn->query($sqli);

    return $del_data;
}

function editData($edit_data) {

    global $conn;

    $edits_data = $edit_data['editData'];
    $sqli = "SELECT * FROM full_data WHERE id = '$edits_data' ";
    $query = $conn->query($sqli);

    foreach($query as $rows){};

    $jsonEncode = json_encode($rows);
    echo $jsonEncode;

    return $edit_data;
}

function updateData($updateData) {

    global $conn;

    if(!empty($updateData['fnu']) || !empty($updateData['lnu']) || !empty($updateData['cnu']) || !empty($_FILES['gbu']['name'])) :

        //get nama file
    $filename = '';
    //move file ke direktor
    $directory = '../assets/images/'.strtolower(basename($_FILES['gbu']['name']));
    //setExt Filename
    $setExt = explode('/', strtolower(pathinfo($_FILES['gbu']['name'], PATHINFO_EXTENSION)));
    //getExt Filename
    $getExt = end($setExt);
    //validExt Filename
    $validExt = ['jpg','jpeg','png','gif'];
    //validasi file upload
    if(in_array($getExt, $validExt)) {
        if(is_uploaded_file($_FILES['gbu']['tmp_name'])) :
            move_uploaded_file($_FILES['gbu']['tmp_name'], $directory);
            $id = $updateData['idu'];
            $fnu = $updateData['fnu'];
            $lnu = $updateData['lnu'];
            $cnu = $updateData['cnu'];
            $filename .= str_replace($directory, $_FILES['gbu']['name'], $directory);
            $sqli = "UPDATE full_data SET
            first_name = '$fnu',
            last_name = '$lnu',
            country_name = '$cnu',
            gambar = '$filename'
            WHERE id = '$id' ";
            $conn->query($sqli);
        endif;
    }else if($_FILES['gbu']['size'] > 1000000) {
        echo '<h1>File terlalu besar</h1>';
    }else {
        echo '<h1>File ext ilegal</h1>';
    }

    endif;
}

function searchData($searchId) {

    global $conn;

    $serchData = $searchId['cari'];

    $sqli = "SELECT * FROM full_data WHERE first_name LIKE '%".$serchData."%' OR last_name LIKE '%".$serchData."%' ";
    return $conn->query($sqli);
}

?>
