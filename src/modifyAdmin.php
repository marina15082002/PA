<?php include __DIR__ . "\header.php";?>

<main>
    <?php
        foreach ($table as $value) {
            echo "
            <form class='formulaire' method='POST' action='modifyUsers' enctype='multipart/form-data'>
                <input type='hidden' value='" . $value['id'] . "' name='id' size='35'/>
                <label>" . $lang["FIELD_NAME"] . "</label>
                <input type='text' value='" . $value['name'] . "' name='name' size='35'/>
                <label>" . $lang["FIELD_EMAIL"] . "</label>
                <input type='text' value='" . $value['email'] . "' name='email' size='35'/>
                <label>" . $lang["FIELD_PHONE"] . "</label>
                <input type='text' value='" . $value['phone'] . "' name='phone' size='35'/>
                <label>" . $lang["FIELD_POSTE"] . "</label>
                <input type='text' value='" . $value['poste'] . "' name='poste' size='35'/>
                <input type='submit' value=" . $lang["BTN_MODIFY"] . " class='button'>
                ";
                if (isset($_GET["fieldEmptyError"])) {
                    echo '<div class="alert alert-danger" role="alert">' . $lang["FIELDS_EMPTY"] . '</div>';
                } else if (isset($_GET["phoneSyntaxError"])) {
                    echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_PHONE_SYNTAX"] . '</div>';
                }
            echo "</form>
            
            <form class='formulaire' method='POST' action='deleteAdmin' enctype='multipart/form-data'>
                <input type='hidden' value='" . $value['id'] . "' name='id' size='35'/>
                <input type='submit' value=" . $lang["BTN_DELETE"] . " class='button'>
            </form>
            <br/>
            ";
        }
    ?>
    <form class='formulaire' method='POST' action='createAdmin' enctype='multipart/form-data'>
        <input type='hidden' value='' name='id' size='35'/>
        <label><?php echo $lang["FIELD_NAME"]; ?></label>
        <input type='text' value='' name='name' size='35'/>
        <label><?php echo $lang["FIELD_EMAIL"]; ?></label>
        <input type='text' value='' name='email' size='35'/>
        <label><?php echo $lang["FIELD_PHONE"] ; ?></label>
        <input type='text' value='' name='phone' size='35'/>
        <label><?php echo $lang["FIELD_POSTE"] ; ?></label>
        <input type='text' value='' name='poste' size='35'/>
        <label><?php echo $lang["FIELD_PASSWORD"] ; ?></label>
        <input type='password' value=''  name='password'/>
        <input type='submit' value='<?php echo $lang["BTN_ADD"] ; ?>' class='button'>
        <?php
            if (isset($_GET["fieldEmptyError"])) {
            echo '<div class="alert alert-danger" role="alert">' . $lang["FIELDS_EMPTY"] . '</div>';
            } else if (isset($_GET["phoneSyntaxError"])) {
            echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_PHONE_SYNTAX"] . '</div>';
            }
            ?>
    </form>


</main>