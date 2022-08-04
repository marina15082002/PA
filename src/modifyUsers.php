<?php include __DIR__ . "\header.php";?>

<main>
    <?php
        foreach ($table as $value) {
            if ($value['role'] == "user") {
                echo "
                <form class='formulaire' method='POST' action='modifyUsers' enctype='multipart/form-data'>
                    <input type='hidden' value='" . $value['id'] . "' name='id' size='35'/>
                    <label>" . $lang["FIELD_TYPE"] . "</label>
                    <select name='type'><option name='type' value=" . $lang['FIELD_COMPANY'];
                        if (strtoupper($value['type']) == strtoupper($lang['FIELD_COMPANY'])){echo " selected";};
                        echo ">" . $lang['FIELD_COMPANY'] . "</option>
                        <option name='type' value=" . $lang['FIELD_ASSOCIATION'];
                        if (strtoupper($value['type']) == strtoupper($lang['FIELD_ASSOCIATION'])){echo " selected";};
                        echo ">" . $lang['FIELD_ASSOCIATION'] . "</option>
                        <option name='type' value=" . $lang['FIELD_PARTICULAR'];
                        if (strtoupper($value['type']) == strtoupper($lang['FIELD_PARTICULAR'])){echo " selected";};
                        echo ">" . $lang['FIELD_PARTICULAR'] . "</option>    
                    </select>
                    <label>" . $lang["FIELD_NAME"] . "</label>
                    <input type='text' value='" . $value['name'] . "' name='name' size='35'/>
                    <label>" . $lang["FIELD_EMAIL"] . "</label>
                    <input type='text' value='" . $value['email'] . "' name='email' size='35'/>
                    <label>" . $lang["FIELD_SIREN"] . "</label>
                    <input type='text' value='" . $value['siren'] . "' name='siren' size='35'/>
                    <label>" . $lang["FIELD_PHONE"] . "</label>
                    <input type='text' value='" . $value['phone'] . "' name='phone' size='35'/>
                    <label>" . $lang["FIELD_COUNTRY"] . "</label>
                    <input type='text' value='" . $value['country'] . "' name='country' size='35'/>
                    <label>" . $lang["FIELD_CITY"] . "</label>
                    <input type='text' value='" . $value['city'] . "' name='city' size='35'/>
                    <label>" . $lang["FIELD_ADDRESS"] . "</label>
                    <input type='text' value='" . $value['address'] . "' name='address' size='35'/>
                    <input type='submit' value=" . $lang["BTN_MODIFY"] . " class='button'>
                    ";
                    if (isset($_GET["fieldEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELDS_EMPTY"] . '</div>';
                    } else if (isset($_GET["phoneSyntaxError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_PHONE_SYNTAX"] . '</div>';
                    }
                echo "</form>
                
                <form class='formulaire' method='POST' action='deleteUsers' enctype='multipart/form-data'>
                    <input type='hidden' value='" . $value['id'] . "' name='id' size='35'/>
                    <input type='submit' value=" . $lang["BTN_DELETE"] . " class='button'>
                </form>
                <br/>
                ";
            }
        }
    ?>
</main>