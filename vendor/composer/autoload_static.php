<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita0cba90389635c47c38f4f904039e43e
{
    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zend\\Stdlib\\' => 12,
            'Zend\\ServiceManager\\' => 20,
            'Zend\\Hydrator\\' => 14,
            'Zend\\Filter\\' => 12,
            'Zend\\EventManager\\' => 18,
        ),
        'S' => 
        array (
            'Symfony\\Component\\EventDispatcher\\' => 34,
        ),
        'P' => 
        array (
            'Psr\\Container\\' => 14,
        ),
        'L' => 
        array (
            'League\\OAuth2\\Client\\' => 21,
        ),
        'I' => 
        array (
            'Interop\\Container\\' => 18,
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Collections\\' => 28,
        ),
        'A' => 
        array (
            'Audeio\\Spotify\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zend\\Stdlib\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-stdlib/src',
        ),
        'Zend\\ServiceManager\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-servicemanager/src',
        ),
        'Zend\\Hydrator\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-hydrator/src',
        ),
        'Zend\\Filter\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-filter/src',
        ),
        'Zend\\EventManager\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-eventmanager/src',
        ),
        'Symfony\\Component\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'League\\OAuth2\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/oauth2-client/src',
        ),
        'Interop\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/container-interop/container-interop/src/Interop/Container',
        ),
        'Doctrine\\Common\\Collections\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/collections/lib/Doctrine/Common/Collections',
        ),
        'Audeio\\Spotify\\' => 
        array (
            0 => __DIR__ . '/..' . '/audeio/spotify-web-api/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'G' => 
        array (
            'Guzzle\\Tests' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/guzzle/tests',
            ),
            'Guzzle' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/guzzle/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita0cba90389635c47c38f4f904039e43e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita0cba90389635c47c38f4f904039e43e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInita0cba90389635c47c38f4f904039e43e::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
