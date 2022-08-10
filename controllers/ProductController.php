<?php

$body = $_POST;

$i = 1;

while($body['name' . $i]) {
    if (!isset($body['name' . $i]) || empty($body['name' . $i])  || $body['name' . $i] === false  || !isset($body['barcode' . $i]) || empty($body['barcode' . $i]) || $body['barcode' . $i] === false || !isset($body['quantity' . $i]) || empty($body['quantity' . $i]) || $body['quantity' . $i] === false) {
        echo "fieldEmptyError" . $i;
        $error = true;
        break;
    } else if (!preg_match("/^[0-9]{13}$/", $body['barcode' . $i])) {
        echo "barcodeSyntaxError" . $i;
        $error = true;
        break;
    } else {
        $error = false;
    }

    $i += 1;
}

if ($error === false) {
    echo "success";
}

?>