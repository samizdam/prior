<?php

use Samizdam\Prior\Web\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application();

if(empty($_SESSION)) {
	echo $app->renderInitialPage();
} else {
	$app->renderProgressPage();
}
