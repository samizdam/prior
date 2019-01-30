<?php

use Samizdam\Prior\Web\Application;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$app = new Application();

switch ($_SERVER['REQUEST_URI']) {
	case '/progress':
		$options = [];
		if (isset($_POST['input'])) {
			$values = explode(',', $_POST['input']);
			foreach ($values as $value) {
				$options[] = new \Samizdam\Prior\Option($value);
			}
			$position = 0;
		} elseif (isset($_POST['vote'])) {
			foreach ($_SESSION['options'] as $value => $vote) {
				$options[] = new \Samizdam\Prior\Option($value, $vote);
			}
			$options = $_SESSION['position'];
		}


		$pairsSet = (new \Samizdam\Prior\PairGenerator)->generatePairs($options);
		$pairsSet->setPosition($position);

		echo $app->renderProgressPage($pairsSet);
		break;
	case '/result':
		break;

	default:
		echo $app->renderInitialPage();
}
