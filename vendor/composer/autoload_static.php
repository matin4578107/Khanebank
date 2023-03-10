<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdcb8f5be7fddf317f7ee7fb8b2fd7f8d
{
    public static $files = array (
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
        '3a37ebac017bc098e9a86b35401e7a68' => __DIR__ . '/..' . '/mongodb/mongodb/src/functions.php',
        '89c5d307709723707e4b5ae6d0fcbc30' => __DIR__ . '/../..' . '/functions/fn1.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Traits\\' => 7,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
        ),
        'R' => 
        array (
            'Rahil\\Oop\\' => 10,
        ),
        'M' => 
        array (
            'MongoDB\\' => 8,
        ),
        'J' => 
        array (
            'Jean85\\' => 7,
        ),
        'C' => 
        array (
            'Contracts\\' => 10,
            'Classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Traits\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Traits',
        ),
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Rahil\\Oop\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'MongoDB\\' => 
        array (
            0 => __DIR__ . '/..' . '/mongodb/mongodb/src',
        ),
        'Jean85\\' => 
        array (
            0 => __DIR__ . '/..' . '/jean85/pretty-package-versions/src',
        ),
        'Contracts\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Contracts',
        ),
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Classes',
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PhpToken' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/PhpToken.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdcb8f5be7fddf317f7ee7fb8b2fd7f8d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdcb8f5be7fddf317f7ee7fb8b2fd7f8d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdcb8f5be7fddf317f7ee7fb8b2fd7f8d::$classMap;

        }, null, ClassLoader::class);
    }
}
