<?php include __DIR__ . "\header.php";?>

<main>
    <?php
    foreach ($table_products as $value) {
        echo "
            <label>" . $lang["FIELD_BARCODE"] . " : " . $value["product_code"] . "</label>
            <label>" . $lang["FIELD_NAME"] . " : " . $value["product_name"] . "</label>
            <label>" . $lang["FIELD_QUANTITY"] . " : " . $value["quantity"] . "</label>
            <br/>
        ";
    }

    foreach ($table_infos as $value) {
        echo "
            <br>
            <label>" . $lang["LABEL_DATE"] . " : " . $value["date"] . "</label><br/>
            <label>" . $lang["LABEL_HOUR"] . " : " . $value["hours"] . "</label><br/>
            <label>" . $lang["FIELD_EMAIL"] . " : " . $value["email"] . "</label><br/>
            <label>" . $lang["FIELD_PHONE"] . " : " . $value["phone"] . "</label><br/>
            <label>" . $lang["FIELD_COUNTRY"] . " : " . $value["country"] . "</label><br/>
            <label>" . $lang["FIELD_CITY"] . " : " . $value["city"] . "</label><br/>
            <label>" . $lang["FIELD_ADDRESS"] . " : " . $value["address"] . "</label><br/>
        ";
    }
    ?>

    <form class="formulaire" method="POST" action="printCollectUser" enctype="multipart/form-data">
        <input type="submit" value="<?php echo $lang['BTN_CANCEL']; ?>" class="button">
    </form>
</main>