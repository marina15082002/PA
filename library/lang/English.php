<?php

namespace PA\Lang;

class En
{
    public function getArray()
    {
        $lang = array(
            "FIELD_EMPTY" => "Required field",
            "FIELDS_EMPTY" => "All fields are mandatory",
            "BTN_CONFIRM" => "To confirm",
            "BTN_MODIFY" => "Edit",
            "BTN_DELETE" => "Delete",
            "TITLE_SIGNUP" => "Signup",
            "TITLE_INDEX" => "Welcome",
            "TITLE_MODIFY_USERS" => "Modify users",
            "TITLE_ERROR" => "Error",
            "TITLE_LOGIN" => "Login",
            "FIELD_COMPANY" => "Company",
            "FIELD_ASSOCIATION" => "Association",
            "FIELD_PARTICULAR" => "Particular",
            "TYPE_EMPTY" => "Required field, please select a case",
            "FIELD_NAME" => "Name",
            "FIELD_EMAIL" => "Mail address",
            "FIELD_EMAIL_UNIQUE" => "The email address is already in use",
            "FIELD_EMAIL_SYNTAX" => "The email address is invalid",
            "FIELD_SIREN" => "Siren number",
            "FIELD_SIREN_SYNTAX" => "Wrong format: The siren number is the identification of the company and is composed of 9 digits",
            "FIELD_PHONE" => "Phone number",
            "FIELD_PHONE_SYNTAX" => "Wrong format: 0712345678 or +33712345678",
            "FIELD_COUNTRY" => "Country",
            "FIELD_CITY" => "City",
            "FIELD_ADDRESS" => "Address",
            "FIELD_PASSWORD" => "Password",
            "FIELD_PASSWORD_SYNTAX" => "The password must contain at least one uppercase, one lowercase, one number, one special character and be between 8 and 15 characters",
            "FIELD_CONFIRM_PASSWORD" => "Password confirmation",
            "FIELD_CONFIRM_PASSWORD_SYNTAX" => "The password is different",
            "FIELD_CGU" => "I accept the",
            "FIELD_CGU_LINK" => "terms and conditions",
            "FIELD_CGU_EMPTY" => "You have to accept the general conditions",
            "LINK_CONNECTION" => "I am already a member",
            "LABEL_ERROR" => "An error has occurred !",
            "LINK_ERROR" => "Back to home page",
            "FIELD_TYPE" => "Kind",
            "TEXT_EMAIL" => "my-email@gmail.com",
            "TEXT_PASSWORD" => "My password",
            "LINK_REMEMBER" => "Remember me",
            "LINK_PASSWORD_FORGOT" => "Forgot password"
        );
        return $lang;
    }
}