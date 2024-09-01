<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfff900e4d847fb4eeef60edc6b5c269b
{
    public static $files = array (
        '1c020f9696897083bfc842aeecd060ab' => __DIR__ . '/../..' . '/app/helpers/constants.php',
        '394dfc3da7c7729983118d5f63cd35b8' => __DIR__ . '/../..' . '/app/router/router.php',
        '94c1690abc698fc39bdb91d5b37e24b8' => __DIR__ . '/../..' . '/app/core/controller.php',
        '0ef784ccb821bc414fdf7ddc9ae30297' => __DIR__ . '/../..' . '/app/database/connect.php',
        '695bb66f7508c5289e26bc6a9bf31cba' => __DIR__ . '/../..' . '/app/database/fetch.php',
        '9b18aaeef7364f919445e49155b6f790' => __DIR__ . '/../..' . '/app/helpers/redirect.php',
        'ae5cd88386a74480268eae82272e62c2' => __DIR__ . '/../..' . '/app/helpers/flash.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfff900e4d847fb4eeef60edc6b5c269b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfff900e4d847fb4eeef60edc6b5c269b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfff900e4d847fb4eeef60edc6b5c269b::$classMap;

        }, null, ClassLoader::class);
    }
}
