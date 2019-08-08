<?php
/**
* Bootstrapping the tests
*
* @author Daniel Wolkenhauer <hello@dw-labs.de>
* @version 0.1.0
* @package Tests
*/

chdir(__DIR__);

$loader = null;

if (file_exists('../vendor/autoload.php')) {
	$loader = include '../vendor/autoload.php';
} elseif (file_exists('../../../autoload.php')) {
	$loader = include '../../../autoload.php';
} else {
	throw new RuntimeException('vendor/autoload.php wurde nicht gefunden. Hast du `php composer.phar install` schon ausgeführt?');
}

$loader->add('ZfMailerTest', __DIR__);

// if (!$config = @include 'test.config.php') {
// 	if (!$config = include 'test.config.php.dist') {
// 		throw new RuntimeException('Test Konfig nicht gefunden!!!');
// 	}
// }
