<?php

/**
 * @file
 * SignupController class file.
 */

declare(strict_types=1);

namespace PA;

include __DIR__ . "\..\models\UserModel.php";

class SignupController
{
    public function get()
    {
        $title = "Inscription";
        include __DIR__ . "\..\src\signup.php";
    }

    public function create()
    {
        $userModel = new Models\UserModel();
        $body = $_POST;

        $this->checkInputs();

        if (isset($body['company']) || $body['company']) {
            $type = $body['company'];
        } else if (isset($body['association']) || $body['association']) {
            $type = $body['association'];
        } else {
            $type = $body['particular'];
        }

        $res = $userModel->insert(
            array(
                $type,
                $body['name'],
                $body['email'],
                $body['siren'],
                $body['phone'],
                $body['country'],
                $body['city'],
                $body['address'],
                hash("sha256", $body['password'])
            )
        );

        if ($res == -1) {
            header("Location: /PA/error");
            header("Connection: close");
            exit;
        }

        header("Location: /PA/");
        header("Connection: close");
        exit;
    }

    private function checkUniqueEmail()
    {
        $body = $_POST;
        $userModel = new Models\UserModel();

        $res = $userModel->checkElementExist("email", $body['email']);

        if ($res == -1) {
            header("Location: /PA/signup?emailNoUnique=true");
            header("Connection: close");
            exit;
        }
    }

    private function checkInputs()
    {
        $body = $_POST;

        if ((!isset($body['company']) || !$body['company']) && ((!isset($body['association']) || !$body['association'])) && ((!isset($body['particular']) || !$body['particular']))) {
            header("Location: /PA/signup?typeEmptyError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['name']) || empty($body['name'])) {
            header("Location: /PA/signup?nameEmptyError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['email']) || empty($body['email'])) {
            header("Location: /PA/signup?emailEmptyError=true");
            header("Connection: close");
            exit;
        }

        if (!filter_var($body['email'], FILTER_VALIDATE_EMAIL)) {
            header("Location: /PA/signup?emailSyntaxError=true");
            header("Connection: close");
            exit;
        }

        $this->checkUniqueEmail();

        if (!isset($body['siren']) || empty($body['siren'])) {
            header("Location: /PA/signup?sirenEmptyError=true");
            header("Connection: close");
            exit;
        }

        $pattern = "#^[0-9]{9}$#";
        if (isset($body['siren']) && !empty($body['siren']) && preg_match($pattern, $body['siren']) == 0) {
            header("Location: /PA/signup?sirenSyntaxError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['phone']) || empty($body['phone'])) {
            header("Location: /PA/signup?phoneEmptyError=true");
            header("Connection: close");
            exit;
        }

        $pattern = "#^(0|\\+33|0033)[1-9][0-9]{8}$#";
        if (isset($body['phone']) && !empty($body['phone']) && preg_match($pattern, $body['phone']) == 0) {
            header("Location: /PA/signup?phoneSyntaxError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['country']) || empty($body['country'])) {
            header("Location: /PA/signup?countryEmptyError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['city']) || empty($body['city'])) {
            header("Location: /PA/signup?cityEmptyError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['address']) || empty($body['address'])) {
            header("Location: /PA/signup?addressEmptyError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['password']) || empty($body['password'])) {
            header("Location: /PA/signup?passwordEmptyError=true");
            header("Connection: close");
            exit;
        }

        $pattern = "#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_.])([-+!*$@%._\w]{8,15})$#";
        if (preg_match($pattern, $body['password']) == 0) {
            header("Location: /PA/signup?passwordSyntaxError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['password_confirmation']) || empty($body['password_confirmation'])) {
            header("Location: /PA/signup?confirmPasswordEmptyError=true");
            header("Connection: close");
            exit;
        }

        if ($body['password_confirmation'] != $body['password']) {
            header("Location: /PA/signup?confirmPasswordDifferentError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['cgu']) || !$body['cgu']) {
            header("Location: /PA/signup?cguEmptyError=true");
            header("Connection: close");
            exit;
        }
    }
}
