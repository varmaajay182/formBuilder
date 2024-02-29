<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2d1a1a1b4fd31a9a5094d6be8b2c88cd
{
    public static $files = array (
        'ecfe640f80781fbff50d23f7a36542ee' => __DIR__ . '/../..' . '/src/Helpers/shortcodeHelper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Codecrewinfotech\\FormBuilder\\' => 29,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Codecrewinfotech\\FormBuilder\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2d1a1a1b4fd31a9a5094d6be8b2c88cd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2d1a1a1b4fd31a9a5094d6be8b2c88cd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2d1a1a1b4fd31a9a5094d6be8b2c88cd::$classMap;

        }, null, ClassLoader::class);
    }
}
