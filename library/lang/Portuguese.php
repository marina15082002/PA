<?php

namespace PA\Lang;

class Pt
{
    public function getArray()
    {
        $lang = array(
            /* ==== FORM ==== */
            "FIELD_EMPTY" => "Campo obrigatório",
            "BTN_CONFIRM" => "Confirmar",
            /* ==== SIGNUP ==== */
            "TITLE_SIGNUP" => "Cadastro",
            "FIELD_COMPANY" => "Companhia",
            "FIELD_ASSOCIATION" => "Associação",
            "FIELD_PARTICULAR" => "Especial",
            "TYPE_EMPTY" => "Campo obrigatório, selecione um caso",
            "FIELD_NAME" => "Sobrenome",
            "FIELD_EMAIL" => "Endereço de correio",
            "FIELD_EMAIL_UNIQUE" => "O endereço de e-mail já está em uso",
            "FIELD_EMAIL_SYNTAX" => "O endereço de email é inválido",
            "FIELD_SIREN" => "Número da sirene",
            "FIELD_SIREN_SYNTAX" => "Formato errado: O número da sirene é a identificação da empresa e é composto por 9 dígitos",
            "FIELD_PHONE" => "Número de telefone",
            "FIELD_PHONE_SYNTAX" => "Formato errado: 0712345678 ou +33712345678",
            "FIELD_COUNTRY" => "País",
            "FIELD_CITY" => "Cidade",
            "FIELD_ADDRESS" => "Endereço",
            "FIELD_PASSWORD" => "Senha",
            "FIELD_PASSWORD_SYNTAX" => "A senha deve conter pelo menos uma maiúscula, uma minúscula, um número, um caractere especial e ter entre 8 e 15 caracteres",
            "FIELD_CONFIRM_PASSWORD" => "ConfirmaÇão Da Senha",
            "FIELD_CONFIRM_PASSWORD_SYNTAX" => "A senha é diferente",
            "FIELD_CGU" => "eu aceito os",
            "FIELD_CGU_LINK" => "termos e condições",
            "FIELD_CGU_EMPTY" => "Você tem que aceitar as condições gerais",
            "LINK_CONNECTION" => "Eu já sou um membro",
            /* ==== ERROR ==== */
            "LABEL_ERROR" => "Ocorreu um erro !",
            "LINK_ERROR" => "Voltar à página inicial"
        );
        return $lang;
    }
}