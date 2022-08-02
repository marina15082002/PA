<?php include __DIR__ . "\header.php";?>

<div class="main_registration">
    <h1 class="registration"><?php echo $lang["TITLE_SIGNUP"] ?></h1>
    <form class="formulaire" method="POST" action="signup" enctype="multipart/form-data">
        <div class="registration">
            <div>
                <div class="terms_and_conditions">
                    <input type="checkbox" name="company" value="company" class="checkbox"/>
                    <label><?php echo $lang["FIELD_COMPANY"] ?></label>
                </div>

                <div class="terms_and_conditions">
                    <input type="checkbox" name="association" value="association" class="checkbox"/>
                    <label><?php echo $lang["FIELD_ASSOCIATION"] ?></label>
                </div>

                <div class="terms_and_conditions">
                    <input type="checkbox" name="particular" value="particular" class="checkbox"/>
                    <label><?php echo $lang["FIELD_PARTICULAR"] ?></label>
                </div>

                <?php
                    if (isset($_GET["typeEmptyError"])) {
                    echo '<div class="alert alert-danger" role="alert">' . $lang["TYPE_EMPTY"] . '</div>';
                    }
                    ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-envelope-fill image_svg" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                    </svg>
                    <input type="text" placeholder="<?php echo $lang["FIELD_NAME"] ?>" name="name" size="35" class="form-control"/>
                </div>

                <?php
                if (isset($_GET["nameEmptyError"])) {
                    echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                }
                ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-envelope-fill image_svg" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                    </svg>
                    <input type="text" placeholder="<?php echo $lang["FIELD_EMAIL"] ?>" name="email" size="35" class="form-control"/>
                </div>

                <?php
                    if (isset($_GET["emailEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                    }

                    if (isset($_GET["emailNoUnique"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMAIL_UNIQUE"] . '</div>';
                    }

                    if (isset($_GET["emailSyntaxError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMAIL_SYNTAX"] . '</div>';
                    }
                    ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill image_svg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    <input type="text" placeholder="<?php echo $lang["FIELD_SIREN"] ?>" name="siren" class="form-control"/>
                </div>

                <?php
                    if (isset($_GET["sirenEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                    }

                    if (isset($_GET["sirenSyntaxError"])) {
                        echo ' <div class="alert alert-danger" role="alert">' . $lang["FIELD_SIREN_SYNTAX"] . '</div>';
                    }
                ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill image_svg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    <input type="text" placeholder="<?php echo $lang["FIELD_PHONE"] ?>" name="phone" class="form-control"/>
                </div>

                  <?php
                    if (isset($_GET["phoneEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                    }

                    if (isset($_GET["phoneSyntaxError"])) {
                        echo ' <div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY_SYNTAX"] . '</div>';
                    }
                    ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill image_svg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    <input type="text" placeholder="<?php echo $lang["FIELD_COUNTRY"] ?>" name="country" class="form-control"/>
                </div>

                <?php
                    if (isset($_GET["countryEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                    }
                ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill image_svg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    <input type="text" placeholder="<?php echo $lang["FIELD_CITY"] ?>" name="city" class="form-control"/>
                </div>

                <?php
                    if (isset($_GET["cityEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                    }
                ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill image_svg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    <input type="text" placeholder="<?php echo $lang["FIELD_ADDRESS"] ?>" name="address" class="form-control"/>
                </div>

                <?php
                    if (isset($_GET["addressEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                    }
                ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-lock-fill image_svg" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                    </svg>
                    <input type="password" placeholder="<?php echo $lang["FIELD_PASSWORD"] ?>"  name="password" class="form-control"/>
                </div>

                <?php
                    if (isset($_GET["passwordEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                    }

                    if (isset($_GET["passwordSyntaxError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_PASSWORD_SYNTAX"] . '</div>';
                    }
                ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-lock image_svg" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                    </svg>
                    <input type="password" placeholder="<?php echo $lang["FIELD_CONFIRM_PASSWORD"] ?>" name="password_confirmation" class="form-control"/>
                </div>

                <?php
                    if (isset($_GET["confirmPasswordEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                    }

                    if (isset($_GET["confirmPasswordDifferentError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_CONFIRM_PASSWORD_SYNTAX"] . '</div>';
                    }
                ?>

                <div class="terms_and_conditions">
                    <input type="checkbox" name="cgu" class="checkbox"/>
                    <label><?php echo $lang["FIELD_CGU"] ?> <a target="_blank" href="/PA/src/pdf/cgu.pdf"><u><?php echo $lang["FIELD_CGU_LINK"] ?></u></a></label>
                </div>

                <?php
                    if (isset($_GET["cguEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_CGU_EMPTY"] . '</div>';
                    }
                ?>
            </div>

            <div class="image_hidden">
                <img src="/img/registration.jpg" class="image_registration"/>
            </div>

        </div>

        <div class="space_between">
            <input type="submit" value="<?php echo $lang["BTN_CONFIRM"] ?>" class="button">

            <a href="signin"><label class="link_connection"><u><?php echo $lang["LINK_CONNECTION"] ?></u></label></a>
        </div>
    </form>
</div>