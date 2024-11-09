<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite7de23d589d1cb8410a7e23934e360c7
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MercadoPago\\' => 12,
        ),
        'L' => 
        array (
            'Lauta\\ProyectGlizzyCorp2024\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MercadoPago\\' => 
        array (
            0 => __DIR__ . '/..' . '/mercadopago/dx-php/src/MercadoPago',
        ),
        'Lauta\\ProyectGlizzyCorp2024\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite7de23d589d1cb8410a7e23934e360c7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite7de23d589d1cb8410a7e23934e360c7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite7de23d589d1cb8410a7e23934e360c7::$classMap;

        }, null, ClassLoader::class);
    }
}