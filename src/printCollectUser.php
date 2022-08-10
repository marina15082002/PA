<?php include __DIR__ . "\header.php";?>

<main>
    <?php
    foreach ($table_products as $value) {
        echo "
            <label>Code barre : " . $value["product_code"] . "</label>
            <label>Nom : " . $value["product_name"] . "</label>
            <label>Quantité : " . $value["quantity"] . "</label>
            <br/>
        ";
    }

    foreach ($table_infos as $value) {
        echo "
            <br>
            <label>Date : " . $value["date"] . "</label><br/>
            <label>Heure : " . $value["hours"] . "</label><br/>
            <label>Email : " . $value["email"] . "</label><br/>
            <label>Téléphone : " . $value["phone"] . "</label><br/>
            <label>Pays : " . $value["country"] . "</label><br/>
            <label>Ville : " . $value["city"] . "</label><br/>
            <label>Adresse : " . $value["address"] . "</label><br/>
        ";
    }
    ?>

    <form class="formulaire" method="POST" action="printCollectUser" enctype="multipart/form-data">
        <input type="submit" value="Annuler" class="button">
    </form>
</main>