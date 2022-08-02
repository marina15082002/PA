<?php include __DIR__ . "\header.php";?>

<div class="main_registration">
    <h1 class="registration">Inscription</h1>
    <form class="formulaire" method="POST" action="signup" enctype="multipart/form-data">
        <div class="registration">
            <div>
                <div class="terms_and_conditions">
                    <input type="checkbox" name="company" value="company" class="checkbox"/>
                    <label>Entrerpise</label>
                </div>

                <div class="terms_and_conditions">
                    <input type="checkbox" name="association" value="association" class="checkbox"/>
                    <label>Association</label>
                </div>

                <div class="terms_and_conditions">
                    <input type="checkbox" name="particular" value="particular" class="checkbox"/>
                    <label>Particulier</label>
                </div>

                <?php
                    if (isset($_GET["typeEmptyError"])) {
                    echo '<div class="alert alert-danger" role="alert">Champ obligatoire, veuillez sélectionner une case</div>';
                    }
                    ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-envelope-fill image_svg" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                    </svg>
                    <input type="text" placeholder="Nom" name="name" size="35" class="form-control"/>
                    <button type="button" width="15" height="15" data-toggle="tooltip" data-placement="bottom" title="Champ obligatoire." style="border:none;background-color:white; margin-bottom:45px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                    </button>
                </div>

                <?php
                if (isset($_GET["nameEmptyError"])) {
                    echo '<div class="alert alert-danger" role="alert">Champ obligatoire</div>';
                }
                ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-envelope-fill image_svg" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                    </svg>
                    <input type="text" placeholder="Adresse mail" name="email" size="35" class="form-control"/>
                    <button type="button" width="15" height="15" data-toggle="tooltip" data-placement="bottom" title="Champ obligatoire." style="border:none;background-color:white; margin-bottom:45px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                    </button>
                </div>

                <?php
                    if (isset($_GET["emailEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">Champ obligatoire</div>';
                    }

                    if (isset($_GET["emailNoUnique"])) {
                        echo '<div class="alert alert-danger" role="alert">L\'adresse mail est déjà utilisé</div>';
                    }

                    if (isset($_GET["emailSyntaxError"])) {
                        echo '<div class="alert alert-danger" role="alert">L\'adresse mail est invalide</div>';
                    }
                    ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill image_svg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    <input type="text" placeholder="Numéro de siren" name="siren" class="form-control"/>
                    <button type="button" width="15" height="15" data-toggle="tooltip" data-placement="bottom" title="Le numéro de téléphone est nécessaire pour tout paiement." style="border:none;background-color:white; margin-bottom:45px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="auto" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                        </svg>
                    </button>
                </div>

                <?php
                    if (isset($_GET["sirenEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">Champ obligatoire</div>';
                    }

                    if (isset($_GET["sirenSyntaxError"])) {
                        echo ' <div class="alert alert-danger" role="alert">Mauvais format : Le numéro siren est l\'identification de l\'entreprise et est composé de 9 chiffres</div>';
                    }
                ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill image_svg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    <input type="text" placeholder="Numéro de téléphone" name="phone" class="form-control"/>
                    <button type="button" width="15" height="15" data-toggle="tooltip" data-placement="bottom" title="Le numéro de téléphone est nécessaire pour tout paiement." style="border:none;background-color:white; margin-bottom:45px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="auto" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                        </svg>
                    </button>
                </div>

                  <?php
                    if (isset($_GET["phoneEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">Champ obligatoire</div>';
                    }

                    if (isset($_GET["phoneSyntaxError"])) {
                        echo ' <div class="alert alert-danger" role="alert">Mauvais format : 0712345678 ou +33712345678</div>';
                    }
                    ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill image_svg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    <input type="text" placeholder="Pays" name="country" class="form-control"/>
                    <button type="button" width="15" height="15" data-toggle="tooltip" data-placement="bottom" title="Le numéro de téléphone est nécessaire pour tout paiement." style="border:none;background-color:white; margin-bottom:45px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="auto" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                        </svg>
                    </button>
                </div>

                <?php
                    if (isset($_GET["countryEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">Champ obligatoire</div>';
                    }
                ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill image_svg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    <input type="text" placeholder="Ville" name="city" class="form-control"/>
                    <button type="button" width="15" height="15" data-toggle="tooltip" data-placement="bottom" title="Le numéro de téléphone est nécessaire pour tout paiement." style="border:none;background-color:white; margin-bottom:45px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="auto" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                        </svg>
                    </button>
                </div>

                <?php
                    if (isset($_GET["cityEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">Champ obligatoire</div>';
                    }
                ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone-fill image_svg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    <input type="text" placeholder="Adresse" name="address" class="form-control"/>
                    <button type="button" width="15" height="15" data-toggle="tooltip" data-placement="bottom" title="Le numéro de téléphone est nécessaire pour tout paiement." style="border:none;background-color:white; margin-bottom:45px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="auto" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                        </svg>
                    </button>
                </div>

                <?php
                    if (isset($_GET["addressEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">Champ obligatoire</div>';
                    }
                ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-lock-fill image_svg" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                    </svg>
                    <input type="password" placeholder="Mot de passe" name="password" class="form-control"/>
                    <button type="button" width="15" height="15" data-toggle="tooltip" data-placement="bottom" title="Champ obligatoire." style="border:none;background-color:white; margin-bottom:45px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                    </button>
                    <button type="button" width="15" height="15" data-toggle="tooltip" data-placement="bottom" title="Le mot de passe doit être compris entre 8 et 15 caractères, contenir au moins une minuscule, une majuscule, un caractère spécial et un chiffre." style="border:none;background-color:white; margin-bottom:45px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="auto" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                        </svg>
                    </button>
                </div>

                <?php
                    if (isset($_GET["passwordEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">Champ obligatoire</div>';
                    }

                    if (isset($_GET["passwordSyntaxError"])) {
                        echo '<div class="alert alert-danger" role="alert">Le mot de passe doit contenir au moins une majuscule, une miniuscule, un chiffre, un caratère spécial et faire entre 8 et 15 caractères</div>';
                    }
                ?>

                <div class="form_design">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-lock image_svg" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                    </svg>
                    <input type="password" placeholder="Confirmation du mot de passe" name="password_confirmation" class="form-control"/>
                    <button type="button" width="15" height="15" data-toggle="tooltip" data-placement="bottom" title="Champ obligatoire." style="border:none;background-color:white; margin-bottom:45px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                    </button>
                </div>

                <?php
                    if (isset($_GET["confirmPasswordEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">Champ obligatoire</div>';
                    }

                    if (isset($_GET["confirmPasswordDifferentError"])) {
                        echo '<div class="alert alert-danger" role="alert">Le mot de passe est différent</div>';
                    }
                ?>

                <div class="terms_and_conditions">
                    <input type="checkbox" name="cgu" class="checkbox"/>
                    <label>J'accepte les <a target="_blank" href="/PA/src/pdf/cgu.pdf"><u>conditions générales</u></a></label>
                </div>

                <?php
                    if (isset($_GET["cguEmptyError"])) {
                        echo '<div class="alert alert-danger" role="alert">Il faut accepter les conditions générales</div>';
                    }
                ?>
            </div>

            <div class="image_hidden">
                <img src="/img/registration.jpg" class="image_registration"/>
            </div>

        </div>

        <div class="space_between">
            <input type="submit" value="Confirmer" class="button">

            <a href="signin"><label class="link_connection"><u>Je suis déjà membre</u></label></a>
        </div>
    </form>
</div>