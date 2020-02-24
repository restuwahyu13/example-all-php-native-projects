<?php

require '../model/process.php';

$query = searchData($_GET);
$id = 1;
$table = '';

//buat table
$table .= '<h4 class=text-center>Table Data AJAX</h4>
            <table class="table table-bordered table-striped table-hover text-center mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Nama Kota</th>
                    <th>Gambar</th>
                    <th>Alat</th>
                </tr>
            </thead>
            <tbody>';

foreach ($query as $rows) :

    $table .= '
        <tr>
            <td> '.$id++.' </td>
            <td> '.$rows['first_name'] .'</td>
            <td> '.$rows['last_name'] .'</td>
            <td> '.$rows['country_name'] .' </td>
            <td><img src="assets/images/'.strtolower(basename($rows['gambar'])).'" alt="gambar" width="50" height="50"></td>
            <td>
            <button class="btn btn-danger" onclick="deleteData('.$rows['id'].')"><i class="fa fa-trash"></i></button>
            <button class="btn btn-success" onclick="editData('.$rows['id'].')" data-toggle="modal" data-target="#updateData"><i class="fa fa-pencil"></i></button>
            </td>
        </tr>';

endforeach;

$table .= '</tbody></table>';
echo $table;