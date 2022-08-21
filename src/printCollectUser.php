<?php include __DIR__ . "\header.php";?>

<main>
    <?php
    foreach ($table_products as $value) {
        echo "
            <label>" . $lang["FIELD_BARCODE"] . " : " . htmlspecialchars($value["product_code"], ENT_QUOTES, 'UTF-8') . "</label>
            <label>" . $lang["FIELD_NAME"] . " : " . htmlspecialchars($value["product_name"], ENT_QUOTES, 'UTF-8') . "</label>
            <label>" . $lang["FIELD_QUANTITY"] . " : " . htmlspecialchars($value["quantity"], ENT_QUOTES, 'UTF-8') . "</label>
            <br/>
        ";
    }

    foreach ($table_infos as $value) {
        echo "
            <br>
            <label>" . $lang["LABEL_DATE"] . " : " . htmlspecialchars($value["date"], ENT_QUOTES, 'UTF-8') . "</label><br/>
            <label>" . $lang["LABEL_HOUR"] . " : " . htmlspecialchars($value["hours"], ENT_QUOTES, 'UTF-8') . "</label><br/>
            <label>" . $lang["FIELD_EMAIL"] . " : " . htmlspecialchars($value["email"], ENT_QUOTES, 'UTF-8') . "</label><br/>
            <label>" . $lang["FIELD_PHONE"] . " : " . htmlspecialchars($value["phone"], ENT_QUOTES, 'UTF-8') . "</label><br/>
            <label>" . $lang["FIELD_COUNTRY"] . " : " . htmlspecialchars($value["country"], ENT_QUOTES, 'UTF-8') . "</label><br/>
            <label>" . $lang["FIELD_CITY"] . " : " . htmlspecialchars($value["city"], ENT_QUOTES, 'UTF-8') . "</label><br/>
            <label>" . $lang["FIELD_ADDRESS"] . " : " . htmlspecialchars($value["address"], ENT_QUOTES, 'UTF-8') . "</label><br/>
        ";
    }
    ?>

    <form class="formulaire" method="POST" action="printCollectUser" enctype="multipart/form-data">
        <input type="submit" value="<?php echo $lang['BTN_CANCEL']; ?>" class="button">
    </form>
</main>