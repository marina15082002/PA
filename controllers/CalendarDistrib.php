<?php

namespace PA;

include __DIR__ . "\..\models\ProductModel.php";

$productModel = new Models\ProductModel();

$tableDistrib = $productModel->getAllDistrib();
$tableProducts = $productModel->getAllProductsDistrib();

$data = [
    "tableDistrib" => $tableDistrib,
    "tableProducts" => $tableProducts,
];

echo json_encode($data);