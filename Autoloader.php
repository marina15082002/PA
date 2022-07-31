<?php

/**
 * @file
 * Autoloader class file.
 */

declare(strict_types=1);

namespace Framework;

class Autoloader
{
    public static array $PROJECT_DIRS = [
        "classes/",
        "controllers/",
        "models/"
    ];

    public static string $PROJECT_ROOT;

    public static function register(): void
    {
        self::$PROJECT_ROOT = dirname(__FILE__) . '/';
        spl_autoload_register(array(__CLASS__, 'autoload'), true, true);
    }

    public static function autoload($class): void
    {

        $splitClass = explode('\\', $class);
        if (!($splitClass[0] === __NAMESPACE__)) {
            return;
        }

        foreach (self::$PROJECT_DIRS as $dir) {
            $classFile = self::$PROJECT_ROOT . $dir . end($splitClass) . ".php";
            if (is_file($classFile)) {
                require $classFile;
                return;
            }
        }
    }
}
