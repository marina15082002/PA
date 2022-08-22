<?php include __DIR__ . "\head.php";?>

<link rel="stylesheet" href="/PA/src/css/style.css">

<style type="text/css">
    #user-type-form-group>div input, #user-type-form-group>div label {
        cursor: pointer;
        margin-bottom: 0;
    }
    
    .form-group>svg {
        width: 1.2rem;
        vertical-align: text-top;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }

    #left-panel-container {
        overflow: hidden;
    }
    #left-panel {
        position: relative;
        right: 0;
        width: calc(100%*2);
        height: calc(100% - 2rem);
        margin: 1rem 0;
        display: flex;
        flex-direction: row;
        transition: all 0.5s ease-out;
    }
    #left-panel>div {
        width: calc(100%/2);
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #back-button {
        height: 2rem;
        margin-bottom: 3rem;
        display: flex;
        flex-direction: row;
        align-items: center;
        cursor: pointer;
    }
    #back-button>svg {
        height: 1.5rem;
        width: 1.5rem;
        margin-right: .5rem;
    }
</style>

<main>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('../PA/src/imgs/bg_1.jpg');"></div>
        <form method="POST" action="signup" enctype="multipart/form-data" id="left-panel-container" class="contents order-2 order-md-1">
            <div id="left-panel">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3><strong><?php echo $lang["TITLE_SIGNUP"] ?></strong></h3>
                        <p class="mb-4"><?php echo $lang["TEXT_LOGIN"] ?><a href="signup"><?php echo $lang["LINK_LOGIN"] ?></a></p>

                        <!-- User type -->
                        <div class="form-group" id="user-type-form-group">
                            <label><?php echo $lang["YOU_ARE"] ?></label>

                            <div>
                                <input type="radio" name="type" id="particular-type" value="particular" class="checkbox" checked/>
                                <label for="particular-type"><?php echo $lang["A_PARTICULAR"] ?></label>
                            </div>

                            <div>
                                <input type="radio" name="type" id="company-type" value="company" class="checkbox"/>
                                <label for="company-type"><?php echo $lang["A_COMPANY"] ?></label>
                            </div>

                            <div>
                                <input type="radio" name="type" id="association-type" value="association" class="checkbox"/>
                                <label for="association-type"><?php echo $lang["AN_ASSOCIATION"] ?></label>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="form-group">
                            <label><?php echo $lang["NAME"] ?></label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            <input type="text" placeholder="John Doe" name="name" size="35" class="form-control" required/>
                        </div>
                        <?php
                            if (isset($_GET["nameEmptyError"])) {
                                echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                            }
                        ?>

                        <!-- Email -->
                        <div class="form-group">
                            <label><?php echo $lang["EMAIL"] ?></label>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-envelope-fill image_svg" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                            </svg>
                            <input type="text" placeholder="email@email.com" name="email" size="35" class="form-control"/>
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

                        <!-- SIREN -->
                        <div class="form-group">
                            <label>SIREN</label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                            </svg>
                            <input type="text" placeholder="732 829 320" name="siren" class="form-control"/>
                        </div>
                        <?php
                            if (isset($_GET["sirenEmptyError"])) {
                                echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                            }
                            if (isset($_GET["sirenSyntaxError"])) {
                                echo ' <div class="alert alert-danger" role="alert">' . $lang["FIELD_SIREN_SYNTAX"] . '</div>';
                            }
                        ?>

                        <!-- Phone -->
                        <div class="form-group">
                            <label><?php echo $lang["PHONE"] ?></label>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill image_svg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            <input type="text" placeholder="01 23 45 67 89" name="phone" class="form-control"/>
                        </div>
                        <?php
                            if (isset($_GET["phoneEmptyError"])) {
                                echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                            }
                            if (isset($_GET["phoneSyntaxError"])) {
                                echo ' <div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY_SYNTAX"] . '</div>';
                            }
                        ?>

                        <!-- Next button -->
                        <input id="next-button" type="button" value="<?php echo $lang["NEXT"] ?>" class="btn btn-block btn-primary">
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <!-- Back button -->
                        <div class="form-group" id="back-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                            </svg>
                            <?php echo $lang["BACK"] ?>
                        </div>

                        <!-- Country -->
                        <div class="form-group">
                            <label><?php echo $lang["COUNTRY"] ?></label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <input type="text" placeholder="Arstotzka" name="country" class="form-control"/>
                        </div>
                        <?php
                            if (isset($_GET["countryEmptyError"])) {
                                echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                            }
                        ?>

                        <!-- City -->
                        <div class="form-group">
                            <label><?php echo $lang["CITY"] ?></label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <input type="text" placeholder="Paris" name="city" class="form-control"/>
                        </div>
                        <?php
                            if (isset($_GET["cityEmptyError"])) {
                                echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                            }
                        ?>

                        <!-- Address -->
                        <div class="form-group">
                            <label><?php echo $lang["ADDRESS"] ?></label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <input type="text" placeholder="10 Downing Street" name="address" class="form-control"/>
                        </div>
                        <?php
                            if (isset($_GET["addressEmptyError"])) {
                                echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                            }
                        ?>

                        <!-- Password -->
                        <div class="form-group">
                            <label><?php echo $lang["PASSWORD"] ?></label>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-lock-fill image_svg" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                            <input type="password" placeholder="mdp" name="password" class="form-control"/>
                        </div>
                        <?php
                            if (isset($_GET["passwordEmptyError"])) {
                                echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                            }
                            if (isset($_GET["passwordSyntaxError"])) {
                                echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_PASSWORD_SYNTAX"] . '</div>';
                            }
                        ?>

                        <!-- Password (confirmation) -->
                        <div class="form-group">
                            <label><?php echo $lang["PASSWORD_CONFIRMATION"] ?></label>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-lock image_svg" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                            </svg>
                            <input type="password" placeholder="mdp" name="password_confirmation" class="form-control"/>
                        </div>
                        <?php
                            if (isset($_GET["confirmPasswordEmptyError"])) {
                                echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_EMPTY"] . '</div>';
                            }
                            if (isset($_GET["confirmPasswordDifferentError"])) {
                                echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_CONFIRM_PASSWORD_SYNTAX"] . '</div>';
                            }
                        ?>

                        <!-- CGU -->
                        <div class="form-group">
                            <input type="checkbox" name="cgu" class="checkbox"/>
                            <label><?php echo $lang["FIELD_CGU"] ?> <a target="_blank" href="/PA/src/pdf/cgu.pdf"><u><?php echo $lang["FIELD_CGU_LINK"] ?></u></a></label>
                        </div>
                        <?php
                            if (isset($_GET["cguEmptyError"])) {
                                echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_CGU_EMPTY"] . '</div>';
                            }
                        ?>

                        <!-- Submit -->
                        <input type="submit" value="<?php echo $lang["SIGN_UP"] ?>" class="btn btn-block btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<script type="text/javascript">
    let next_button = document.getElementById("next-button");
    next_button.onclick = function() {
        let left_panel = document.getElementById("left-panel");
        left_panel.style.right = "100%";
    };

    let back_button = document.getElementById("back-button");
    back_button.onclick = function() {
        let left_panel = document.getElementById("left-panel");
        left_panel.style.right = "0%";
    };
</script>
