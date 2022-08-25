<?php

namespace PA;

include __DIR__ . "\..\library\get-database-connection.php";

$connect = getDatabaseConnection();

$status = 0;
if ($_GET['status'] == "true") {
    $status = 1;
}

$prep = $connect->prepare("UPDATE distrib SET status = :status WHERE id = :id;");
$prep->execute([
    'status' => $status,
    'id' => $_GET['id']
]);

$prep->fetch();

$prep = $connect->prepare("SELECT * FROM PRODUCT_DISTRIB WHERE id_distrib = :id_distrib;");
$prep->execute([
    'id_distrib' => $_GET['id']
]);
$product_distrib = $prep->fetchAll();

if ($status == 1) {
    include __DIR__ . '\..\library\fpdf184\fpdf.php';

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,'Hello World!');

    $filename= "/PA/src/recap/test.pdf";
    //$pdf->Output('F', $filename);
    //$pdf->Output('D', $filename, true);
    //$pdf->Output('/PA/filename.pdf', 'F');
    $pdf->Output();
}
