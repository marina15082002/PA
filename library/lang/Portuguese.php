<?php

namespace PA\Lang;

class Pt
{
    public function getArray()
    {
        $lang = array(
            "FIELD_EMPTY" => "Campo obrigatório",
            "FIELD_NAME" => "Nome",
            "FIELDS_EMPTY" => "Todos os campos são obrigatórios",
            "BTN_CONFIRM" => "Confirmar",
            "BTN_MODIFY" => "Editar",
            "BTN_DELETE" => "Deletar",
            "TITLE_SIGNUP" => "Cadastro",
            "TITLE_INDEX" => "Bem-vindo",
            "TITLE_MODIFY_USERS" => "Modificar usuários",
            "TITLE_ERROR" => "Erro",
            "TITLE_LOGIN" => "Conecte-se",
            "YOU_ARE" => "Você é",
            "A_COMPANY" => "Uma empresa",
            "AN_ASSOCIATION" => "Uma associação",
            "A_PARTICULAR" => "Um particular",
            "TYPE_EMPTY" => "Campo obrigatório, selecione um caso",
            "NAME" => "Sobrenome",
            "EMAIL" => "Endereço de correio",
            "FIELD_EMAIL_UNIQUE" => "O endereço de e-mail já está em uso",
            "FIELD_EMAIL_SYNTAX" => "O endereço de email é inválido",
            "SIREN" => "Número da sirene",
            "FIELD_SIREN_SYNTAX" => "Formato errado: O número da sirene é a identificação da empresa e é composto por 9 dígitos",
            "PHONE" => "Número de telefone",
            "FIELD_PHONE_SYNTAX" => "Formato errado: 0712345678 ou +33712345678",
            "COUNTRY" => "País",
            "CITY" => "Cidade",
            "ADDRESS" => "Endereço",
            "PASSWORD" => "Senha",
            "PASSWORD_CONFIRMATION" => "Senha (confirmação)",
            "FIELD_PASSWORD_SYNTAX" => "A senha deve conter pelo menos uma maiúscula, uma minúscula, um número, um caractere especial e ter entre 8 e 15 caracteres",
            "FIELD_CONFIRM_PASSWORD" => "ConfirmaÇão Da Senha",
            "FIELD_CONFIRM_PASSWORD_SYNTAX" => "A senha é diferente",
            "FIELD_CGU" => "eu aceito os",
            "FIELD_CGU_LINK" => "termos e condições",
            "FIELD_CGU_EMPTY" => "Você tem que aceitar as condições gerais",
            "LINK_CONNECTION" => "Eu já sou um membro",
            "LABEL_ERROR" => "Ocorreu um erro !",
            "LINK_ERROR" => "Voltar à página inicial",
            "FIELD_TYPE" => "Gentil",
            "TEXT_EMAIL" => "meu-endereço-de-e-mail@gmail.com",
            "TEXT_PASSWORD" => "Minha senha",
            "LINK_REMEMBER" => "Lembre de mim",
            "LINK_PASSWORD_FORGOT" => "Esqueceu sua senha",
            "TEXT_SIGNUP" => "Não tem uma conta ainda ?",
            "LINK_SIGNUP" => "Registro",
            "TEXT_LOGIN" => "Já tem uma conta ?",
            "LINK_LOGIN" => "Entrar",
            "FIELD_LOGIN_ERROR" => "Seu endereço de e-mail ou senha está incorreto",
            "TITLE_CALENDAR" => "Cronograma",
            "TITLE_ADD_PRODUCT" => "Adicionar um produto",
            "FIELD_BARCODE" => "Código de barras",
            "FIELD_QUANTITY" => "Quantidade",
            "FIELD_BARCODE_SYNTAX" => "Formato errado: Código de barras é composto por 13 dígitos",
            "TITLE_PRINT_COLLECT_USER" => "Solicitação de cobrança",
            "TITLE_MESSAGE" => "Mensagem",
            "NO_INCOMING_COLLECT_MSG" => "Nenhuma coleção em andamento, crie uma!",
            "INCOMING_COLLECT_MSG" => "Uma arrecadação de fundos está chegando!",
            "STILL_SOME_INFORMATION_TO_CHECK" => "Ainda há alguma informação para verificar...",
            "NEXT" => "Próximo",
            "BACK" => "Voltar",
            "SUBSCRIBE" => "Assinar",
            "UNSUBSCRIBE" => "Cancelar assinatura",
            "YOUR_SUBSCRIPTION_ENDS_THE" => "Sua assinatura termina em",
            "JAN" => "Jan",
            "FEB" => "Fev",
            "MAR" => "Mars",
            "APR" => "Abr",
            "MAY" => "Pod",
            "JUN" => "Jun",
            "JUL" => "Jul",
            "AUG" => "Ago",
            "SEP" => "Set",
            "OCT" => "Out",
            "NOV" => "Nov",
            "DEC" => "Dez",
            "SUN" => "Dom",
            "MON" => "Seg",
            "TUE" => "Ter",
            "WED" => "Qua",
            "THU" => "Qui",
            "FRI" => "Sex",
            "SAT" => "Sáb",
            "TITLE_CALENDAR_PAGE" => "Escolha uma data",
            "LABEL_HOURS" => "Escolha um horário",
            "LABEL_DATE" => "Encontro",
            "LABEL_HOUR" => "Hora",
            "BTN_CANCEL" => "Cancelar",
            "CANCEL" => "Cancelar",
            "CONFIRM" => "Confirmar",
            "CONTINUE" => "Continuar",
            "INFORMATION" => "Informação",
            "PRODUCTS" => "Produtos",
            "ADD_PRODUCT" => "Adicionar um produto",
            "TITLE_PRINT_COLLECT" => "Sua solicitação de coleta foi cancelada",
            "LINK_ADD_PRODUCT" => "Refazer uma solicitação de coleta",
            "LINK_HOME" => "Voltar a página inicial",
            "9AM" => "09h00",
            "10AM" => "10h00",
            "11AM" => "11h00",
            "12AM" => "12h00",
            "2PM" => "14h00",
            "3PM" => "15h00",
            "4PM" => "16h00",
            "5PM" => "17h00",
            "6PM" => "18h00",
            "SEARCH" => "Encontrar um código de barras ...",
            "BTN_DISTRIB" => "Criar uma nova distribuição",
            "TITLE_STOCK" => "Ações",
            "TITLE_DISTRIB" => "Distribuições",
            "TITLE_COLLECT" => "Coleções",
            "TITLE_EMPLOYEES" => "Funcionários",
            "USERS" => "Usuários",
            "SIGNOUT" => "Sair",
            "LINK_GIVE" => "Dar",
            "TITLE_HISTORICAl" => "Histórico",
            "TITLE_HELP" => "Ajuda",
            "LINK_DONATION" => "Doações",
            "LINK_INFORMATIONS" => "Informações",
            "LINK_SIGNOUT" => "Sair",
            "LABEL_PRODUCTS" => "Produtos",
            "LABEL_STATUS" => "Status",
            "LABEL_TAB_HOURS" => "Horários",
            "BTN_PRODUCTS" => "Ver produtos",
            "SUMMARY" => "Resumo",
            "PDF_TITLE" => "Resumo da entrega",
            "PDF_ADDRESS" => "Endereço de entrega",
            "LIST_DELIVERED" => "Lista de produtos entregues",
            "TITLE_DELIVERED" => "Lista de passeios",
            "TITLE_COLLECT" => "Coleções",
            "TITLE_USERS" => "Gerenciamento&nbspde&nbspusuários",
            "TITLE_ADD_DISTRIB" => "Crie um elenco",
        );
        return $lang;
    }
}