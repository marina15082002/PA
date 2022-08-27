<?php include __DIR__ . "\header.php";?>

<link rel="stylesheet" href="/PA/src/css/style.css">

<main>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('/PA/src/imgs/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3><strong><?php echo $lang["TITLE_LOGIN"]; ?></strong></h3>
                        <p class="mb-4"><?php echo $lang["TEXT_SIGNUP"]; ?><a href="signup"><?php echo $lang["LINK_SIGNUP"]; ?></a></p>
                        <form method="POST" action="login" enctype="multipart/form-data">
                            <div class="form-group first">
                                <label for="username"><?php echo $lang["EMAIL"]; ?></label>
                                <input type="text" name="email" class="form-control" placeholder="<?php echo $lang["TEXT_EMAIL"]; ?>" id="username">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password"><?php echo $lang["PASSWORD"]; ?></label>
                                <input name="password" type="password" class="form-control" placeholder="<?php echo $lang["TEXT_PASSWORD"]; ?>" id="password">
                            </div>

                            <?php
                            if (isset($_GET["passwordEmailError"])) {
                                echo '<div class="alert alert-danger" role="alert">' . $lang["FIELD_LOGIN_ERROR"] . '</div>';
                            }
                            ?>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption"><?php echo $lang["LINK_REMEMBER"]; ?></span>
                                    <input type="checkbox" checked="checked"/>
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="#" class="forgot-pass"><?php echo $lang["LINK_PASSWORD_FORGOT"]; ?></a></span>
                            </div>

                            <input type="submit" value="<?php echo $lang["TITLE_LOGIN"]; ?>" class="btn btn-block btn-primary">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>