<?php

require_once '../model/process.php';

//data table
$id = 1;
$table = '';

//data pagenation
$dataPerhalaman = 5;
$halamanAktif = (isset($_POST['hal']) ? $_POST['hal'] : 1);
$jumlahData = count(tableData());
$pagePerhalaman = ceil($jumlahData / $dataPerhalaman);
$awalanData = ($halamanAktif - 1) * $dataPerhalaman;
$query = $conn->query("SELECT * FROM full_data LIMIT $awalanData, $dataPerhalaman");

//data selanjutnya dan sebelumnya
$next = $halamanAktif + 1;
$prev = $halamanAktif - 1;

//data default index awal dan index terakhir
$right_link = $pagePerhalaman;
$left_link = 1;

//fungsi limit menampilkan page link
//start from 4 page
$hidePageAuto = floor($jumlahData / $pagePerhalaman) + $halamanAktif;
//start from 5 page
$showpageAuto = ceil($jumlahData / $pagePerhalaman) + $halamanAktif;

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
            <td> <img src="assets/images/'.strtolower(basename($rows['gambar'])).'" alt="gambar" width="50" height="50"></td>
            <td>
            <button class="btn btn-danger" onclick="deleteData('.$rows['id'].')"><i class="fa fa-trash"></i></button>
            <button class="btn btn-success" onclick="editData('.$rows['id'].')" data-toggle="modal" data-target="#updateData"><i class="fa fa-pencil"></i></button>
            </td>
        </tr>';

endforeach;

$table .= '</tbody></table>';

$table .= '<ul class="pagination mt-4 position-relative mx-auto justify-content-center">';

//fungsi page default hal ke pertama
if($left_link !== $halamanAktif && $halamanAktif > 1) {
    $table .= '<li class="page-item left_link" id="'.$left_link.'">';
    $table .= '<a href="?hal='.$left_link.'" class="page-link">&laquo;</a>';
    $table .= '</li>';
}

//fungsi page sebelumnya
if($prev !== $halamanAktif && $halamanAktif > 1) {
    $table .= '<li class="page-item prev" id="'.$prev.'">';
    $table .= '<a href="?hal='.$prev.'" class="page-link">&lsaquo;</a>';
    $table .= '</li>';
}

//pagination link dan page active
for ($i = 1; $i <= $pagePerhalaman; $i++) {

    if($i  < $showpageAuto) :
        //show dan hide page selanjutnya
        if ($i == $halamanAktif) {
            $table .= '<li class="active page-item" id="' . $i . '">';
            $table .= '<a href="?hal=' . $i . '" class="page-link text-decoration-none">' . $i . '</a>';
            $table .= '</li>';
        } else {
            //show all result data minimal 5
            if($i > $halamanAktif) :
                $table .= '<li class="page-item page" id="' . $i . '">';
                $table .= '<a href="?hal=' . $i . '" class="page-link text-decoration-none">' . $i . '</a>';
                $table .= '</li>';
            endif;
        }

//        else :
//
//            if ($i == $halamanAktif) {
//                $page .= '<li class="active page-item" id="' . $i . '">';
//                $page .= '<a href="?hal=' . $i . '" class="page-link text-decoration-none">' . $i . '</a>';
//                $page .= '</li>';
//            } else {
//
//                //show all result data berdasarkan jumlah $dataPerhalaman
//                if($i > $halamanAktif) :
//                    $page .= '<li class="page-item page" id="' . $i . '">';
//                    $page .= '<a href="?hal=' . $i . '" class="page-link text-decoration-none">' . $i . '</a>';
//                    $page .= '</li>';
//                endif;
//            }

    endif;
}

////fungsi page selanjutnya
if($next !== $halamanAktif && $halamanAktif < $pagePerhalaman) {
    $table .= '<li class="page-item next" id="'.$next.'">';
    $table .= '<a href="?hal='.$next.'" class="page-link">&rsaquo;</a>';
    $table .= '</li>';
}

//fungsi page default halaman terakhir
if($right_link !== $halamanAktif && $halamanAktif < $pagePerhalaman) {
    $table .= '<li class="page-item right_link" id="'.$right_link.'">';
    $table .= '<a href="?hal='.$right_link.'" class="page-link">&raquo;</a>';
    $table .= '</li>';
}

$table .= '</ul>';

echo $table;