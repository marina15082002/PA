<?php

/**
 * @file
 * ErrorController class file.
 */

declare(strict_types=1);

namespace PA;

class ErrorController
{
    public function get()
    {
        $title = "Error";
        include __DIR__ . "\..\src\pageError.php";
    }
}
