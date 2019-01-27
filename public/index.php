<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Application();

if(empty($_SESSION)) {
	$app->renderProgressPage();
} else {
	$app->renderInitialPage();
}
