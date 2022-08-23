<?php

namespace PA;

include __DIR__ . "\..\models\ProductModel.php";

$productModel = new Models\ProductModel();
$table = $productModel->getStock();

$data = [
    "stock" => $table,
];

echo json_encode($data);



