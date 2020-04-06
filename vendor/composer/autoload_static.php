<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit140171f93232ec65903ee1af1f3f31c2
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Michelf\\' => 8,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Michelf\\' => 
        array (
            0 => __DIR__ . '/..' . '/michelf/php-markdown/Michelf',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit140171f93232ec65903ee1af1f3f31c2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit140171f93232ec65903ee1af1f3f31c2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
