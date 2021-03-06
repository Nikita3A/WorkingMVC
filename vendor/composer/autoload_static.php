<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb16d65a6020d5a5f953cd6d1a4db6d91
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb16d65a6020d5a5f953cd6d1a4db6d91::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb16d65a6020d5a5f953cd6d1a4db6d91::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb16d65a6020d5a5f953cd6d1a4db6d91::$classMap;

        }, null, ClassLoader::class);
    }
}
