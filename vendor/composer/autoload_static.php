<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf794d0f5cb576067b59b12f273ce1807
{
    public static $files = array (
        'ad155f8f1cf0d418fe49e248db8c661b' => __DIR__ . '/..' . '/react/promise/src/functions_include.php',
        '6b06ce8ccf69c43a60a1e48495a034c9' => __DIR__ . '/..' . '/react/promise-timer/src/functions.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        '3be16222a6efa6dd226a219eaaff823b' => __DIR__ . '/..' . '/ratchet/pawl/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'React\\Stream\\' => 13,
            'React\\SocketClient\\' => 19,
            'React\\Promise\\Timer\\' => 20,
            'React\\Promise\\' => 14,
            'React\\EventLoop\\' => 16,
            'React\\Dns\\' => 10,
            'React\\Cache\\' => 12,
            'Ratchet\\RFC6455\\' => 16,
            'Ratchet\\Client\\' => 15,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'React\\Stream\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/stream/src',
        ),
        'React\\SocketClient\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/socket-client/src',
        ),
        'React\\Promise\\Timer\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/promise-timer/src',
        ),
        'React\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/promise/src',
        ),
        'React\\EventLoop\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/event-loop/src',
        ),
        'React\\Dns\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/dns/src',
        ),
        'React\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/cache/src',
        ),
        'Ratchet\\RFC6455\\' => 
        array (
            0 => __DIR__ . '/..' . '/ratchet/rfc6455/src',
        ),
        'Ratchet\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/ratchet/pawl/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Unirest\\' => 
            array (
                0 => __DIR__ . '/..' . '/mashape/unirest-php/src',
            ),
        ),
        'R' => 
        array (
            'RapidApi\\' => 
            array (
                0 => __DIR__ . '/..' . '/rapidapi/rapidapi-connect/src',
            ),
        ),
        'E' => 
        array (
            'Evenement' => 
            array (
                0 => __DIR__ . '/..' . '/evenement/evenement/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf794d0f5cb576067b59b12f273ce1807::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf794d0f5cb576067b59b12f273ce1807::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitf794d0f5cb576067b59b12f273ce1807::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
