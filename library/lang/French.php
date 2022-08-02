<?php

namespace PA\Lang;

class Fr
{
    public function getArray()
    {
        $lang = array(
            /* ==== FORM ==== */
            "FIELD_EMPTY" => "Champ obligatoire",
            "BTN_CONFIRM" => "Confirmer",
            /* ==== SIGNUP ==== */
            "TITLE_SIGNUP" => "Inscription",
            "FIELD_COMPANY" => "Entreprise",
            "FIELD_ASSOCIATION" => "Association",
            "FIELD_PARTICULAR" => "Particulier",
            "TYPE_EMPTY" => "Champ obligatoire, veuillez sélectionner une cas",
            "FIELD_NAME" => "Nom",
            "FIELD_EMAIL" => "Adresse mail",
            "FIELD_EMAIL_UNIQUE" => "L'adresse mail est déjà utilisé",
            "FIELD_EMAIL_SYNTAX" => "L'adresse mail est invalide",
            "FIELD_SIREN" => "Numéro de siren",
            "FIELD_SIREN_SYNTAX" => "Mauvais format : Le numéro siren est l'identification de l'entreprise et est composé de 9 chiffres",
            "FIELD_PHONE" => "Numéro de téléphone",
            "FIELD_PHONE_SYNTAX" => "Mauvais format : 0712345678 ou +33712345678",
            "FIELD_COUNTRY" => "Pays",
            "FIELD_CITY" => "Ville",
            "FIELD_ADDRESS" => "Adresse",
            "FIELD_PASSWORD" => "Mot de passe",
            "FIELD_PASSWORD_SYNTAX" => "Le mot de passe doit contenir au moins une majuscule, une miniuscule, un chiffre, un caratère spécial et faire entre 8 et 15 caractères",
            "FIELD_CONFIRM_PASSWORD" => "Confirmation du mot de passe",
            "FIELD_CONFIRM_PASSWORD_SYNTAX" => "Le mot de passe est différent",
            "FIELD_CGU" => "J'accepte les",
            "FIELD_CGU_LINK" => "conditions générales",
            "FIELD_CGU_EMPTY" => "Il faut accepter les conditions générales",
            "LINK_CONNECTION" => "Je suis déjà membre",
            /* ==== ERROR ==== */
            "LABEL_ERROR" => "Une erreur est survenue !",
            "LINK_ERROR" => "Revenir à la page d'accueil"
        );
        return $lang;
    }
}