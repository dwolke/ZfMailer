<?php
/**
* Bootstrapping the tests
*
* @author Daniel Wolkenhauer <hello@dw-labs.de>
* @version 1.0.0
* @package Tests
*/

$loader = null;

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    $loader = include __DIR__ . '/../vendor/autoload.php';
} elseif (file_exists(__DIR__ . '/../../../autoload.php')) {
    $loader = include __DIR__ . '/../../../autoload.php';
} else {
    throw new RuntimeException('vendor/autoload.php wurde nicht gefunden. Hast du `php composer.phar install` schon ausgeführt?');
}

$loader->add('ZfMailerTest', __DIR__);

// auskommentieren, wenn Konfiguration notwendig
// if (!$config = @include 'test.config.php') {
// 	if (!$config = include 'test.config.php.dist') {
// 		throw new RuntimeException('Test Konfig nicht gefunden!!!');
// 	}
// }
