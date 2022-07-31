<?php

/**
 * @file
 * IndexController class file.
 */

declare(strict_types=1);

namespace PA;

class IndexController
{
    public function get()
    {
        $title = "Accueil";
        include __DIR__ . "\..\src\accueil.php";
    }
}
