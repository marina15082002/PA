<?php

namespace PA\Lang;

class It
{
    public function getArray()
    {
        $lang = array(
            /* ==== FORM ==== */
            "FIELD_EMPTY" => "Campo obbligatorio",
            "BTN_CONFIRM" => "Per confermare",
            /* ==== SIGNUP ==== */
            "TITLE_SIGNUP" => "Iscrizione",
            "FIELD_COMPANY" => "Azienda",
            "FIELD_ASSOCIATION" => "Associazione",
            "FIELD_PARTICULAR" => "Particolare",
            "TYPE_EMPTY" => "Campo obbligatorio, seleziona un caso",
            "FIELD_NAME" => "Nome",
            "FIELD_EMAIL" => "Indirizzo di posta",
            "FIELD_EMAIL_UNIQUE" => "L'indirizzo e-mail è già in uso",
            "FIELD_EMAIL_SYNTAX" => "L'indirizzo email non è valido",
            "FIELD_SIREN" => "Numero della sirena",
            "FIELD_SIREN_SYNTAX" => "Formato errato: il numero della sirena è l'identificazione dell'azienda ed è composto da 9 cifre",
            "FIELD_PHONE" => "Numero di telefono",
            "FIELD_PHONE_SYNTAX" => "Formato sbagliato: 0712345678 o +33712345678",
            "FIELD_COUNTRY" => "Paese",
            "FIELD_CITY" => "Città",
            "FIELD_ADDRESS" => "Indirizzo",
            "FIELD_PASSWORD" => "Parola d'ordine",
            "FIELD_PASSWORD_SYNTAX" => "La password deve contenere almeno una maiuscola, una minuscola, un numero, un carattere speciale ed essere compresa tra 8 e 15 caratteri",
            "FIELD_CONFIRM_PASSWORD" => "Conferma password",
            "FIELD_CONFIRM_PASSWORD_SYNTAX" => "La password è diversa",
            "FIELD_CGU" => "Accetto i",
            "FIELD_CGU_LINK" => "Termini e le Condizioni",
            "FIELD_CGU_EMPTY" => "Devi accettare le condizioni generali",
            "LINK_CONNECTION" => "Sono già un membro",
            /* ==== ERROR ==== */
            "LABEL_ERROR" => "C'è stato un errore !",
            "LINK_ERROR" => "Torna alla home page"
        );
        return $lang;
    }
}