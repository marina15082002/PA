<?php include __DIR__ . "\header.php";?>

<h1>Stock</h1>

<?php
    foreach ($table as $value) {
        echo "
        <div id='product" . $i . "'>
            <label>" . $lang['FIELD_NAME'] . "</label>
            <input type='text' value='" . $value["product_name"] . "' id='name" . $i . "' name='name" . $i . "' size='35'/>
        
            <label>" . $lang["FIELD_BARCODE"] . "</label>
            <input type='text' value='" . $value["product_code"] . "' id='barcode" . $i . "' name='barcode" . $i . "' size='35'/>
        
            <label>" . $lang["FIELD_QUANTITY"] . "</label>
            <input type='number' value='" . $value["quantity"] . "' id='quantity" . $i . "' name='quantity" . $i . "' min='1'/>
        
            <button onclick='deleteProduct(" . $i . ")'>-</button>
        
            <div style='position:absolute; visibility: collapse' id='fieldEmptyError" . $i . "' class='alert alert-danger' role='alert'>" . $lang["FIELDS_EMPTY"] . "</div>
            <div style='position:absolute; visibility: collapse' id='barcodeSyntaxError" . $i . "' class='alert alert-danger' role='alert'>" . $lang['FIELD_BARCODE_SYNTAX'] . "</div>
            <div style='position:absolute; visibility: collapse' id='quantitySyntaxError" . $i . "' class='alert alert-danger' role='alert'>" . $lang['FIELD_QUANTITY_SYNTAX'] . "</div>
        </div>";
        $i += 1;
    }
    ?>
