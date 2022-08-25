<?php

namespace PA;

include __DIR__ . "\..\library\get-database-connection.php";

$connect = getDatabaseConnection();

$status = 0;
if ($_GET['status'] == "true") {
    $status = 1;
}
echo $_GET['email'];

$prep = $connect->prepare("UPDATE collect SET status = :status WHERE email = :email;");
$prep->execute([
    'status' => $status,
    'email' => $_GET['email']
]);

$prep->fetch();

$prep = $connect->prepare("SELECT * FROM PRODUCT_COLLECT WHERE email = :email;");
$prep->execute([
    'email' => $_GET['email']
]);
$product_collect = $prep->fetchAll();

foreach ($product_collect as $product) {

    $prep = $connect->prepare("SELECT quantity FROM STOCKAGE WHERE product_code = :product;");
    $prep->execute([
        'product' => $product['product_code']
    ]);
    $stockage = $prep->fetchAll();

    if (count($stockage) == 0) {
        if ($status == 1) {
            echo $product['quantity'];
            $prep = $connect->prepare("INSERT INTO STOCKAGE (product_code, quantity) VALUES (:product_code, :quantity);");
            $prep->execute([
                'product_code' => $product['product_code'],
                'quantity' => $product['quantity']
            ]);
            var_dump($prep->errorInfo());
            $prep->fetch();
        }
    } else {
        if ($status == 1) {
            echo $product['quantity'];
            $prep = $connect->prepare("UPDATE STOCKAGE SET quantity = quantity + :quantity WHERE product_code = :product_code;");
            $prep->execute([
                'quantity' => $product['quantity'],
                'product_code' => $product['product_code']
            ]);
            $prep->fetch();
        } else {
            echo $product['quantity'];
            $prep = $connect->prepare("UPDATE STOCKAGE SET quantity = quantity - :quantity WHERE product_code = :product_code;");
            $prep->execute([
                'quantity' => $product['quantity'],
                'product_code' => $product['product_code']
            ]);
            $prep->fetch();

            $prep = $connect->prepare("SELECT quantity FROM STOCKAGE WHERE product_code = :product_code;");
            $prep->execute([
                'product_code' => $product['product_code']
            ]);
            $quantity = $prep->fetchAll();

            if ($quantity[0]['quantity'] == 0) {
                $prep = $connect->prepare("DELETE FROM STOCKAGE WHERE product_code = :product_code;");
                $prep->execute([
                    'product_code' => $product['product_code']
                ]);
                $prep->fetch();
            }
        }
    }
}
