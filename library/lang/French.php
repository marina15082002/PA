<?php

namespace PA\Lang;

class Fr
{
    public function getArray()
    {
        $lang = array(
            "FIELD_EMPTY" => "Champ obligatoire",
            "FIELD_NAME" => "Nom",
            "FIELDS_EMPTY" => "Tous les champs sont obligatoires",
            "BTN_CONFIRM" => "Confirmer",
            "BTN_MODIFY" => "Modifier",
            "BTN_DELETE" => "Supprimer",
            "TITLE_SIGNUP" => "Inscription",
            "TITLE_INDEX" => "Accueil",
            "TITLE_MODIFY_USERS" => "Modification utilisateurs",
            "TITLE_ERROR" => "Erreur",
            "TITLE_LOGIN" => "Connexion",
            "YOU_ARE" => "Vous êtes",
            "A_COMPANY" => "Une entreprise",
            "AN_ASSOCIATION" => "Une association",
            "A_PARTICULAR" => "Un particulier",
            "TYPE_EMPTY" => "Champ obligatoire, veuillez sélectionner une cas",
            "NAME" => "Nom",
            "EMAIL" => "Adresse mail",
            "FIELD_EMAIL_UNIQUE" => "L'adresse mail est déjà utilisé",
            "FIELD_EMAIL_SYNTAX" => "L'adresse mail est invalide",
            "SIREN" => "Numéro de SIREN",
            "FIELD_SIREN_SYNTAX" => "Mauvais format : Le numéro siren est l'identification de l'entreprise et est composé de 9 chiffres",
            "PHONE" => "Numéro de téléphone",
            "FIELD_PHONE_SYNTAX" => "Mauvais format : 0712345678 ou +33712345678",
            "COUNTRY" => "Pays",
            "CITY" => "Ville",
            "ADDRESS" => "Adresse",
            "PASSWORD" => "Mot de passe",
            "PASSWORD_CONFIRMATION" => "Mot de passe (confirmation)",
            "FIELD_PASSWORD_SYNTAX" => "Le mot de passe doit contenir au moins une majuscule, une miniuscule, un chiffre, un caratère spécial et faire entre 8 et 15 caractères",
            "FIELD_CONFIRM_PASSWORD_SYNTAX" => "Le mot de passe est différent",
            "FIELD_CGU" => "J'accepte les",
            "FIELD_CGU_LINK" => "conditions générales",
            "FIELD_CGU_EMPTY" => "Il faut accepter les conditions générales",
            "LINK_CONNECTION" => "Je suis déjà membre",
            "LABEL_ERROR" => "Une erreur est survenue !",
            "LINK_ERROR" => "Revenir à la page d'accueil",
            "FIELD_TYPE" => "Type",
            "TEXT_EMAIL" => "mon-email@gmail.com",
            "TEXT_PASSWORD" => "Mon mot de passe",
            "LINK_REMEMBER" => "Se souvenir de moi",
            "LINK_PASSWORD_FORGOT" => "Mot de passe oublié",
            "TEXT_SIGNUP" => "Vous n'avez pas encore de compte ?",
            "TEXT_LOGIN" => "Vous avez déjà un compte ?",
            "LINK_SIGNUP" => "S'inscrire",
            "LINK_LOGIN" => "Se connecter",
            "FIELD_LOGIN_ERROR" => "Votre adresse mail ou votre mot de passe est incorrect",
            "TITLE_CALENDAR" => "Horaires",
            "TITLE_ADD_PRODUCT" => "Ajouter un produit",
            "FIELD_BARCODE" => "Code barre",
            "FIELD_QUANTITY" => "Quantité",
            "FIELD_BARCODE_SYNTAX" => "Mauvais format : Le code barre est composé de 13 chiffres",
            "TITLE_PRINT_COLLECT_USER" => "Demande de collecte",
            "TITLE_MESSAGE" => "Message",
            "NO_INCOMING_COLLECT_MSG" => "Pas de collecte en cours, créez en une&nbsp;!",
            "INCOMING_COLLECT_MSG" => "Une collecte est en approche&nbsp;!",
            "STILL_SOME_INFORMATION_TO_CHECK" => "Encore quelques informations à vérifier...",
            "NEXT" => "Suivant",
            "BACK" => "Retour",
            "JAN" => "Jan",
            "FEB" => "Fév",
            "MAR" => "Mars",
            "APR" => "Avr",
            "MAY" => "Mai",
            "JUN" => "Juin",
            "JUL" => "Jui",
            "AUG" => "Août",
            "SEP" => "Sep",
            "OCT" => "Oct",
            "NOV" => "Nov",
            "DEC" => "Déc",
            "SUN" => "Dim",
            "MON" => "Lun",
            "TUE" => "Mar",
            "WED" => "Mer",
            "THU" => "Jeu",
            "FRI" => "Ven",
            "SAT" => "Sam",
            "POSITION" => "Poste",
            "ADD_ADMIN" => "Ajouter un administrateur",
            "TITLE_CALENDAR_PAGE" => "Choisissez une date",
            "LABEL_HOURS" => "Choisissez un horaire",
            "LABEL_DATE" => "Date",
            "LABEL_HOUR" => "Heure",
            "BTN_CANCEL" => "Annuler",
            "CANCEL" => "Annuler",
            "CONFIRM" => "Confirmer",
            "CONTINUE" => "Continuer",
            "INFORMATION" => "Informations",
            "PRODUCTS" => "Produits",
            "ADD_PRODUCT" => "Ajouter un produit",
            "TITLE_PRINT_COLLECT" => "Votre demande de collecte a été annulée",
            "LINK_ADD_PRODUCT" => "Refaire une demande de collect",
            "LINK_HOME" => "Retour à la page d'accueil",
            "SUBSCRIBE" => "S&#39;abonner",
            "UNSUBSCRIBE" => "Se désabonner",
            "YOUR_SUBSCRIPTION_ENDS_THE" => "Votre abonnement se termine le",
            "9AM" => "09h00",
            "10AM" => "10h00",
            "11AM" => "11h00",
            "12AM" => "12h00",
            "2PM" => "14h00",
            "3PM" => "15h00",
            "4PM" => "16h00",
            "5PM" => "17h00",
            "6PM" => "18h00",
            "FIELD_POSTE" => "Poste",
            "BTN_ADD" => "Ajouter",
            "LABEL_PRODUCTS" => "Produits",
            "LABEL_STATUS" => "Statut",
            "LABEL_TAB_HOURS" => "Horaires",
            "LABEL_COLLECT" => "Modifier la collecte",
            "FIELD_QUANTITY_SYNTAX" => "La quantité doit être supérieur à 1",
            "SEARCH" => "Rechercher un code barre ...",
            "BTN_DISTRIB" => "Créer une nouvelle distribution",
            "TITLE_STOCK" => "Stock",
            "TITLE_DISTRIB" => "Distribution",
            "TITLE_COLLECT" => "Collecte",
            "TITLE_EMPLOYEES" => "Employés",
            "USERS" => "Utilisateurs",
            "SIGNOUT" => "Déconnexion",
            "LINK_GIVE" => "Donner",
            "TITLE_HISTORICAl" => "Historique",
            "TITLE_HELP" => "Aide",
            "LINK_DONATION" => "Mes&nbsp;donations",
            "LINK_INFORMATIONS" => "Mes&nbsp;informations",
            "LINK_SIGNOUT" => "Se&nbsp;déconnecter",
            "BTN_PRODUCTS" => "Voir produits",
            "SUMMARY" => "Récapitulatif",
            "PDF_TITLE" => "Récapitulatif de la livraison",
            "PDF_ADDRESS" => "Adresse de la livraison",
            "LIST_DELIVERED" => "Liste des produits livrés",
            "TITLE_DELIVERED" => "Liste des tournées",
            "TITLE_COLLECT" => "Collecte",
            "TITLE_USERS" => "Gestion&nbspdes&nbsputilisateurs",
            "TITLE_ADD_DISTRIB" => "Créer une distribution",
            "DOWNLOAD" => "Télécharger",
            "TITLE_BARCODE" => "Récupération des codes barres",
            "SEARCH_USERS" => "Rechercher un email ou un numéro de téléphone ..."
        );
        return $lang;
    }
}