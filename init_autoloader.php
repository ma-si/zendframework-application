<?php

/**
 * Zend Framework Application (http://mateuszsitek.com/projects/zendframework-application).
 *
 * @link      http://github.com/ma-si/zendframework-application for the canonical source repository
 *
 * @copyright Copyright (c) 2006-2016 Aist Internet Technologies (http://aist.pl) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

/**
 * This autoloading setup is really more complicated than it needs to be for most
 * applications. The added complexity is simply to reduce the time it takes for
 * new developers to be productive with a fresh skeleton. It allows autoloading
 * to be correctly configured, regardless of the installation method and keeps
 * the use of composer completely optional. This setup should work fine for
 * most users, however, feel free to configure autoloading however you'd like.
 */

// Composer autoloading
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    $loader = include __DIR__ . '/vendor/autoload.php';
}

if (class_exists('Zend\Loader\AutoloaderFactory')) {
    return;
}

$zf2Path = false;

if (getenv('ZF2_PATH')) {            // Support for ZF2_PATH environment variable
    $zf2Path = getenv('ZF2_PATH');
} elseif (get_cfg_var('zf2_path')) { // Support for zf2_path directive value
    $zf2Path = get_cfg_var('zf2_path');
}

if ($zf2Path) {
    if (isset($loader)) {
        $loader->add('Zend', $zf2Path);
        $loader->add('ZendXml', $zf2Path);
    } else {
        include $zf2Path . '/Zend/Loader/AutoloaderFactory.php';
        Zend\Loader\AutoloaderFactory::factory([
            'Zend\Loader\StandardAutoloader' => [
                'autoregister_zf' => true,
            ],
        ]);
    }
}

if (!class_exists('Zend\Loader\AutoloaderFactory')) {
    throw new RuntimeException('Unable to load ZF2. Run `php composer.phar install` or define a ZF2_PATH environment variable.');
}
