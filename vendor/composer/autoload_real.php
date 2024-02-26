<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit2d1a1a1b4fd31a9a5094d6be8b2c88cd
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit2d1a1a1b4fd31a9a5094d6be8b2c88cd', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit2d1a1a1b4fd31a9a5094d6be8b2c88cd', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit2d1a1a1b4fd31a9a5094d6be8b2c88cd::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
