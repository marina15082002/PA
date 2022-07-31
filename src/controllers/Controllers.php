<?php

/**
 * @file
 * Controllers class file.
 */

declare(strict_types=1);

namespace Framework;

abstract class Controllers
{
    public function render(string $template, array $data = array()): void
    {
        $tpl_engine = $GLOBALS["Views"];

        $arr = explode(".", $template);
        if (end($arr) !== "html") {
            $template .= ".html";
        }

        foreach ($data as $key => $value) {
            $tpl_engine->assign($key, $value);
        }

        $tpl_engine->display($template);
    }


    public function redirect($uri)
    {
        header("Location: /$uri");
        header("Connection: close");
    }
}
