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

            $collect = $connect->prepare("SELECT * FROM COLLECT WHERE email = :email;");
            $collect->execute([
                'email' => $_GET['email']
            ]);
            $collect = $collect->fetchAll();

            $prep = $connect->prepare("INSERT INTO COLLECT_HISTORY (date, hours, email, phone, country, city, address) VALUES (:date, :hours, :email, :phone, :country, :city, :address);");
            $prep->execute([
                'date' => $collect[0]['date'],
                'hours' => $collect[0]['hours'],
                'email' => $collect[0]['email'],
                'phone' => $collect[0]['phone'],
                'country' => $collect[0]['country'],
                'city' => $collect[0]['city'],
                'address' => $collect[0]['address']
            ]);
            $prep->fetch();

            $prep = $connect->prepare("DELETE FROM COLLECT WHERE email = :email;");
            $prep->execute([
                'email' => $_GET['email']
            ]);
            $prep->fetch();

            $id = $connect->prepare("SELECT id FROM COLLECT_HISTORY WHERE email = :email;");
            $id->execute([
                'email' => $_GET['email']
            ]);
            $id = $id->fetchAll();

            $products = $connect->prepare("SELECT * FROM PRODUCT_COLLECT WHERE email = :email;");
            $products->execute([
                'email' => $_GET['email']
            ]);
            $products = $products->fetchAll();

            foreach ($products as $product) {
                $prep = $connect->prepare("INSERT INTO PRODUCT_COLLECT_HISTORY (id_collect, email, product_code, product_name, quantity) VALUES (:id_collect, :email, :product_code, :product_name, :quantity);");
                $prep->execute([
                    'id_collect' => $id[0]['id'],
                    'email' => $product['email'],
                    'product_code' => $product['product_code'],
                    'product_name' => $product['product_name'],
                    'quantity' => $product['quantity']
                ]);
                $prep->fetch();

                $prep = $connect->prepare("DELETE FROM PRODUCT_COLLECT WHERE email = :email;");
                $prep->execute([
                    'email' => $_GET['email']
                ]);
                $prep->fetch();
            }
        } else {

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

            $prep = $connect->prepare("INSERT INTO COLLECT (SELECT * FROM COLLECT_HISTORY WHERE email = :email);");
            $prep->execute([
                'email' => $_GET['email']
            ]);
            $prep->fetch();

            $prep = $connect->prepare("DELETE FROM COLLECT_HISTORY WHERE email = :email;");
            $prep->execute([
                'email' => $_GET['email']
            ]);
            $prep->fetch();

            $prep = $connect->prepare("INSERT INTO PRODUCT_COLLECT (SELECT * FROM PRODUCT_COLLECT_HISTORY WHERE email = :email);");
            $prep->execute([
                'email' => $_GET['email']
            ]);
            $prep->fetch();

            $prep = $connect->prepare("DELETE FROM PRODUCT_COLLECT_HISTORY WHERE email = :email;");
            $prep->execute([
                'email' => $_GET['email']
            ]);
            $prep->fetch();
        }
    } else {
        if ($status == 1) {
            $prep = $connect->prepare("UPDATE STOCKAGE SET quantity = quantity + :quantity WHERE product_code = :product_code;");
            $prep->execute([
                'quantity' => $product['quantity'],
                'product_code' => $product['product_code']
            ]);
            $prep->fetch();

            $collect = $connect->prepare("SELECT * FROM COLLECT WHERE email = :email;");
            $collect->execute([
                'email' => $_GET['email']
            ]);
            $collect = $collect->fetchAll();

            $prep = $connect->prepare("INSERT INTO COLLECT_HISTORY (date, hours, email, phone, country, city, address) VALUES (:date, :hours, :email, :phone, :country, :city, :address);");
            $prep->execute([
                'date' => $collect[0]['date'],
                'hours' => $collect[0]['hours'],
                'email' => $collect[0]['email'],
                'phone' => $collect[0]['phone'],
                'country' => $collect[0]['country'],
                'city' => $collect[0]['city'],
                'address' => $collect[0]['address']
            ]);
            $prep->fetch();

            $prep = $connect->prepare("DELETE FROM COLLECT WHERE email = :email;");
            $prep->execute([
                'email' => $_GET['email']
            ]);
            $prep->fetch();

            $id = $connect->prepare("SELECT id FROM COLLECT_HISTORY WHERE email = :email;");
            $id->execute([
                'email' => $_GET['email']
            ]);
            $id = $id->fetchAll();

            $products = $connect->prepare("SELECT * FROM PRODUCT_COLLECT WHERE email = :email;");
            $products->execute([
                'email' => $_GET['email']
            ]);
            $products = $products->fetchAll();

            foreach ($products as $product) {
                $prep = $connect->prepare("INSERT INTO PRODUCT_COLLECT_HISTORY (id_collect, email, product_code, product_name, quantity) VALUES (:id_collect, :email, :product_code, :product_name, :quantity);");
                $prep->execute([
                    'id_collect' => $id[0]['id'],
                    'email' => $product['email'],
                    'product_code' => $product['product_code'],
                    'product_name' => $product['product_name'],
                    'quantity' => $product['quantity']
                ]);
                $prep->fetch();

                $prep = $connect->prepare("DELETE FROM PRODUCT_COLLECT WHERE email = :email;");
                $prep->execute([
                    'email' => $_GET['email']
                ]);
                $prep->fetch();
            }
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

            $prep = $connect->prepare("INSERT INTO COLLECT (SELECT * FROM COLLECT_HISTORY WHERE email = :email);");
            $prep->execute([
                'email' => $_GET['email']
            ]);
            $prep->fetch();

            $prep = $connect->prepare("DELETE FROM COLLECT_HISTORY WHERE email = :email;");
            $prep->execute([
                'email' => $_GET['email']
            ]);
            $prep->fetch();

            $prep = $connect->prepare("INSERT INTO PRODUCT_COLLECT (SELECT * FROM PRODUCT_COLLECT_HISTORY WHERE email = :email);");
            $prep->execute([
                'email' => $_GET['email']
            ]);
            $prep->fetch();

            $prep = $connect->prepare("DELETE FROM PRODUCT_COLLECT_HISTORY WHERE email = :email;");
            $prep->execute([
                'email' => $_GET['email']
            ]);
            $prep->fetch();
        }
    }
}
