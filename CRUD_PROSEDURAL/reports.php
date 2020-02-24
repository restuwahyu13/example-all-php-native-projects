<?php

//init library PDF
require 'library/fpdf.php';
//load fungsi
require 'app/process.php';
//init fungsi
function reportData()
{

  global $conn;

  $id = 1;
  $query = $conn->query('SELECT * FROM full_data');

  $pdf = new FPDF('P', 'mm', 'A4');
  $pdf->AddPage();

  //add headers
  $pdf->Image('image/jual es-.png', 5, 5, 23, 20, 'png');
  $pdf->SetFont('Arial', 'B', 16);
  $pdf->SetXY(151, 5);
  $pdf->Cell(43, 10, 'PT Angin Ribut Sentosa', 0, 0, 'C');
  $pdf->Ln();

  //add title header
  $pdf->SetFont('Arial', 'B', 11);
  $pdf->SetXY(126, 13);
  $pdf->Cell(43, 10, 'Alamat:', 0, 1, 'C');
  $pdf->SetFont('Arial', 'B', 9);
  $pdf->SetXY(153, 13);
  $pdf->Cell(43, 10, 'Jl.Sultan Iskandar No.112', 0, 1, 'C');
  $pdf->SetFont('Arial', 'B', 11);
  $pdf->SetXY(127, 18);
  $pdf->Cell(43, 10, 'No Telp:', 0, 1, 'C');
  $pdf->SetFont('Arial', 'B', 9);
  $pdf->SetXY(146, 18);
  $pdf->Cell(43, 10, '(021) 888 321:', 0, 1, 'C');
  $pdf->Ln(10);

  //add live header

  $pdf->Line(250, 28, 0, 28);
  $pdf->Ln(10);

  //add Title table
  $pdf->SetFont('Helvetica', 'B', 18);
  $pdf->SetX(15);
  $pdf->Cell(0, 10, 'Data Table Pendataan Warga', 0, 0, 'C');
  $pdf->Ln(15);

  //add table headers
  $pdf->SetFont('Helvetica', 'B', 14);
  $pdf->Cell(43, 10, 'No', 1, 0, 'C');
  $pdf->Cell(43, 10, 'First Name', 1, 0, 'C');
  $pdf->Cell(43, 10, 'Last Name', 1, 0, 'C');
  $pdf->Cell(43, 10, 'Country Name', 1, 1, 'C');

  //add table body
  $pdf->SetFont('Arial', '', 12);
  while ($rows = $query->fetch_assoc()) {

    $pdf->Cell(43, 10, $id++, 1, 0, 'C');
    $pdf->Cell(43, 10, $rows['first_name'], 1, 0, 'C');
    $pdf->Cell(43, 10, $rows['last_name'], 1, 0, 'C');
    $pdf->Cell(43, 10, $rows['country_name'], 1, 1, 'C');
  }

  $pdf->Output('I', 'hello.pdf');
}

//jalankan fungsi cetak pdf
reportData();