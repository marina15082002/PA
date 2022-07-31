<?php

/**
 * @file
 * IndexController class file.
 */

declare(strict_types=1);

namespace Framework;

class IndexController extends Controllers
{
    public function get()
    {
        parent::render("index.html");
    }
}
